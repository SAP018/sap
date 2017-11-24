<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{

	protected $fillable = [
        'name', 'year',
    ];
     protected $dates = ['deleted_at'];
    

     public function scopeSearch($query, $dato){
        return $query->where('name','LIKE','%'.$dato.'%');

    }

      public function reading(){
        return $this->hasMany('App\Reading');
    }
}
