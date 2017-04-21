<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;

use Shoppvel\Http\Requests;
use Shoppvel\Models\Marca;

class MarcaController extends Controller
{

    function listar() {
    	$models['marcas'] = Marca::all();
            return view('admin.marca.listar', $models);
        }
    
    function criar() {
            return view('admin.marca.form');

        }
    
    function salvar(Request $request) {
    	$marca = new Marca();
    	$marca->create($request->all());
        \Session::flash('mensagens-sucesso', 'Cadastrado com Sucesso');
        $models['marcas'] = Marca::all();
            return view('admin.marca.listar', $models);
        }
    
    function editar($id) {
        $models['marca'] = Marca::find($id);
            return view('admin.marca.form', $models);
        }

    public function atualizar(Request $request, $id) {

        $data = $request->all();

        if(Marca::find($id)->update($data)){
           return redirect()->action('MarcaController@listar')->with('mensagens-sucesso', 'Atualizado com Sucesso!');
       } else {
           return redirect()->back()
           ->with('mensagens-erro', 'Erro!!!')
           ->withInput();
       }

   }
   function excluir($id) {
        $models['marca'] = Marca::find($id);
            return view('admin.marca.excluir', $models);
        }
    
    function delete($id) {
        $models['marca'] = Marca::find($id)->delete();
        \Session::flash('mensagens-sucesso', 'Excluido com Sucesso');
            return redirect()->action('MarcaController@listar');
        }
}
