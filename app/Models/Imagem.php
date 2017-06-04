<?php

namespace Shoppvel;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $fillable = [
		'imagem_nome'
	];

    public function produtos() {
        return $this->hasMany(Produto::class,"imagem_nome");
    }
}
