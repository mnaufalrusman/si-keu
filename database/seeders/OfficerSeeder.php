<?php

namespace Database\Seeders;

use App\Models\Officer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officers = [
            [
                'name' => 'Hasbi',
                'position' => 'Backend',
                'address' => 'jl. keramat',
                'age' => 20,
                'contact' => 2343431,
            ],
            [
                'name' => 'dhea',
                'position' => 'UI/UX',
                'address' => 'Handil Bakti',
                'age' => 19,
                'contact' => 81234534,
            ],
            [
                'name' => 'rasyid',
                'position' => 'Frontend',
                'address' => 'Sungai bilu',
                'age' => 21,
                'contact' => 81233453,
            ]
        ];

        Officer::insert($officers);
    }
}
