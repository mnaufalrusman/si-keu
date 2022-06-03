<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenses = [
            [
                'expense_detail_id' => 1,
                'created_at' => date('Y-m-d', time()),
                'count' => 25000
            ],
            [
                'expense_detail_id' => 2,
                'created_at' => date('Y-m-d', time()),
                'count' => 17000
            ],
            [
                'expense_detail_id' => 1,
                'created_at' => date('Y-m-d', time()),
                'count' => 8000
            ]
        ];

        Expense::insert($expenses);
    }
}
