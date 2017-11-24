<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{

	 protected $fillable = [
        'customer_id', 'medida', 'monto',
    ];
    

        public function scopeSearch($query, $dato){
        return $query->where('id','LIKE','%'.$dato.'%');

        }

        public static function scopeperiodo($id){
            return Reading::where('period_id','=',$id)->get();
        }

        //funcion para mostrar usuarios que pertenecen a un solo periodo

    public function customer(){
    	return $this->belongsTo('App\Customer');
    }

     public function period(){
    	return $this->belongsTo('App\Period');
    }

}
