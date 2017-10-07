<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model {

	protected $fillable = [
		'nome',
		'categoria_id'
	];
    //public $timestamps = false;

    public function produtos() {
        return $this->hasMany(Produto::class,"categoria_id","id");
    }


    public function filhos(){
    	return $this->hasMany(Categoria::class,"categoria_id","id");
    }

    public function pai(){
    	return $this->belongsTo(Categoria::class,"categoria_id","id");
    }
    

}
