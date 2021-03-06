<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = [
      'title', 'body', 'flag', 'target_role', 'target_id', 'sender'
  ];
}
