<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $fillable = [
      'title', 'body', 'flag', 'target_role', 'target_id', 'sender_id', 'post_id',
  ];

}
