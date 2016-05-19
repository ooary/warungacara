<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['category_name'];
    protected $table = 'categories';
    

    public $timestamps = false;

    //jika menghapus category di category_event
    public static function boot(){
    	static::deleting(function($model){
    		$model ->event()->detach();
    	});
    }

    public function event(){
    	return $this -> belongsToMany('App\Event');
    }
  
}
