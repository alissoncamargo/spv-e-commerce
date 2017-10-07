<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Produto;
use Shoppvel\Models\Marca;
use Shoppvel\Controllers\ImagemController;
use Shoppvel\Http\Requests\ProdutoFormRequest;
use Shoppvel\Http\Requests\ProdutoUpdateRequest;

class ProdutoController extends Controller {

    function getProdutoDetalhes($id) {
        $models['produto'] = Produto::find($id);
        return view('frente.produto-detalhes', $models);
    }

    function getBuscar(Request $request) {
        $this->validate($request, [
            'termo-pesquisa' => 'required|filled'
                ]
        );

        $termo = $request->get('termo-pesquisa');

        $produtos = Produto::where('nome', 'LIKE', '%' . $termo . '%')
                ->paginate(10);
        //$produtos->setPath('buscar/'.$termo);
        $models['produtos'] = $produtos;
        $models['termo'] = $termo;
        return view('frente.resultado-busca', $models);
    }
    function listar() {
        $models['produtos'] = Produto::orderBy('nome')->paginate(20);
            //dd($models);
            return view('admin.produto.listar', $models);
        }
    
    function criar() {
        $models['marcas'] = Marca::all();
            return view('admin.produto.form', $models);

        }
    
    function salvar(ProdutoFormRequest $request) { 
        $produto = new Produto();
        //dd($produto);
        $produto->create($request->all());
        str_replace(',','.',$produto->preco_venda);
        number_format($produto->preco_venda, 2, ',', '.');
        //dd($produto);

        \Session::flash('mensagens-sucesso', 'Cadastrado com Sucesso');
            return redirect()->action('ProdutoController@listar')->with('mensagens-sucesso', 'Cadastrado com Sucesso!');
        }
    
    function editar($id) {
        $models['produto'] = Produto::find($id);
        $models['marcas'] = Marca::all();    
            return view('admin.produto.form', $models);
        }

    public function atualizar(ProdutoUpdateRequest $request, $id) {

        $data = $request->all();
        $produto= Produto::find($id);
        str_replace(',','.',$produto->preco_venda);
        number_format($produto->preco_venda, 2, ',', '.');

        if(Produto::find($id)->update($data)){
           return redirect()->action('ProdutoController@listar')->with('mensagens-sucesso', 'Atualizado com Sucesso!');
       } else {
           return redirect()->back()
           ->with('mensagens-erro', 'Erro!!!')
           ->withInput();
       }

    }
    function excluir($id) {
        $models['produto'] = Produto::find($id);
            return view('admin.produto.excluir', $models);
        }
    
    function delete($id) {
        $models['produto'] = Produto::find($id)->delete();
        \Session::flash('mensagens-sucesso', 'Excluido com Sucesso');
            return redirect()->action('ProdutoController@listar');
    }

}
