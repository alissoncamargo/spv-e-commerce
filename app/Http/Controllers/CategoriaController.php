<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Categoria;
use Shoppvel\Http\Requests\CategoriaRequest;
use Shoppvel\Http\Requests\CategoriaUpdateRequest;

class CategoriaController extends Controller {

    function getCategoria($id = null) {
        if ($id == null) {
            $models['listcategorias'] = Categoria::all();
            dd($models['listcategorias']);
            return view('frente.categorias', $models);
        }
        
        // se um id foi passado
        $models['categoria'] = \Shoppvel\Models\Categoria::find($id);
        dd($models['categoria']);
        return view('frente.produtos-categoria', $models);
    } 

    function listar() {
            return view('admin.categoria.listar');
        }
    
    function criar() {
            return view('admin.categoria.form');

        }
    
    function salvar(Request $request) {
    	$categoria = new Categoria();
    	$categoria->create($request->all());
        \Session::flash('mensagens-sucesso', 'Cadastrado com Sucesso');
            return view('admin.categoria.listar');
        }
    
    function editar($id) {
        $models['categoria'] = \Shoppvel\Models\Categoria::find($id);
            return view('admin.categoria.form', $models);
        }

    public function atualizar(CategoriaUpdateRequest $request, $id) {

        $data = $request->all();

        if(Categoria::find($id)->update($data)){
           return redirect()->action('CategoriaController@listar')->with('mensagens-sucesso', 'Atualizado com Sucesso!');
       } else {
           return redirect()->back()
           ->with('mensagens-erro', 'Erro!!!')
           ->withInput();
       }

   }
   function excluir($id) {
        $models['categoria'] = \Shoppvel\Models\Categoria::find($id);
            return view('admin.categoria.excluir', $models);
        }
    
    function delete($id) {
        $models['categoria'] = \Shoppvel\Models\Categoria::find($id)->delete();
        \Session::flash('mensagens-sucesso', 'Excluido com Sucesso');
            return redirect()->action('CategoriaController@listar');
        }
}