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
                IconColumn::make('bill_created')->boolean()->label('Bill Created'),
            ])
            ->defaultSort('read_date', 'desc')
            ->filters([
                SelectFilter::make('unit_name')->relationship('unit', 'name'),

            ])
            ->actions([

                Tables\Actions\Action::make('Create Bill')
                    ->action(function (Reading $record, array $data): void {
                        // dd($record);
                        // dd($data);
                        $tenant = Tenant::find($record->tenant_id);
                        // dd($tenant->name);
                        $bill = new Bill;
                        $bill->unit_id = $record->unit_id;
                        $bill->reading_id = $record->id;
                        $bill->current_reading = $record->reading;
                        $bill->curr_read_date = $record->read_date;
                        $bill->unit_name = $data['unit_id'];
                        $bill->prev_reading = $data['prev_reading'];
                        $bill->prev_read_date = $data['prev_read_date'];
                        $bill->consumption = $data['curr_reading'] - $data['prev_reading'];
                        $bill->prev_balance = $data['prev_balance'];
                        $bill->rate = $data['rate'];
                        $bill->curr_balance = $data['curr_balance'];
                        $bill->service_charge_rate = $data['service_charge_rate'];
                        $bill->service_charge = $data['service_charge'];
                        $bill->vat = $data['vat'];
                        $bill->prev_read_id = $data['prev_read_id'];
                        $bill->total_amount_due = $data['total_amount_due'] - $data['prev_balance'];
                        $bill->tenant_name = $tenant->name;
                        $bill->save();
                        $record->bill_created = 1;
                        $record->save();
                    })
                    ->requiresConfirmation()
                    ->modalButton('Create Bill')
                    ->disabled(function (Reading $record): bool {
                        if ($record->bill_created == true) {
                            return true;
                        }
                        else {
                            return false;

                        }
                    })
                    ->form([
                        Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('unit_id')
                                    ->label('For Unit')
                                    ->default(function (Reading $record): string {
                                        $unit = Unit::find($record['unit_id']);
                                        return $unit->name;
                                    })
                                    ->disabled(),
                                TextInput::make('prev_balance')
                                    ->label('Previous Balance')
                                    ->numeric()
                                    ->default(0),
                                // ->disabled(),

                                Forms\Components\TextInput::make('curr_read_date')
                                    ->label('From')
                                    ->default(function (Reading $record): string {
                                        return $record['read_date'];
                                    })
                                    ->disabled(),
                                Forms\Components\TextInput::make('prev_read_date')
                                    ->label('To')
                                    ->default(function (callable $set, $get, $state, Reading $record) {
                                        // ->default(function (Reading $record): string {
                                        $currentMonth = Carbon::parse($record['read_date']);
                                        $prevMonth = $currentMonth->subMonth()->month;
                                        $reading = DB::table('readings')
                                            ->where('readings.unit_id', '=', $record['unit_id'])
                                            ->whereMonth('read_date', $prevMonth)
                                            ->get()->toArray();
                                        // dd($reading);
                                        $set('prev_read_id', $reading[0]->id);
                                        return $reading[0]->read_date;
                                    })
                                    ->disabled(),
                                Forms\Components\TextInput::make('curr_reading')
                                    ->label('Current Reading')
                                    ->default(function (Reading $record): string {
                                        return $record->reading;
                                    })
                                    ->disabled(),
                                Forms\Components\TextInput::make('prev_reading')
                                    ->label('Previous Reading')
                                    ->default(function (Reading $record): string {
                                        $currentMonth = Carbon::parse($record['read_date']);
                                        $prevMonth = $currentMonth->subMonth()->month;
                                        $reading = DB::table('readings')
                                            ->where('readings.unit_id', '=', $record['unit_id'])
                                            ->whereMonth('read_date', $prevMonth)
                                            ->get()->toArray();
                                        return $reading[0]->reading;
                                    })->disabled(),
                                Forms\Components\TextInput::make('total_amount_due')
                                    ->label('Amount Due')
                                    ->default(function (callable $set, $get, $state, Reading $record) {
                                        $current_reading = $record['reading'];
                                        $previous_reading = $get('prev_reading');
                                        $consumption = $current_reading - $previous_reading;
                                        // error $set('curr_balance', $get('consumption') * $get('rate'));
                                        $rates = Rate::all();
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
                                        }
                                        // fyi tier 2
                                        $consumption = $consumption - $rates[0]['tier'];
                                        if ($consumption > 0) {
                                            if ($consumption < $rates[1]['tier']) {
                                                $tier2 = $consumption * $rates[1]['rate'];
                                            } else {
                                                $tier2 = $rates[1]['tier'] * $rates[1]['rate'];
                                            }
                                        }
                                        // fyi tier 3
                                        $consumption = $consumption - $rates[1]['tier'];
                                        if ($consumption > 0) {
                                            if ($consumption < $rates[2]['tier']) {
                                                $tier3 = $consumption * $rates[2]['rate'];
                                            } else {
                                                $tier3 = $rates[2]['tier'] * $rates[2]['rate'];
                                            }
                                        }
                                        // fyi tier 4
                                        $consumption = $consumption - $rates[2]['tier'];
                                        if ($consumption > 0) {
                                            if ($consumption < $rates[3]['tier']) {
                                                $tier4 = $consumption * $rates[3]['rate'];
                                            } else {
                                                $tier4 = $rates[3]['tier'] * $rates[3]['rate'];
                                            }
                                        }
                                        // fyi tier 5
                                        $consumption = $consumption - $rates[3]['tier'];
                                        if ($consumption > 0) {
                                            if ($consumption < $rates[4]['tier']) {
                                                $tier5 = $consumption * $rates[4]['rate'];
                                            } else {
                                                $tier5 = $rates[4]['tier'] * $rates[4]['rate'];
                                            }
                                        }
                                        // fyi tier 6
                                        $consumption = $consumption - $rates[4]['tier'];
                                        if ($consumption > 0) {
                                            if ($consumption < $rates[5]['tier']) {
                                                $tier6 = $consumption * $rates[5]['rate'];
                                            } else {
                                                $tier6 = $rates[5]['tier'] * $rates[5]['rate'];
                                            }
                                        }
                                        // fyi tier 7
                                        $consumption = $consumption - $rates[5]['tier'];
                                        if ($consumption > 0) {
                                            if ($consumption < $rates[6]['tier']) {
                                                $tier7 = $consumption * $rates[6]['rate'];
                                            } else {
                                                $tier7 = $rates[6]['tier'] * $rates[6]['rate'];
                                            }
                                        }
                                        // fyi tier 8
                                        $consumption = $consumption - $rates[6]['tier'];
                                        if ($consumption > 0) {
                                            if ($consumption < $rates[7]['tier']) {
                                                $tier8 = $consumption * $rates[7]['rate'];
                                            } else {
                                                $tier8 = $rates[7]['tier'] * $rates[7]['rate'];
                                            }
                                        }
                                        // fyi tier 9
                                        $consumption = $consumption - $rates[7]['tier'];
                                        if ($consumption > 0) {
                                            $tier9 = $consumption * $rates[8]['rate'];
                                            // $set('tier9', $tier9);
                                        }
                                        $consumption = $consumption - $rates[8]['tier'];
                                        $msc = DB::table('service_charges')->latest('created_at')->first();
                                        $service_charge_rate =  $msc->rate;
                                        $current_bal = $tier1 + $tier2 + $tier3 + $tier4 + $tier5 + $tier6 + $tier7 + $tier8 + $tier9;
                                        $set('curr_balance', $current_bal);
                                        $service_charge = number_format(($current_bal * $service_charge_rate / 100), 2);
                                        $set('service_charge', $service_charge);
                                        $total_amount_due = $current_bal + $service_charge + $get('prev_balance');

                                        return number_format($total_amount_due, 2);
                                    })
                                    ->reactive()
                                    ->disabled(),
                                Forms\Components\TextInput::make('curr_balance')->default(function (callable $get) {
                                    $current_bal = number_format($get('curr_balance'), 2);
                                    return $current_bal;
                                }),
                                Forms\Components\TextInput::make('service_charge')->default(function (callable $get) {
                                    $service_charge = number_format($get('service_charge'), 2);
                                    return $service_charge;
                                })->hidden(),
                                Forms\Components\TextInput::make('prev_read_id')->default(function (callable $get) {
                                    $prev_read_id = $get('prev_read_id');
                                    return $prev_read_id;
                                })->hidden(),
                                TextInput::make('rate')
                                    ->label('Rate per cubic meter (PHP)')
                                    ->default(function (callable $get) {
                                        $rate = DB::table('rates')->latest('created_at')->first();
                                        return $rate->rate;
                                    })
                                    ->disabled()->hidden(),
                                TextInput::make('vat')
                                    ->label('Value Added Tax (VAT)')
                                    ->default(function (callable $get) {
                                        $vats = DB::table('vats')->latest('created_at')->first();
                                        return $vats->rate;
                                    })
                                    ->disabled()->hidden(),
                                TextInput::make('service_charge_rate')
                                    ->label('Maintenance Service Charge (%)')
                                    ->default(function (callable $get) {
                                        $msc = DB::table('service_charges')->latest('created_at')->first();
                                        return $msc->rate;
                                    })
                                    ->disabled()->hidden(),
                            ])
                            ->columns(2),

                    ])




                    ->color('success')
                    ->icon('heroicon-o-cash'),

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
}
