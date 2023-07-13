<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Intent;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\IntentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IntentResource\RelationManagers;

class IntentResource extends Resource
{
    protected static ?string $model = Intent::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-add';
    protected static ?string $navigationLabel = 'Applications';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('property_id')
                    ->relationship('property', 'name')->disabled(),
                Select::make('unit_id')
                    ->relationship('unit', 'name')->disabled(),
                Select::make('user_id')->label('Applicant')
                    ->relationship('user', 'name')->disabled(),
                TextInput::make('contact_numbers')->disabled(),
                TextInput::make('current_address')->disabled(),
                TextInput::make('partner')->disabled(),
                Select::make('status')
                    ->options([
                        'submitted' => 'Submitted',
                        'under review' => 'Under Review',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected'
                    ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('property.name'),
                TextColumn::make('unit.name'),
                TextColumn::make('user.name'),
                TextColumn::make('status'),
                TextColumn::make('created_at')->since()->label('Created'),
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

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', '=', 'submitted')
            ->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIntents::route('/'),
            'create' => Pages\CreateIntent::route('/create'),
            'edit' => Pages\EditIntent::route('/{record}/edit'),
        ];
    }
}
