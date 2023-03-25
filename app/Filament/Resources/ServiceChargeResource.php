<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceChargeResource\Pages;
use App\Filament\Resources\ServiceChargeResource\RelationManagers;
use App\Models\ServiceCharge;
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
class ServiceChargeResource extends Resource
{
    protected static ?string $model = ServiceCharge::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-tax';

    protected static ?string $navigationGroup = 'Property Management';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('rate')
                            ->numeric()
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rate')
                    ->getStateUsing(function (ServiceCharge $record) {
                        return $record->rate . ' %';
                    }),
                TextColumn::make('created_at')->date()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListServiceCharges::route('/'),
            'create' => Pages\CreateServiceCharge::route('/create'),
            'edit' => Pages\EditServiceCharge::route('/{record}/edit'),
        ];
    }
}
