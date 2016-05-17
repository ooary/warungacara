<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("categories",function(Blueprint $table){

            $table -> increments('id');
            $table -> string('category_name');
     
           });
        
        Schema::create("category_event",function(Blueprint $table){
            $table -> increments('id');
            $table -> integer('category_id')->unsigned();
            $table -> integer('event_id')->unsigned();
            $table -> foreign('category_id')-> references('id') -> on('categories');
            $table -> foreign('event_id')->references('id')-> on('events');  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop("category_event");
        
        Schema::drop("categories");
    }
}
