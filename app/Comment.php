<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['body', 'post_id', 'user_id', ];

    // $comment->post
    public function post() {
      return $this->belongsTo('App\Post');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
