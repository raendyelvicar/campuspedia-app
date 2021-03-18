<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

    	foreach (range(1,10) as $index) {
            DB::table('contacts')->insert([
                'firstname' => $faker->firstName($gender),
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'phone_number' => $faker->numberBetween(000000000000,999999999999),
                'created_at' => $faker->date($format = 'Y-m-d',now())
            ]);
        }
    }
}
