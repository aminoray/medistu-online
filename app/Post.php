<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title',
      'subject',
      'school_grade',
      'text',
      'date',
      'period',
      'selected_teacher',
      'user_id',
      'time'
    ];

    // public $timestamps = false;
    protected $primaryKey = "id";

    public function subjects()
    {
      return $this->belongsTo('App\Subject', 'subject');
    }

    public function grades()
    {
      return $this->belongsTo('App\Grade', 'school_grade');
    }

    public function users()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
    return $this->hasMany('App\Comment');
    }

}
