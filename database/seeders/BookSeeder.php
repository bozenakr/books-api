<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Book::truncate(); // Ištrina visus esamus įrašus iš books lentelės

        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->title = $faker->sentence(3);
            $book->author = $faker->name();
            $book->genre = $faker->randomElement(['Fantasy', 'Sci-Fi', 'Romance', 'Thriller']);
            $book->save();
        }
    }
}
