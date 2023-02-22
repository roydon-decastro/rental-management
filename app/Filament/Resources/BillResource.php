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


    protected static ?string $navigationGroup = 'Transactions';

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
                                $consumption = $get('curr_reading') - $get('prev_reading');
                                $set('consumption', $consumption);
                                // error $set('curr_balance', $get('consumption') * $get('rate'));
                                $rates = Rate::all();
                                // dd($rates[3]['rate']);
                                // dd($rates);
                                // fyi tier 1
                                $tier1 = 0;
                                $tier2 = 0;
                                $tier3 = 0;
                                $tier4 = 0;
                                $tier5 = 0;
                                $tier6 = 0;
                                $tier7 = 0;
                                $tier8 = 0;
                                $tier9 = 0;
                                if ($consumption > 0) {
                                    if ($consumption < $rates[0]['tier']) {
                                        $tier1 = $consumption * $rates[0]['rate'];
                                    } else {
                                        $tier1 = $rates[0]['tier'] * $rates[0]['rate'];
                                    }
                                    $set('tier1', $tier1);
                                }
                                // fyi tier 2
                                $consumption = $consumption - $rates[0]['tier'];
                                if ($consumption > 0) {
                                    if ($consumption < $rates[1]['tier']) {
                                        $tier2 = $consumption * $rates[1]['rate'];
                                    } else {
                                        $tier2 = $rates[1]['tier'] * $rates[1]['rate'];
                                    }
                                    $set('tier2', $tier2);
                                }
                                // fyi tier 3
                                $consumption = $consumption - $rates[1]['tier'];
                                if ($consumption > 0) {
                                    if ($consumption < $rates[2]['tier']) {
                                        $tier3 = $consumption * $rates[2]['rate'];
                                    } else {
                                        $tier3 = $rates[2]['tier'] * $rates[2]['rate'];
                                    }
                                    $set('tier3', $tier3);
                                }
                                // fyi tier 4
                                $consumption = $consumption - $rates[2]['tier'];
                                if ($consumption > 0) {
                                    if ($consumption < $rates[3]['tier']) {
                                        $tier4 = $consumption * $rates[3]['rate'];
                                    } else {
                                        $tier4 = $rates[3]['tier'] * $rates[3]['rate'];
                                    }
                                    $set('tier4', $tier4);
                                }
                                // fyi tier 5
                                $consumption = $consumption - $rates[3]['tier'];
                                if ($consumption > 0) {
                                    if ($consumption < $rates[4]['tier']) {
                                        $tier5 = $consumption * $rates[4]['rate'];
                                    } else {
                                        $tier5 = $rates[4]['tier'] * $rates[4]['rate'];
                                    }
                                    $set('tier5', $tier5);
                                }
                                // fyi tier 6
                                $consumption = $consumption - $rates[4]['tier'];
                                if ($consumption > 0) {
                                    if ($consumption < $rates[5]['tier']) {
                                        $tier6 = $consumption * $rates[5]['rate'];
                                    } else {
                                        $tier6 = $rates[5]['tier'] * $rates[5]['rate'];
                                    }
                                    $set('tier6', $tier6);
                                }
                                // fyi tier 7
                                $consumption = $consumption - $rates[5]['tier'];
                                if ($consumption > 0) {
                                    if ($consumption < $rates[6]['tier']) {
                                        $tier7 = $consumption * $rates[6]['rate'];
                                    } else {
                                        $tier7 = $rates[6]['tier'] * $rates[6]['rate'];
                                    }
                                    $set('tier7', $tier7);
                                }
                                // fyi tier 8
                                $consumption = $consumption - $rates[6]['tier'];
                                if ($consumption > 0) {
                                    if ($consumption < $rates[7]['tier']) {
                                        $tier8 = $consumption * $rates[7]['rate'];
                                    } else {
                                        $tier8 = $rates[7]['tier'] * $rates[7]['rate'];
                                    }
                                    $set('tier8', $tier8);
                                }
                                // fyi tier 9
                                $consumption = $consumption - $rates[7]['tier'];
                                if ($consumption > 0) {
                                    // if ($consumption < $rates[8]['tier']) {
                                        $tier9 = $consumption * $rates[8]['rate'];
                                    // } else {
                                    //     $tier9 = $rates[8]['tier'] * $rates[8]['rate'];
                                    // }
                                    $set('tier9', $tier9);
                                }
                                // $consumption = $consumption - $rates[8]['tier'];

                                // dd($tier1 . ' ' . $tier2 . ' ' . $tier3 . ' ' . $tier4 . ' ' . $tier5 . ' ' . $tier6 . ' ' . $tier7 . ' ' . $tier8 . ' ' . $tier9);
                                $current_bal = $tier1 + $tier2 + $tier3 + $tier4 + $tier5 + $tier6 + $tier7 + $tier8 + $tier9;

                                $set('curr_balance', $current_bal);
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

                Card::make()
                    ->schema([
                        TextInput::make('tier1'),
                        TextInput::make('tier2'),
                        TextInput::make('tier3'),
                        TextInput::make('tier4'),
                        TextInput::make('tier5'),
                        TextInput::make('tier6'),
                        TextInput::make('tier7'),
                        TextInput::make('tier8'),
                        TextInput::make('tier9'),

                    ])->columns(3),

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
