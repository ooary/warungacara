<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prody extends Model
{
    //
    protected $table ='prody';
    protected $fillable =['name'];
    public $timestamps =false;
    protected $primaryKey ='id';
    
  
  	
}
