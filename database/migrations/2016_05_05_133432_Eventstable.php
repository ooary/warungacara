<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Eventstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("events",function(Blueprint $table){

                $table -> increments('id');
                $table -> integer('user_id');
                $table -> string('title')->unique();
                $table -> string('slug_title')->unique();
                $table -> string('content');
                $table -> string('image');
                $table -> boolean('published')->default(0);
                $table -> timestamps();
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //.
        //Schema::drop('event_user');
        Schema::drop("events");
    }
}
