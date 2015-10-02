<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
  // these are fields I am ok with being mass assigned:
  protected $fillable = [
    'title',
    'body',
    'published_at',
    'user_id' // temporary!
  ];

  // this lets us use the Carbon instance instead of the timestamp
  protected $dates = ['published_at'];

  public function scopePublished($query)
  {
    $query->where('published_at', '<=', Carbon::now());
  }

  public function scopeUnpublished($query)
  {
    $query->where('published_at', '>', Carbon::now());
  }

  // setNameAttrubute
  public function setPublishedAtAttribute($date)
  {
    $this->attributes['published_at'] = Carbon::parse($date);
  }

  public function getPublishedAtAttribute($date)
  {
    return new Carbon($date);
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag')->withTimestamps();
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function getTagListAttribute()
  {
    return $this->tags->lists('id')->all();
  }

}
