@extends('layouts.admin')

@section('conteudo')

<div class="panel panel-default ">
  	<div class="panel-heading">
    	<h3 class="panel-title">Lista de Produtos</h3>
  	</div>
  	<style type="text/css">
  		td{
  			text-align:center;
  		}
  		th{
  			text-align: center;
  		}
  	</style>
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
		    	<tr style="text-align: center">
		            <th>id</th>
		            <th>Imagem</th>
		            <th>Nome</th>
		            <th>Quantidade</th>
		            <th>Marca</th>
		            <th>Categoria</th>
		            <th>Valor</th>
		            <th>Editar</th>
		            <th>Excluir</th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($produtos as $prod)
		    <tr style="text-align: center">
		        <td>{{$prod->id}}</td>
		        <td><img src="{{route('imagem.file',$prod->imagem_nome)}}" width="100" height="100" alt="{{$prod->imagem_nome}}" ></td>
		        <td>{{$prod->nome}}</td>
		        <td>{{$prod->qtde_estoque}}</td>
		        <td>{{$prod->marca->nome}}</td>
		        <td>{{$prod->categoria->nome}}</td>
		        <td>{{'R$' .number_format($prod->preco_venda, 2, ',', '.')}}</td>
		        <div class="row">
			        <td class="col-md-1">
			            <a href="{{ url('admin/produto/'.$prod->id . '/editar') }}" class="btn btn-info btn-sm">
			                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> editar 
			            </a>
			        </td>
			        <td class="col-md-1">
			            <a href="{{ url('admin/produto/'.$prod->id . '/excluir') }}" class="btn btn-danger btn-sm">
			                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> excluir 
			            </a>
			        </td>
			    </div>
		    </tr>
		    @endforeach
		    </tbody>
		</table>
		{{$produtos->links()}}

	</div>
</div>

@stop