<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'wedding', 'slug' => 'wedding', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'logo', 'slug' => 'logo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'cute', 'slug' => 'cute', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
