<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Serif', 'slug' => 'serif', 'description' => 'Font chữ có chân', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sans-serif', 'slug' => 'sans-serif', 'description' => 'Font chữ không chân', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Script', 'slug' => 'script', 'description' => 'Font chữ viết tay', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
