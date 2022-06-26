<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $post = [
        'title' => '二次関数',
        'subject' => '数学',
        'school_grade' => '高校生',
        'text' => '（２）がわかりません。',
        'date' => '2020-07-06',
        'period' => 1,
        'selected_teacher' => 'yamadataro',
        'user_id' => 'mediray',
      ];

      DB::table('posts')->insert($post);

      $post = [
        'title' => '三人称単数',
        'subject' => '英語',
        'school_grade' => '中学生',
        'text' => '文法がわかりません。',
        'date' => '2020-07-12',
        'period' => 3,
        'selected_teacher' => 'yamadataro',
        'user_id' => 'mediray',
      ];

      DB::table('posts')->insert($post);


      $post = [
        'title' => '中学への算数',
        'subject' => '算数',
        'school_grade' => '小学生',
        'text' => 'ツルカメ算が難しいです。',
        'date' => '2020-07-10',
        'period' => 2,
        'selected_teacher' => 'yamadataro',
        'user_id' => 'tyrosin',
      ];

      DB::table('posts')->insert($post);

      $post = [
        'title' => '英語の長文',
        'subject' => '英語',
        'school_grade' => '高校生',
        'text' => '波線部分の英語訳ができません。',
        'date' => '2020-07-10',
        'period' => 2,
        'selected_teacher' => 'yamadataro',
        'user_id' => 'yamato',
      ];

      DB::table('posts')->insert($post);

      $post = [
        'title' => '運動方程式',
        'subject' => '物理',
        'school_grade' => '高校生',
        'text' => '式の意味が掴めません。',
        'date' => '2020-07-11',
        'period' => 3,
        'selected_teacher' => 'yamadataro',
        'user_id' => 'yamato',
      ];

      DB::table('posts')->insert($post);


    }
}
