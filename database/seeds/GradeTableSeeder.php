<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $grades = [
        '高校生',
        '中学生',
        '小学生'
      ];

      foreach ($grades as $grade) {
        // DB::table('grades')->insert($grade);
        App\Grade::create(['name' => $grade]);
      }


    }
}
