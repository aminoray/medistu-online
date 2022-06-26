<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [ 'name' ];

    public $timestamps = false;

    public function posts()
    {
      return $this->hasMany('App\Post');
    }

    Public function student()
    {
        return  $this->hasOne(StudentDetail::class);
    }
}
