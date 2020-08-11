<?php

use App\Patient;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
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
            $patient = new Patient();
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $patient->firstName = $firstName;
            $patient->lastName = $lastName;
            $patient->uid = $firstName . $lastName;
            $patient->save();
        }
    }
}
