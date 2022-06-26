<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subjects = [
        ['国語', 7],
        ['数学', 2],
        ['英語', 7],
        ['理科', 6],
        ['社会', 6],
        ['算数', 4],
        ['数学I', 1],
        ['数学II', 1],
        ['数学III', 1],
        ['数学A', 1],
        ['数学B', 1],
        ['物理', 1],
        ['化学', 1],
        ['生物', 1],
        ['地学', 1],
        ['世界史', 1],
        ['日本史', 1],
        ['世界史', 1],
        ['地理', 1],
        ['現代社会', 1],
        ['倫理・政治経済', 1]
      ];

      foreach ($subjects as $subject) {
        // DB::table('subjects')->insert($subject);
        App\Subject::create(['name' => $subject[0], 'grade_id' => $subject[1]]);
      }
    }
}
