<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ["name", "post_id"];

  public function childcategories(){
    return $this->hasOne('App\ChildCategory','cat_id');
  }
}
