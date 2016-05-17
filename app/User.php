<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Prody as Prody;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function prody(){
        
        return $this->belongsTo('App\Prody','prody_id');
    }

    //event delete user from prody_user
  //  public static function boot(){
  //      parent::boot();
   //     static::deleting(function($model){
    //        $model->prody()->detach();
      //  });
    //}
}
