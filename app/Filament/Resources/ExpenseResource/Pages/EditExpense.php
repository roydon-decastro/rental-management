<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Resources\ExpenseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditExpense extends EditRecord
{
    protected static string $resource = ExpenseResource::class;


    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // $record->update($data);

        // dd($data);

        $expense_category = DB::table('expense_categories')->select('name')
            ->where('id', '=', $data['expense_category_id'])->first();
        // dd($expense_category->name);

        $data['category_name'] = $expense_category->name;

        // dd($data);

        $record->update($data);


        return $record;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
