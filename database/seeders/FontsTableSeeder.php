<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FontsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fonts')->insert([
            [
                'name' => 'Lovely Script',
                'slug' => 'lovely-script',
                'file_path' => 'fonts/lovely-script.ttf',
                'preview_text' => 'Hello World',
                'format' => 'ttf',
                'category_id' => 3, // Script
                'downloads' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Modern Sans',
                'slug' => 'modern-sans',
                'file_path' => 'fonts/modern-sans.otf',
                'preview_text' => 'Hello World',
                'format' => 'otf',
                'category_id' => 2, // Sans-serif
                'downloads' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
