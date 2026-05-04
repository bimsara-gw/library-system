<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        $books = [
            [
                'title' => 'Harry Potter and the Sorcerer Stone',
                'author' => 'J.K. Rowling',
                'isbn' => '1234567890123',
                'description' => 'A young wizard discovers his magical powers.',
                'published_date' => '2001-07-21',
                'pages' => 320,
                'price' => 1500,
                'available_copies' => 5,
                'total_copies' => 10,
                'publisher' => 'Bloomsbury',
                'category' => 'Fiction'
            ],
            [
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'isbn' => '1234567890124',
                'description' => 'Exploring black holes and the universe.',
                'published_date' => '1988-03-01',
                'pages' => 256,
                'price' => 2000,
                'available_copies' => 3,
                'total_copies' => 8,
                'publisher' => 'Bantam',
                'category' => 'Science'
            ],
            [
                'title' => 'Rich Dad Poor Dad',
                'author' => 'Robert Kiyosaki',
                'isbn' => '1234567890125',
                'description' => 'Financial education and investing basics.',
                'published_date' => '1997-04-01',
                'pages' => 210,
                'price' => 1800,
                'available_copies' => 7,
                'total_copies' => 12,
                'publisher' => 'Warner Books',
                'category' => 'Business'
            ],
            [
                'title' => 'The Alchemist',
                'author' => 'Paulo Coelho',
                'isbn' => '1234567890126',
                'description' => 'A journey of self-discovery.',
                'published_date' => '1988-01-01',
                'pages' => 180,
                'price' => 1200,
                'available_copies' => 0,
                'total_copies' => 5,
                'publisher' => 'HarperOne',
                'category' => 'Self-Help'
            ],
            [
                'title' => 'World War II History',
                'author' => 'John Keegan',
                'isbn' => '1234567890127',
                'description' => 'Detailed history of WWII.',
                'published_date' => '1990-09-10',
                'pages' => 500,
                'price' => 2500,
                'available_copies' => 2,
                'total_copies' => 6,
                'publisher' => 'Vintage',
                'category' => 'History'
            ],
            [
                'title' => 'Python Programming Basics',
                'author' => 'Mark Lutz',
                'isbn' => '1234567890128',
                'description' => 'Learn Python from scratch.',
                'published_date' => '2015-06-12',
                'pages' => 600,
                'price' => 3000,
                'available_copies' => 4,
                'total_copies' => 10,
                'publisher' => 'OReilly',
                'category' => 'Science'
            ],
            [
                'title' => 'Biography of Steve Jobs',
                'author' => 'Walter Isaacson',
                'isbn' => '1234567890129',
                'description' => 'Life story of Apple founder.',
                'published_date' => '2011-10-24',
                'pages' => 650,
                'price' => 2800,
                'available_copies' => 6,
                'total_copies' => 9,
                'publisher' => 'Simon & Schuster',
                'category' => 'Biography'
            ],
            [
                'title' => 'Children Fairy Tales',
                'author' => 'Brothers Grimm',
                'isbn' => '1234567890130',
                'description' => 'Classic fairy tales for kids.',
                'published_date' => '1900-01-01',
                'pages' => 150,
                'price' => 900,
                'available_copies' => 10,
                'total_copies' => 15,
                'publisher' => 'Classic Press',
                'category' => 'Children'
            ],
        ];

        foreach ($books as $data) {

            $category = $categories->where('name', $data['category'])->first();

            Book::create([
                'title' => $data['title'],
                'author' => $data['author'],
                'isbn' => $data['isbn'],
                'description' => $data['description'],
                'published_date' => $data['published_date'],
                'pages' => $data['pages'],
                'price' => $data['price'],
                'available_copies' => $data['available_copies'],
                'total_copies' => $data['total_copies'],
                'publisher' => $data['publisher'],
                'category_id' => $category->id ?? 1,
                'created_by' => $user->id ?? 1,
            ]);
        }
    }
}