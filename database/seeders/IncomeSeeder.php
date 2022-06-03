<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomes = [
            [
                'income_detail_id' => 1,
                'created_at' => date('Y-m-d', time()),
                'count' => 50000
            ],
            [
                'income_detail_id' => 2,
                'created_at' => date('Y-m-d', time()),
                'count' => 30000
            ],
            [
                'income_detail_id' => 1,
                'created_at' => date('Y-m-d', time()),
                'count' => 60000
            ]
        ];

        Income::insert($incomes);
    }
}
