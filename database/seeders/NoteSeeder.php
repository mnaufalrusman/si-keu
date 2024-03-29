<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = [
            [
                'name' => 'Semangat bekerjanya :)',
            ],
            [
                'name' => 'Masih ada hari esok',
            ]
        ];

        Note::insert($notes);
    }
}
