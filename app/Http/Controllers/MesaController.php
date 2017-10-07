<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Mesa;
use Shoppvel\Models\Carrinho;
use Shoppvel\Models\Produto;
use Illuminate\Support\Facades\Response;
use Shoppvel\Providers\RouteServiceProvider;
use Route;


class MesaController extends Controller{
     private $carrinho = null;

    function __construct() {
        parent::__construct();
        $this->carrinho = new Carrinho();
    }

    
    function listar() {
        $mesas['mesas'] = Mesa::paginate(10);
            return view('admin.mesas.mesa-listar', $mesas);
    }
    public function mesa_form(){ 
    	return view('admin.mesas.mesa');
    }
    public function salvar(Request $request){
        $consulta = Mesa::where('numero',$_REQUEST['numero'])->count();
        if($consulta == 1){
            return redirect()->back()
           ->with('mensagens-danger', 'Erro ao Atualizar a Mesa, Já Existe!!!')
           ->withInput();
        }else{
            $mesa = new Mesa();
            $mesa->create($request->all());
            \Session::flash('mensagens-sucesso', 'Cadastrado com Sucesso');
            return $this->listar();
        }
    }
    function editar($id) {
        $mesas['mesa'] = Mesa::find($id);
            return view('admin.mesas.mesa', $mesas);
    }
    public function atualizar(Request $request, $id) {
        $data = $request->all();
        if(Mesa::find($id)->update($data)){
           return redirect()->action('MesaController@listar')->with('mensagens-sucesso', 'Atualizado com Sucesso!');
        } else {
           return redirect()->back()
           ->with('mensagens-erro', 'Erro!!!')
           ->withInput();
        }
    }
    function excluir($id) {
        $mesas['mesa'] = Mesa::find($id)->delete();
        \Session::flash('mensagens-sucesso', 'Excluido com Sucesso');
            return redirect()->action('MesaController@listar');
    }

    public function getMesaId($id){
        $mesa = Mesa::find($id);
        $produto = Produto::all();
        $itens = $this->carrinho->getItens();
        $total = $this->carrinho->getTotal();
        return view('frente.cardapio',['mesa'=>$mesa,'produto'=>$produto,'itens'=>$itens,'total'=>$total]);
    }

    public function getProdutoModal($id){
        $produto = Produto::find($id);
        return Response::json($produto);

    }

    public function Adicionar(Request $request) {
        $id_produto = $request->get('botao');
        if($id_produto != null){
           $est = Produto::find($id_produto);
       
        $this->carrinho->add($id_produto,$request->get('quant'));
                
            
        return \Redirect::back()->with('mensagens-sucesso', 'Produto adicionado ao carrinho');                      
        }else{
            return \Redirect::back()
                            ->withErrors('Nenhum código de produto informado para adicionar ao carrinho.');
        }
        
    }
    public function Remover($id){
        $this->carrinho->deleteItem($id);
        if(Route::getCurrentRoute()->getPath() == 'getmesa/{id}'){
            
            return redirect()->route('cardapio');
        }else{
            return redirect()->back()->with('mensagens-sucesso', 'Produto Removido do Carrinho Modal');
        }
    }
}