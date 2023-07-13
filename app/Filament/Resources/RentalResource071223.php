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

class ReadingResource071223 extends Resource
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
                        } else {
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
                                        // dd($rate);
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

    public function calculate_bill(): void
    {
        // ...
    }
}
