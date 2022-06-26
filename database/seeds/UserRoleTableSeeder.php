<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_role = [
        'user_id' => 'mediray',
        'role' => 'student'
      ];

      DB::table('user_roles')->insert($user_role);
    }
}
