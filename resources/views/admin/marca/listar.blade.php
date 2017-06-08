@extends('layouts.admin')

@section('conteudo')

<div class="panel panel-default ">
  	<div class="panel-heading">
    	<h3 class="panel-title">Lista de Marcas</h3>
  	</div>
  	<div class="panel-body">
  	@if(Session::has('mensagem_sucesso'))
		{!! 'OK' !!}
  	@endif
	  	<table class="table table-hover table-striped">
		    <caption> 
		        <a href="{{ route('admin.marca.criar') }}" class="btn btn-primary btn-sm">
		            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova Marca 
		        </a>
		    </caption>
		    <thead>
		        <tr>
		            <th>id</th>
		            <th>Nome</th>
		            <th>Ações</th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($marcas as $marca)
		    <tr>
		        <td>{{$marca->id}}</td>
		        <td>{{$marca->nome}}</td>
		        
		        <td>
		            <a href="{{ url('admin/marca/'.$marca->id . '/editar') }}" class="btn btn-info btn-sm">
		                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar 
		            </a>
		            <a href="{{ url('admin/marca/'.$marca->id . '/excluir') }}" class="btn btn-danger btn-sm">
		                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir 
		            </a>
		        </td>
		    </tr>
		    @endforeach
		    </tbody>
		</table>
		<!--Colocar os links para realizar o paginate -->
		{{ $marcas->links() }}
		<!--{{$marcas->links()}}-->
	</div>
</div>

@stop