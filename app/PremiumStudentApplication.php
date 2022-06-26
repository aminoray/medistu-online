<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PremiumStudentApplication extends Model
{
  protected $fillable = [
      'student_id', 'full_name', 'name_kana', 'user_id', 'email', 'phone_number', 'plan', 'grade', 'flag',
  ];
}
