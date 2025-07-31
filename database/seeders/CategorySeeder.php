<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        $categories = [
            ['cat_name' => 'Makanan', 'description' => 'Kategori makanan'],
            ['cat_name' => 'Minuman', 'description' => 'Kategori minuman'],
            ['cat_name' => 'Snack', 'description' => 'Kategori Snack'],
        ];

        DB::table('categories')->insert($categories);
    }
}
