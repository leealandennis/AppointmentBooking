<?php


use App\Clinic;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinics = Clinic::all();

        foreach ($clinics as $clinic) {
            $clinic->delete();
        }

        $faker = Faker::create();

        $clinic = Clinic::getInstance();
        $clinic->name = $faker->name . ' Clinic';
        $clinic->save();
    }
}
