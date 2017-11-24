<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //definicion de la tabla
    //definicion de la tabla
    protected $table="customers";


     protected $fillable = [
        'name','email','phone','address','num_medidor',
    ];
    //funcion para buscar customerss
    public function scopeSearch($query, $dato){
        return $query->where('name','LIKE','%'.$dato.'%')
        ->orwhere('num_medidor','=',$dato);

    }

     public function reading(){
        return $this->hasMany('App\Reading');
    }
    
}
