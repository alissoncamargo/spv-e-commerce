<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;

use Shoppvel\Http\Requests;
use Shoppvel\Models\Marca;
use Shoppvel\Models\Produto;
use Shoppvel\Http\Requests\MarcaFormRequest;

class MarcaController extends Controller
{

    function listar() {
    	$models['marcas'] = Marca::paginate(10);
      //$models['marcas'] = Marca::paginate(10);
            return view('admin.marca.listar', $models);
        }
    
    function criar() {
            return view('admin.marca.form');

        }
    
    function salvar(MarcaFormRequest $request) {
    	$marca = new Marca();
    	$marca->create($request->all());
        //\Session::flash('mensagens-sucesso', 'Cadastrado com Sucesso');
      return $this->listar();
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
        $data['marca'] = Marca::find($id);
       
        if(count(Produto::where('marca_id', $id)->get()) == 0){
            //dd($data);
            return view('admin.marca.excluir', $data); 
        }
        else{
           return \Redirect::back()
            ->withErrors('Não é possível excluir esta marca, pois ela está associada à um produto.'); 
        }
      /*$models['marca'] = Marca::find($id);
      $produtos = Produto::where('marca_id', $id)->get();
      if(Produto::where('marca_id', $id)->get() == ''){
      //dd($produto);
        return view('admin.marca.excluir', $models, $produtos);
      }else{
        return redirect()->back()
           ->with('mensagens-erro', 'Erro!!!')
           ->withInput();
      }*/
    }  
    function delete($id) {
        $models['marca'] = Marca::find($id)->delete();
        \Session::flash('mensagens-sucesso', 'Excluido com Sucesso');
            return redirect()->action('MarcaController@listar');
        }
}