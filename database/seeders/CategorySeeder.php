<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Website',
                'type' => 'pendapatan'
            ],
            [
                'name' => 'Desain',
                'type' => 'pendapatan'
            ],
            [
                'name' => 'Bisnis',
                'type' => 'pendapatan'
            ],
            [
                'name' => 'Domain',
                'type' => 'pengeluaran'
            ],
            [
                'name' => 'Makanan',
                'type' => 'pengeluaran'
            ],
            [
                'name' => 'ATK',
                'type' => 'pengeluaran'
            ]
        ];

        Category::insert($categories);
    }
}
