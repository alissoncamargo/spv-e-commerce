<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImagemController extends Controller {

    function getImagemFile($nome) {
        $imagem = Storage::disk('public')->get($nome);
        return response($imagem,200)->header('Content-Type', 'image/jpeg'&&'imagem/png');
    }

    static function setImagemFile($file) {
		$imagemNome = $file->getClientOriginalName();
        Storage::disk('public')->put($imagemNome, File::get($file));
        return $imagemNome;
    }


}
