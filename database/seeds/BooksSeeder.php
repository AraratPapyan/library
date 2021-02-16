<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,12) as $index) {

            DB::table('books')->insert([
                'name' => $faker->name,
                'genre' => $faker->jobTitle,
                'description' => $faker->text,
                'publish_year' => $faker->year,
                'key_word' => $faker->word .', '.$faker->word.', '.$faker->word,
            ]);
        }
    }
}
