<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;

use Shoppvel\Http\Requests;

use Shoppvel\User;

class LoginController extends Controller{



	public function login_form(request $request){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $this->validate($request, [
        'email' => 'required|max:255',
        'password' => 'required|max:255'
        ]
    );

        $model = User::where('email',$_REQUEST['email'])->where('password',md5($_REQUEST['password']))->count();

        \Session::put('cozinha',$model);

        if($model == 1){
            $dados = User::where('email',$_REQUEST['email'])->first();


            if($dados->role == 'cozinha'){
                \Session::put('id',$dados->id);
            \Session::put('nome',$dados->nome);
            \Session::put('role',$dados->role);
            return redirect('cozinha_dashboard')->with("sucesso",'Seja Bem vindo ');
            }else{
            return redirect('login_teste')->with("sucesso",'Login ou senha incorretos,tente novamente.');
            }
        

        }

    }
        return view('login_form_teste.login_form');
    }
		
}

