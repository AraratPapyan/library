<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class LibraryBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $libraries = \App\Library::all()->pluck('id')->toArray();
        $books= \App\Book::all()->pluck('id')->toArray();
        foreach ($books as $book){
            DB::table('library_books')->insert([
                'library_id' => $faker->randomElement($libraries),
                'book_id' => $book,

            ]);
        }
    }
}
