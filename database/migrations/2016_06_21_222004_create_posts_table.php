<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table){
          $table->increments('id');
          $table->string('title');
          $table->text('job_description');
          $table->string('location');
          $table->string('term');
          $table->string('number');
          $table->string('skill');
          $table->string('salary');
          $table->string('cat_id');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
