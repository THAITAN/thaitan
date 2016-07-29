<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
  protected $fillable = ["post_id", "name", "cat_id"];
  function category(){
    return $this->belongsTo('App\Category', 'cat_id');
  }
}
