<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckedNews extends Model
{
  protected $fillable = [
      'user_id', 'news_id'
  ];
}
