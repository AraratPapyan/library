<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LibrariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,6) as $index) {
            DB::table('libraries')->insert([
                'name' => $faker->lastName,
                'director' => $faker->name,
                'street_address' => $faker->streetAddress,
                'city' => $faker->city,
                'country' => $faker->country,
                'phone_number' => $faker->tollFreePhoneNumber,
                'email' => $faker->email,
            ]);
        }
    }
}
