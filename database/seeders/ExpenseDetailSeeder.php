<?php

namespace Database\Seeders;

use App\Models\ExpenseDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenseDetails = [
            [
                'name' => 'Domain',
            ],
            [
                'name' => 'Makanan',
            ],
            [
                'name' => 'ATK',
            ]
        ];

        ExpenseDetail::insert($expenseDetails);
    }
}
