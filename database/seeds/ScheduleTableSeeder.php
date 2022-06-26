<?php

use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $schedule = [
        'user_id' => 'yamadataro',
        'Monday_of_the_Week' => '2020-07-06',
        'MON'   => 0,
        'TUE'   => 0,
        'WED'   => 1,
        'THU'   => 2,
        'FRI'   => 3,
        'SAT'   => 4,
        'SUN'   => 5,
      ];

      DB::table('schedules')->insert($schedule);

      $schedule = [
        'user_id' => 'yamadataro',
        'Monday_of_the_Week' => '2020-07-13',
        'MON'   => 6,
        'TUE'   => 1,
        'WED'   => 2,
        'THU'   => 3,
        'FRI'   => 4,
        'SAT'   => 5,
        'SUN'   => 7,
      ];

      DB::table('schedules')->insert($schedule);


    }
}
