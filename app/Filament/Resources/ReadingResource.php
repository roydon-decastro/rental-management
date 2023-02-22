<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Unit;
use Filament\Tables;
use App\Models\Reading;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ReadingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\BillResource\Pages as BillPages;
use App\Filament\Resources\ReadingResource\RelationManagers;

class ReadingResource extends Resource
{
    protected static ?string $model = Reading::class;

    // protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $navigationGroup = 'Transactions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('unit_id',)
                            ->relationship('unit', 'name')->required(),
                        TextInput::make('reading')->required()->numeric(),
                        DatePicker::make('read_date')->default('today'),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unit.name')->sortable(),
                TextColumn::make('reading'),
                TextColumn::make('read_date')->date()->sortable()
            ])
            ->defaultSort('read_date', 'desc')
            ->filters([
                SelectFilter::make('unit_name')->relationship('unit', 'name'),
                SelectFilter::make('created_at')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\CreateAction::make('Create Bill')->action('create_bill')
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
            'index' => Pages\ListReadings::route('/'),
            'create' => Pages\CreateReading::route('/create'),
            'edit' => Pages\EditReading::route('/{record}/edit'),
        ];
    }

    public function create_bill(): void
    {
        // ...
    }
}
