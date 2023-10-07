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
use Filament\Forms\Components\Textarea;

class RentalIncomeResource extends Resource
{
    protected static ?string $model = RentalIncome::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'List Rental Incomes';
    protected static ?string $navigationGroup = 'Rental Income';

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
                        TextInput::make('amount')->numeric()->required(),
                        Select::make('category')
                            ->options([
                                'rent' => 'Rent',
                                'parking' => 'Parking',
                                'manila water' => 'Manila Water',
                                'meralco' => 'Meralco',
                                'advance/deposit' => 'Advance/Deposit',
                                'sales' => 'Sales',
                                'interest' => 'Interest',
                                'labor' => 'Labor',
                                'supplies' => 'Supplies',
                                'repair' => 'Repair',
                                'fine' => 'Fine',
                                'others' => 'Others',

                            ])->default('rent'),
                        Select::make('payment_mode')
                            ->options([
                                'Cash' => 'Cash',
                                'Gcash' => 'Gcash',
                                'BPI' => 'BPI',
                                'BDO' => 'BDO',
                                'Cheque' => 'Cheque',
                            ])->default('gcash'),
                        DatePicker::make('pay_date')->default(now()),
                        Textarea::make('notes'),
                    ])->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unit.name')->sortable()->searchable(),
                TextColumn::make('tenant.name')->sortable(),
                TextColumn::make('pay_date')->sortable(),
                TextColumn::make('category')->sortable(),
                TextColumn::make('payment_mode')->label('Mode'),
                TextColumn::make('notes')->wrap(),
                TextColumn::make('amount')->color('success'),
            ])
            ->defaultSort('created_at', 'desc')
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
