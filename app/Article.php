<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  // these are fields I am ok with being mass assigned:
  protected $fillable = [
    'title',
    'body',
    'published_at'  
  ];
}
