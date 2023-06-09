<?php

namespace App\Filament\Resources;

use Closure;
use Carbon\Carbon;
use Filament\Forms;
use App\Models\Bill;
use App\Models\Rate;
use App\Models\Unit;
use Filament\Tables;
use App\Models\Tenant;
use App\Models\Reading;
use Filament\Resources\Form;
use Filament\Resources\Table;

use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
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

    protected static ?string $navigationGroup = 'Water Transactions';



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
                TextColumn::make('tenant.name')->sortable(),
                TextColumn::make('read_date')->date()->sortable(),
                TextColumn::make('reading'),
                // IconColumn::make('bill_created')->boolean()->label('Bill Created'),
            ])
            ->defaultSort('read_date', 'desc')
            ->filters([
                SelectFilter::make('unit_name')->relationship('unit', 'name'),

            ])
            ->actions([
                // Tables\Actions\CreateAction::make('Create Bill')->action('create_bill')
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
        return static::getModel()::whereMonth('readings.created_at', Carbon::now()->month)
            ->count();
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

    public function calculate_bill(): void
    {
        // ...
    }
}
