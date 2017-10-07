@extends('layouts.cliente')

@section('conteudo')
<h2>Cozinha</h3>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <a href="{{url('pedidos_pendentes')}}"><h3 class="text-center">Pendentes</h3></a>
                </div>
                <div class="panel-body text-center">
                    <h1 class="text-info">
                        
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <a href="{{url('pedidos_andamento')}}"><h3 class="text-center">Em Andamento</h3></a>
                </div>
                <div class="panel-body text-center">
                    <h1 class="text-info">
                        
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1 ">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <a href="{{url('pedidos_pronto')}}"><h3 class="text-center">Prontos</h3></a>
                </div>
                <div class="panel-body text-center">
                    <h1 class="text-info">
                        
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <a href="{{url('logout_teste_cozinha')}}"><h3 class="text-center">LOGOUT</h3></a>
                </div>
                <div class="panel-body text-center">
                    <h1 class="text-info">
                        
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

@stop