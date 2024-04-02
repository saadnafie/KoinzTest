<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Clean Code',
                'description' => 'Clean Code Book',
            ],
            [
                'title' => 'Harry Potter',
                'description' => 'Harry Potter Book',
            ],
            [
                'title' => 'Design Pattern',
                'description' => 'Design Pattern Book',
            ],
            [
                'title' => 'Programming basics',
                'description' => 'Programming basics Book',
            ],
            [
                'title' => 'Learning English',
                'description' => 'Learning English Book',
            ],
            [
                'title' => 'Database design',
                'description' => 'Database design Book',
            ],
            [
                'title' => 'Data structure',
                'description' => 'Data structure Book',
            ],
            [
                'title' => 'System design',
                'description' => 'System design Book',
            ]
        ]);
    }
}
