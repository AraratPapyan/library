<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class AuthorBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $authors = \App\Author::all()->pluck('id')->toArray();
        $books= \App\Book::all()->pluck('id')->toArray();
        foreach ($authors as $author){
            DB::table('author_books')->insert([
                'author_id' => $author,
                'book_id' => $faker->randomElement($books),

            ]);
        }
    }
}
