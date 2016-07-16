<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainImage extends Model
{
    protected $fillable = ["image", "post_id"];
}
