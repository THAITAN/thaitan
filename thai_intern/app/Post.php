<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [ "title", "job_description", "location", "term", "number", "skill", "salary"];

  public function companies(){
    return $this->hasOne('App\Company','post_id');
  }

  public function postusers(){
    return $this->hasOne('App\PostUsers', 'post_id');
  }

  public function mainimages(){
    return $this->hasOne('App\MainImage', 'post_id');
  }

  public function subimages(){
    return $this->hasMany('App\SubImage', 'post_id');
  }

  public function categories(){
    return $this->belongsTo('App\Category', 'cat_id');
  }
}
