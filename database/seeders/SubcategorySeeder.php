<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::pluck('id', 'name');
        $subcategories = [
            ['category_id' => $categories['Cat'] ?? 1, 'name' => 'Food'],
            ['category_id' => $categories['Cat'] ?? 1, 'name' => 'Medicine'],
            ['category_id' => $categories['Cat'] ?? 1, 'name' => 'Toy'],
            ['category_id' => $categories['Cat'] ?? 1, 'name' => 'Accessories'],
            ['category_id' => $categories['Dog'] ?? 2, 'name' => 'Food'],
            ['category_id' => $categories['Dog'] ?? 2, 'name' => 'Medicine'],
            ['category_id' => $categories['Dog'] ?? 2, 'name' => 'Toy'],
            ['category_id' => $categories['Dog'] ?? 2, 'name' => 'Accessories'],
        ];
        \App\Models\Subcategory::insert($subcategories);
    }
}
