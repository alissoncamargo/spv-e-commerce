@extends('layouts.admin')

@section('conteudo')	
<link href="{{asset('bootstrap/css/mycss/menu.css')}}" rel="stylesheet">
	<div id="excluir"> 
		@if(Request::is('*/excluir'))
			<h3 >Deseja relamente excluir a Marca {!! $mesa->numero !!}</h3>
		@endif
	</div>
	
	{!! Form::open(['method'=>'DELETE', 'url'=>'/admin/mesa/'.$mesa->id_mesa.'/delete', 'style'=>'display: inline;']) !!}
	 	
	 	<button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Excluir Mesa</button>

	 	<a href="{{Route('admin.mesa.listar')}}"><div class="btn btn-success btn-sm glyphicon glyphicon-share-alt"> Cancelar </div></a>

	{!! Form::close() !!}

@stop