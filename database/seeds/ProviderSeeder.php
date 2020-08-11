<?php

use App\Provider;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            $provider = new Provider();
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $provider->firstName = $firstName;
            $provider->lastName = $lastName;
            $provider->uid = $firstName . $lastName;
            $provider->save();
        }
    }
}
