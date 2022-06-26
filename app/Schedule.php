<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $fillable = [
      'user_id', 'Monday_of_the_Week', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'
  ];

  public function users()
  {
    return $this->belongsTo('App\User', 'teacher_id');
  }

}
