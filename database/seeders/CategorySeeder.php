<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Category 1'],
            ['category_name' => 'Category 2'],
            ['category_name' => 'Category 3'],
            // Tambahkan data kategori lainnya sesuai kebutuhan
        ];

        // Masukkan data ke tabel categories
        DB::table('categories')->insert($categories);
    }
}
