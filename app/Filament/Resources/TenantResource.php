<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Tenant;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;


use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TenantResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TenantResource\RelationManagers;

class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Property Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('unit_id',)
                            ->relationship('unit', 'name')->required(),
                        TextInput::make('last_name')->required()->maxLength(255),
                        TextInput::make('first_name')->required()->maxLength(255),
                        TextInput::make('email')->required()->maxLength(255),
                        TextInput::make('id_type')->required()->maxLength(255),
                        TextInput::make('id_number')->required()->maxLength(255),
                        TextInput::make('cellphone')->required()->maxLength(255),
                            Select::make('sex')
                            ->options([
                                'm' => 'Male',
                                'f' => 'Female',
                            ])->required(),
                        DatePicker::make('dob'),
                        Toggle::make('is_primary'),
                        Toggle::make('is_current'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unit.name')->sortable(),
                TextColumn::make('last_name')->sortable()->searchable(),
                TextColumn::make('first_name')->sortable()->searchable(),
                TextColumn::make('cellphone'),
                TextColumn::make('email'),
                TextColumn::make('sex')->enum([
                    'm' => 'Male',
                    'f' => 'Female',
                ]),
                IconColumn::make('is_primary')->boolean(),
                IconColumn::make('is_current')->boolean()
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
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
