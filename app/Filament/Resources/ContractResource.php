<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Unit;
use Filament\Tables;
use App\Models\Tenant;
use App\Models\Contract;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ContractResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContractResource\RelationManagers;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Property Management';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('unit_id')
                            ->label('Unit')
                            ->options(Unit::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('tenant_id', null)),
                        Select::make('tenant_id')
                            ->label('Tenant')
                            ->required()
                            ->options(function (callable $get) {
                                $unit = Unit::find($get('unit_id'));
                                if (!$unit) {
                                    return Tenant::all()->pluck('name', 'id');
                                }
                                return $unit->tenants->pluck('name', 'id');
                            })
                            ->reactive(),
                        // ->afterStateUpdated(fn (callable $set) => $set('tenant_id', null)),
                        DatePicker::make('start_date'),
                        DatePicker::make('end_date'),
                        Select::make('period')
                            ->label('Contract Period')
                            ->options([
                                '6 months' => '6 months',
                                '1 year' => '1 year',
                                '2 years' => '2 years',
                                'short term' => 'short term',
                            ])
                            ->default('6 months'),
                        TextArea::make('notes'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unit.name'),
                TextColumn::make('tenant.name'),
                TextColumn::make('start_date'),
                TextColumn::make('end_date'),
                TextColumn::make('period'),
                IconColumn::make('tenant.is_current')->label('Current')->boolean(),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
