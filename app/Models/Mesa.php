<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model{

	protected $table = 'mesa';
	protected $fillable = ['id_mesa','numero','id_venda','status'];
	protected $primaryKey = 'id_mesa';
	protected $foreignKey = 'id_venda';
	protected $connection = 'pgsql';


    public function filhos(){
    	return $this->hasMany(Produto::class,"id");
    }
}
