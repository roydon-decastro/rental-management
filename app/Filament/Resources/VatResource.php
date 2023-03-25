<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VatResource\Pages;
use App\Filament\Resources\VatResource\RelationManagers;
use App\Models\Vat;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class VatResource extends Resource
{
    protected static ?string $model = Vat::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Property Management';

    protected static ?string $navigationLabel = 'VAT';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('rate')
                            ->label("VAT")
                            ->numeric()
                            ->required()
                            ->mask(fn (TextInput\Mask $mask) => $mask
                                ->numeric()
                                ->decimalPlaces(2)
                                ->normalizeZeros()
                                ->decimalSeparator('.')
                                ->thousandsSeparator(','),)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rate')->money('php', true)->label("VAT"),
                TextColumn::make('created_at')->date()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVats::route('/'),
            'create' => Pages\CreateVat::route('/create'),
            'edit' => Pages\EditVat::route('/{record}/edit'),
        ];
    }
}
