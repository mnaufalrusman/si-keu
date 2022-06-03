<?php

namespace Database\Seeders;

use App\Models\IncomeDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomeDetails = [
            [
                'name' => 'Website',
            ],
            [
                'name' => 'Desain',
            ],
            [
                'name' => 'Bisnis',
            ]
        ];

        IncomeDetail::insert($incomeDetails);
    }
}
