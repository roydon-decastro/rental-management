<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Expense;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ExpenseResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\ExpenseCategory;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Facades\DB;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Expenses';

    protected static ?string $navigationLabel = 'List Expenses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        DatePicker::make('payment_date')->required(),
                        TextInput::make('amount')
                            ->numeric()->required(),
                        Select::make('expense_category_id')
                            ->options(ExpenseCategory::all()->pluck('name', 'id'))
                            ->label('Category')
                            ->required()
                            ->searchable(),
                        // TextInput::make('category_name')->default(function (callable $get) {
                        //     $expense_category = DB::table('expense_categories')->select('name')
                        //         ->where('id', '=', $get('expense_category_id'))->first();
                        //     return $expense_category->name;
                        // }),
                        TextInput::make('vendor')->label('Vendor/Recipient')->required()->maxLength(255),
                        Select::make('payment_mode')
                            ->options([
                                'cash' => 'Cash',
                                'digital' => 'Digital',
                                'checque' => 'Checque',
                            ]),
                        TextInput::make('or_num')->label('OR Number')->maxLength(255),
                        Textarea::make('notes')

                    ])->columns(4)
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->size('sm'),
                TextColumn::make('payment_date')->label('Pay Date')->size('sm'),
                TextColumn::make('vendor')->label('Vendor/Recipient')->size('sm'),
                TextColumn::make('expense_category.name')->size('sm')->sortable(),
                BadgeColumn::make('payment_mode')->colors([
                    'primary' => 'digital',
                    'warning' => 'checque',
                    'success' => 'cash',
                ]),
                TextColumn::make('amount')->size('md')->color('primary'),
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
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
