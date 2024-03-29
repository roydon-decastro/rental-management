<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitResource\Pages;
use App\Filament\Resources\UnitResource\RelationManagers;
use App\Filament\Resources\UnitResource\RelationManagers\TenantsRelationManager;
use App\Filament\Resources\UnitResource\RelationManagers\ReadingsRelationManager;
use App\Models\Unit;
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

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationGroup = 'Property Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('property_id',)
                            ->relationship('property', 'name')->required(),
                        TextInput::make('name')->required()->maxLength(255),
                        TextInput::make('meralco')->required()->maxLength(255),
                        TextInput::make('rent')->required(),
                        Select::make('status')
                            ->options([
                                'available' => 'Available',
                                'occupied' => 'Occupied',
                                'maintenance' => 'Maintenance',
                                'reserved' => 'Reserved',
                            ])->default('Available')->required(),
                        Select::make('floor')
                            ->options([
                                '1st' => '1st',
                                '2nd' => '2nd',
                                '3rd' => '3rd',
                                '4th' => '4th',
                                '5th' => '5th',
                            ])->required(),
                        Select::make('layout')
                            ->options([
                                'Studio' => 'Studio',
                                '1BR' => '1 Bedroom',
                                '2BR' => '2 Bedroom',
                                '3BR' => '3 Bedroom',
                            ])->default('Studio')->required(),
                        Select::make('type')
                            ->options([
                                'a' => 'A',
                                'b' => 'B',
                                'c' => 'C',
                                'd' => 'D',
                            ])->required(),
                        Select::make('meter_type')
                            ->options([
                                'lxs' => 'lxs',
                                'lamco' => 'lamco',
                            ])->default('lxs')->required(),
                        Select::make('function')
                            ->options([
                                'residential' => 'Residential',
                                'commercial' => 'Commercial',
                                'mixed' => 'Mixed',
                            ])->default('residential')->required(),
                    ])->columns(2)

            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('status')->sortable()->searchable(),
                TextColumn::make('meralco')->sortable()->searchable(),
                TextColumn::make('rent')->money('php', true),
                TextColumn::make('type')->enum([
                    'a' => 'A',
                    'b' => 'B',
                    'c' => 'C',
                    'd' => 'D',
                ])->sortable(),
                // TextColumn::make('meter_type')->enum([
                //     'lxs' => 'lxs',
                //     'lamco' => 'lamco',
                // ]),
                TextColumn::make('function')->enum([
                    'residential' => 'Residential',
                    'commercial' => 'Commercial',
                    'mixed' => 'Mixed',
                ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TenantsRelationManager::class,
            ReadingsRelationManager::class,
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'view' => Pages\ViewUnit::route('/{record}'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }
}
