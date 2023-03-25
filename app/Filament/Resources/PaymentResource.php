<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Payment;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PaymentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaymentResource\RelationManagers;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';

    protected static ?string $navigationGroup = 'Water Transactions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bill.unit_name')->sortable()->label('Unit'),
                TextColumn::make('bill.tenant_name')->sortable()->label('Tenant'),
                TextColumn::make('bill.id')->label('Bill ID')
                    // ->url(fn (): string => url('admin/bills/{record}'))
                    ->url(function (Payment $record): string {

                        return url('admin/bills/' . $record->bill_id);
                    }),
                TextColumn::make('pay_date')->sortable(),
                TextColumn::make('pay_amount')->sortable(),
                TextColumn::make('pay_method')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\Action::make('Print')->label('Print AR')
                //     ->icon('heroicon-o-printer'),
                Tables\Actions\Action::make('receipt')
                    ->url(fn (Payment $record): string => route('receipt', $record))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-printer')
                    ->label('AR PDF'),

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
        return static::getModel()::whereMonth('payments.created_at', Carbon::now()->month)
            ->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            // 'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
