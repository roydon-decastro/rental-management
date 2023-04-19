<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expense_categories = [
            [
                'name' => 'Advertising and Promotions'
            ],
            [
                'name' => 'Amortizations'
            ],
            [
                'name' => 'Bad Debts'
            ],
            [
                'name' => 'Charitable Contributions'
            ],
            [
                'name' => 'Commissions'
            ],
            [
                'name' => 'Communication, Light and Water'
            ],
            [
                'name' => 'Depletion'
            ],
            [
                'name' => 'Depreciation'
            ],
            [
                'name' => "Director's Fees"
            ],
            [
                'name' => 'Fringe Benefits'
            ],
            [
                'name' => 'Fuel and Oil Insurance'
            ],
            [
                'name' => 'Interest'
            ],
            [
                'name' => 'Janitorial and Messengerial Services'
            ],
            [
                'name' => 'Losses'
            ],
            [
                'name' => 'Management and Consultancy Fee'
            ],
            [
                'name' => 'Miscellaneous'
            ],
            [
                'name' => 'Office Supplies'
            ],
            [
                'name' => 'Other Services'
            ],
            [
                'name' => 'Professional Fees'
            ],
            [
                'name' => 'Rental'
            ],
            [
                'name' => 'Repairs and Maintenance-Labor'
            ],
            [
                'name' => 'Repairs and Maintenance-Materials/Supplies'
            ],
            [
                'name' => 'Representation and Entertainment'
            ],
            [
                'name' => 'Research and Development'
            ],
            [
                'name' => 'Royalties'
            ],
            [
                'name' => 'Salaries and Allowances'
            ],
            [
                'name' => 'Security Services'
            ],
            [
                'name' => 'SSS, GSIS, Philhealth, HDMF and Other Contributions'
            ],
            [
                'name' => 'Taxes and Licenses'
            ],
            [
                'name' => 'Tolling Fees'
            ],
            [
                'name' => 'Training and Seminars'
            ],
        ];

        foreach ($expense_categories as $key => $value) {
            ExpenseCategory::create($value);
        }

    }
}
