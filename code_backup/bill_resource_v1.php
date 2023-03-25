<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Bill;
use App\Models\Rate;
use App\Models\Unit;
use Filament\Tables;
use App\Models\Tenant;
use App\Models\Reading;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use App\Models\ServiceCharge;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use App\Filament\Resources\BillResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BillResource\RelationManagers;

class BillResource extends Resource
{
    protected static ?string $model = Bill::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';


    protected static ?string $navigationGroup = 'Water Transactions';

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
                            ->afterStateUpdated(fn (callable $set) => $set('reading_id', null))
                            ->afterStateUpdated(fn (callable $set) => $set('tenant_name', null))
                            ->afterStateUpdated(fn (callable $set) => $set('curr_reading', null)),
                        TextInput::make('prev_balance')
                            ->label('Previous Balance (PHP)')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),

                Card::make()
                    ->schema([
                        Select::make('reading_id')
                            ->label('Current Read Date')
                            ->required()
                            ->options(function (callable $get) {
                                $unit = Unit::find($get('unit_id'));
                                if (!$unit) {
                                    return Reading::all()->pluck('read_date', 'id');
                                }
                                // return $unit->readings->pluck('read_date', 'id'); OK
                                return $unit->readings->sortByDesc('read_date')->pluck('read_date', 'id');
                            })
                            ->reactive()
                            ->afterStateUpdated(function (Closure $set, $get, $state) {
                                $unit = Unit::find($get('unit_id'));
                                $tenant = Unit::find($get('unit_id'))->tenants()->where('is_current', '=', true)
                                    ->where('is_primary', '=', true)->first();
                                $reading = Reading::find($get('reading_id'));

                                $new_value = $reading['reading'];
                                $set('curr_reading', $new_value);
                                // $set('primary', $unit['id']);
                                $set('tenant_name', $tenant->name);
                                $set('unit_name', $unit->name);
                                $set('curr_read_date', $reading->read_date);
                            }),

                        Select::make('prev_read_id')
                            ->label('Previous Read Date')
                            ->required()
                            ->options(function (callable $get) {
                                $unit = Unit::find($get('unit_id'));
                                if (!$unit) {
                                    return Reading::all()->pluck('read_date', 'id');
                                }
                                return $unit->readings->sortByDesc('read_date')->pluck('read_date', 'id');
                            })
                            ->afterStateUpdated(function (Closure $set, $get, $state) {
                                $unit = Unit::find($get('unit_id'));
                                $reading2 = Reading::find($get('prev_read_id'));
                                $prev_value = $reading2['reading'];
                                $set('prev_reading', $prev_value);
                                $set('prev_read_date', $reading2->read_date);
                                $set('consumption', $get('curr_reading') - $get('prev_reading'));
                                // error $set('curr_balance', $get('consumption') * $get('rate'));
                                // fyi tier 1
                                // fyi tier 2
                                // fyi tier 3
                                // fyi tier 4
                                // fyi tier 5
                                // fyi tier 6
                                // fyi tier 7
                                // fyi tier 8
                                // fyi tier 9

                                $set('curr_balance', $get('consumption'));
                                $set('service_charge', $get('curr_balance') * ($get('service_charge_rate') / 100));
                                $set('total_amount_due', $get('curr_balance') + $get('service_charge') + $get('prev_balance'));
                            })
                            ->reactive(),
                    ])->columns(2),

                Card::make()
                    ->schema([
                        Hidden::make('unit_name'),
                        TextInput::make('curr_reading')->disabled(),
                        TextInput::make('prev_reading')->disabled(),
                        TextInput::make('tenant_name')->label('Lessee')->disabled(),
                        Hidden::make('curr_read_date'),
                        Hidden::make('prev_read_date'),
                        TextInput::make('consumption')->label('Consumption in cubic meter')->disabled()->default(0),
                        TextInput::make('curr_balance')->label('Current Balance (PHP)')->default(0)->disabled(),
                        TextInput::make('service_charge')
                            ->label('Maintenance Service Charge Amount (PHP)')
                            ->default(0)
                            // ->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: 'PHP ', thousandsSeparator: ',', decimalPlaces: 2))
                            ->disabled(),

                        TextInput::make('total_amount_due')
                            ->label('Total Amount Due (PHP)')
                            ->default(0)
                            ->disabled(),
                        TextInput::make('rate')
                            ->label('Rate per cubic meter (PHP)')
                            ->default(function (callable $get) {
                                $rate = DB::table('rates')->latest('created_at')->first();
                                return $rate->rate;
                            })
                            ->disabled(),
                        TextInput::make('service_charge_rate')
                            ->label('Maintenance Service Charge (%)')
                            ->default(function (callable $get) {
                                $msc = DB::table('service_charges')->latest('created_at')->first();
                                return $msc->rate;
                            })
                            ->disabled(),
                        TextInput::make('vat')
                            ->label('Value Added Tax (VAT)')
                            ->default(function (callable $get) {
                                $vats = DB::table('vats')->latest('created_at')->first();
                                return $vats->rate;
                            })
                            ->disabled(),

                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unit_name')->sortable(),
                TextColumn::make('tenant_name')->sortable(),
                TextColumn::make('prev_read_date')->label('From Date'),
                TextColumn::make('curr_read_date')->label('To Date')->sortable(),
                TextColumn::make('prev_reading'),
                TextColumn::make('curr_reading'),
                TextColumn::make('consumption'),
                TextColumn::make('total_amount_due'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('unit_name')->relationship('unit', 'name')
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\Action::make('Print Invoice')->button()
                // ->url(fn () => route('print', $this->record))
                // ->openUrlInNewTab(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBills::route('/'),
            'create' => Pages\CreateBill::route('/create'),
            'view' => Pages\ViewBill::route('/{record}'),
            'edit' => Pages\EditBill::route('/{record}/edit'),
        ];
    }
}
