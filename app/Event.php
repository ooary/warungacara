<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';
    protected $fillable = ['user_id','title','slug_title','content','image'];
    //delete relasi di category_event
    public static function boot(){
    	parent::boot();
    	static::deleting(function($model){
    		$model ->categories()->detach();
    	});
    }

    public function categories(){

    	return $this->belongsToMany('App\Category');
    }
    public function posted(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function getCategoryListsAttribute(){
    	if($this ->categories()->count()<1)
    		:
    		return null;

    	endif;

    	return $this->categories()->select('categories.id')->lists('id')->all();

    }
}
