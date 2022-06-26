<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
  use HasRoles;
  use HasPermissions;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = User::all();

      foreach ($users as $user) {
        if ($user->role_id == 2){
          $user->assignRole('teacher');
          $user->givePermissionTo('teachser_permission');
        } else {
          $user->assignRole('student');
          $user->givePermissionTo('student_permission');
        }
        // code...
      }
    }
}


////
// $table->string('name');
// $table->string('user_id')->unique();
// $table->string('email')->unique();
// $table->timestamp('email_verified_at')->nullable();
// $table->string('password');
// $table->string('status');
