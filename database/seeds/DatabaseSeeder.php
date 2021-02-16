<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
         $this->call(AuthorsSeeder::class);
         $this->call(BooksSeeder::class);
         $this->call(LibrariesSeeder::class);
         $this->call(AuthorBooksSeeder::class);
         $this->call(LibraryBooksSeeder::class);

    }
}
