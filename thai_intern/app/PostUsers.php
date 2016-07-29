<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostUsers extends Model
{
  protected $fillable = ["post_id", "name", "mail_address", "phone_number"];
}
