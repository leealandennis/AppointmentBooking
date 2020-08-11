<?php

use App\Patient;
use App\Provider;
use App\TimeSlot;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $providers = Provider::all();
        $patients = Patient::all();

        for ($i = 0; $i < 50; $i++) {

            $timeSlot = new TimeSlot();
            $timeSlot->startDateTime = $faker->dateTimeThisMonth()->format('U');
            $timeSlot->endDateTime = (new DateTime())->setTimestamp($timeSlot->startDateTime)->modify('+15 min')->format('U');
            $timeSlot->providerId = $faker->randomElement($providers)->id;
            $isAppointment = $faker->randomElement([0, 1]);

            if ($isAppointment) {
                $timeSlot->patientId = $faker->randomElement($patients)->id;
            }

            $timeSlot->save();
        }
    }
}
