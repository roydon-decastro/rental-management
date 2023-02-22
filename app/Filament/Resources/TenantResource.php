<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Tenant;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;


use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TenantResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Resources\TenantResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

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
                        TextInput::make('name')->required()->maxLength(255),
                        // TextInput::make('first_name')->required()->maxLength(255),
                        TextInput::make('email')->required()->maxLength(255)->unique(ignoreRecord:true),
                        TextInput::make('id_type')->required()->maxLength(255),
                        TextInput::make('id_number')->required()->maxLength(255),
                        TextInput::make('cellphone')->required()->maxLength(255),
                        Select::make('sex')
                            ->options([
                                'm' => 'Male',
                                'f' => 'Female',
                            ])->required(),
                        DatePicker::make('dob'),
                        TextInput::make('plate')->label('Motorcycle Plate Number')->maxLength(255),
                        Toggle::make('is_primary')
                            ->onIcon('heroicon-o-check')
                            ->offIcon('heroicon-o-x')
                            ->onColor('success'),
                        Toggle::make('is_current')
                            ->onIcon('heroicon-o-check')
                            ->offIcon('heroicon-o-x')
                            ->onColor('success'),
                        Toggle::make('has_parking')
                            ->onIcon('heroicon-o-check')
                            ->offIcon('heroicon-o-x')
                            ->onColor('success'),
                        FileUpload::make('photo')
                        // SpatieMediaLibraryFileUpload::make('photo')->collection('tenants'),

                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('unit.name')->sortable(),
                // TextColumn::make('Name')
                //     ->getStateUsing(function (Tenant $record) {
                //         // return whatever you need to show
                //         return $record->first_name . ' ' . $record->l_name;
                //     }),
                TextColumn::make('name'),
                TextColumn::make('created_at')->sortable()->hidden(),
                TextColumn::make('cellphone'),
                // TextColumn::make('plate'),
                TextColumn::make('email'),
                TextColumn::make('sex')->enum([
                    'm' => 'Male',
                    'f' => 'Female',
                ]),
                IconColumn::make('is_primary')->boolean()->label('Primary'),
                IconColumn::make('is_current')->boolean()->label('Current'),
                IconColumn::make('has_parking')->boolean()->label('Parking'),
                ImageColumn::make('photo')

                // SpatieMediaLibraryImageColumn::make('photo')->collection('tenants'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('is_current')
                    ->query(fn (Builder $query): Builder => $query->where('is_current', true)),
                Filter::make('is_primary')
                    ->query(fn (Builder $query): Builder => $query->where('is_primary', true)),
                Filter::make('has_parking')
                    ->query(fn (Builder $query): Builder => $query->where('has_parking', true))
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
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
            'view' => Pages\ViewTenant::route('/{record}'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
