<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,24) as $index) {
            DB::table('authors')->insert([
                'full_name' => $faker->name,
                'date_of_birth' => $faker->dateTimeThisCentury,
                'biography' => $faker->text,
            ]);
        }
    }
}
