<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [ 'name', 'grade_id' ];


    public $timestamps = false;

    public function posts()
    {
      return $this->hasMany('App\Post');
    }

}
