<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherApplication extends Model
{
  protected $fillable = [
      'name', 'user_id', 'email', 'provisional_password', 'college_name', 'department', 'major', 'grade', 'status'
  ];
}
