<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //追加
      // admin
      $permissions = [
          'admin_permission',
          'teacher_permission',
          'student_permission',
      ];

      $role = Role::findByName('admin');
      $role->givePermissionTo($permissions);

      // teacher
      $permissions = [
          'teacher_permission',
      ];

      $role = Role::findByName('teacher');
      $role->givePermissionTo($permissions);

      // student
      $permissions = [
          'student_permission',
      ];

      $role = Role::findByName('student');
      $role->givePermissionTo($permissions);

    }
}
