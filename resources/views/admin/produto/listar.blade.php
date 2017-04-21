@extends('layouts.admin')

@section('conteudo')

<div class="panel panel-default ">
  	<div class="panel-heading">
    	<h3 class="panel-title">Lista de Produtos</h3>
  	</div>
  	<div class="panel-body">
  	@if(Session::has('mensagem_sucesso'))
		{!! 'OK' !!}
  	@endif
	  	<table class="table table-hover table-striped">
		    <caption> 
		        <a href="{{ route('admin.produto.criar') }}" class="btn btn-primary btn-sm">
		            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo Produto 
		        </a>
		    </caption>
		            <th>id</th>
		            <th>Nome</th>
		            <th>Quantidade</th>
		            <th>Marca</th>
		            <th>Categoria</th>
		            <th>Ações</th>
		            <th></th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($produtos as $prod)
		    <tr>
		        <td>{{$prod->id}}</td>
		        <td>{{$prod->nome}}</td>
		        <td>{{$prod->qtde_estoque}}</td>
		        <td>{{$prod->marca->nome}}</td>
		        <td>{{$prod->categoria->nome}}</td>
		        
		        <td>
		            <a href="{{ url('admin/produto/'.$prod->id . '/editar') }}" class="btn btn-info btn-sm">
		                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> editar 
		            </a>
		        </td>
		        <td>
		            <a href="{{ url('admin/produto/'.$prod->id . '/excluir') }}" class="btn btn-danger btn-sm">
		                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> excluir 
		            </a>
		        </td>
		    </tr>
		    @endforeach
		    </tbody>
		</table>
		{{$produtos->links()}}

	</div>
</div>

@stop