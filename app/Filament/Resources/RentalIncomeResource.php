<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\RentalIncome;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RentalIncomeResource\Pages;
use App\Filament\Resources\RentalIncomeResource\RelationManagers;
use App\Models\Tenant;
use App\Models\Unit;

class RentalIncomeResource extends Resource
{
    protected static ?string $model = RentalIncome::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Rent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('unit_id',)
                            ->label('Unit')
                            ->options(Unit::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('tenant_id', null)),
                        Select::make('tenant_id',)
                            ->required()
                            ->options(function (callable $get) {
                                $unit = Unit::find($get('unit_id'));
                                if (!$unit) {
                                    return Tenant::all()->pluck('name', 'id');
                                }
                                return $unit->tenants->pluck('name', 'id');
                            })
                            ->reactive(),
                        TextInput::make('income')->required()->maxLength(255),
                        DatePicker::make('pay_date'),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unit.name')->sortable(),
                TextColumn::make('tenant.name')->sortable(),
                TextColumn::make('income'),
                TextColumn::make('pay_date'),
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
            'index' => Pages\ListRentalIncomes::route('/'),
            'create' => Pages\CreateRentalIncome::route('/create'),
            'edit' => Pages\EditRentalIncome::route('/{record}/edit'),
        ];
    }
}
