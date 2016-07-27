<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    protected $fillable = ["post_id", "image"];
}
