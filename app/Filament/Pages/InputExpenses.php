<?php

namespace App\Filament\Pages;

use App\Models\Expense;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class InputExpenses extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.input-expenses';

    protected static ?string $navigationGroup = 'Expenses';

    public $expenses_count;
    public $expense_categories;
    public $expensesArray = [];

    public function mount()
    {
        $this->expense_categories = DB::table('expense_categories')
            ->select('id', 'name')
            ->get()->toArray();
    }

    public function updated()
    {
        $this->expense_categories = DB::table('expense_categories')
            ->select('id', 'name')
            ->get()->toArray();
    }

    public function submit()
    {
        // dd($this->expensesArray);
        // dd($this->expensesArray[1]['name']);
        foreach ($this->expensesArray as $single_expense) {
            $expense = new Expense();
            $expense->name = $single_expense['name'];
            $expense->expense_category_id = isset($single_expense['expense_category_id']) ? $single_expense['expense_category_id'] : null;
            $expense->payment_date = isset($single_expense['payment_date']) ? $single_expense['payment_date'] : null;
            $expense->amount = isset($single_expense['amount']) ? $single_expense['amount'] : null;
            $expense->payment_mode = isset($single_expense['payment_mode']) ? $single_expense['payment_mode'] : null;
            $expense->vendor = isset($single_expense['vendor']) ? $single_expense['vendor'] : null;
            $expense->or_num = isset($single_expense['or_num']) ? $single_expense['or_num'] : null;
            $expense->notes = isset($single_expense['notes']) ? $single_expense['notes'] : null;
            $expense->created_at = isset($single_expense['payment_date']) ? $single_expense['payment_date'] : null;
            // dd($expense);
            $expense->save();
        };

        return redirect()->to('admin');
    }
}
