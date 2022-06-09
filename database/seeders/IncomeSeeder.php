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
                'count' => 5000000
            ],
            [
                'income_detail_id' => 2,
                'created_at' => date('Y-m-d', time()),
                'count' => 3000000
            ],
            [
                'income_detail_id' => 1,
                'created_at' => date('Y-m-d', time()),
                'count' => 6500000
            ]
        ];

        Income::insert($incomes);
    }
}
