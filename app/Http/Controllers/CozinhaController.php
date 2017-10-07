<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;

use Shoppvel\Http\Requests;

use Shoppvel\Models\Venda;

class CozinhaController extends Controller{

	public function dashboard(){
		return view('frente.cozinha.cozinha_dashboard');
	}

	public function getPendentes(){
		$venda = Venda::where('status',1)->get();
		return view('frente.cozinha.pedido',['venda'=>$venda]);

	}

	public function getAndamentos(){
		$venda = Venda::where('status',2)->get();
		return view('frente.cozinha.pedido',['venda'=>$venda]);
	}

	public function getProntos(){
		$venda = Venda::where('status',3)->get();
		return view('frente.cozinha.pedido',['venda'=>$venda]);
	}

	public function putAndamento(Request $request, $id) {
        $pedido = Venda::find($id);
        
        if ($pedido == null) {
            return back()->withErrors('Pedido não encontrado!');
        }
        
        $pedido->status = 2;
        $pedido->save();
        
        return redirect('pedidos_andamento');
    }

    public function putPronto(Request $request, $id) {
        $pedido = Venda::find($id);
        
        if ($pedido == null) {
            return back()->withErrors('Pedido não encontrado!');
        }
        
        $pedido->status = 3;
        $pedido->save();
        
        return redirect('pedidos_pronto');
    }


    
}
