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
                'category_id' => 1,
                'created_at' => date('Y-m-d', time()),
                'count' => 3000000
            ],
            [
                'category_id' => 2,
                'created_at' => date('Y-m-d', time()),
                'count' => 1500000
            ],
            [
                'category_id' => 1,
                'created_at' => date('Y-m-d', time()),
                'count' => 2000000
            ]
        ];

        Expense::insert($expenses);
    }
}
