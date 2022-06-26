<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
  protected $fillable = [
      'student_id', 'grade_id', 'full_name', 'name_kana', 'prefecture', 'student_status'
  ];


  Public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function grades()
  {
    return $this->belongsTo('App\Grade', 'grade_id');
  }
}
