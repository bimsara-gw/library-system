<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fiction',
            'Non-Fiction',
            'Science',
            'History',
            'Business',
            'Self-Help',
            'Children',
            'Biography',
        ];

        foreach ($categories as $category){
            Category::create ([ 
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => fake()->sentence(10),
                'book_count' => 0,
                'is_active' => true,
            ]);
        }
    }
}
