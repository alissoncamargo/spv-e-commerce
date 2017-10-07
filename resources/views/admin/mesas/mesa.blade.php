@extends('layouts.admin')

@section('conteudo')

<div class="panel panel-default ">
  	<div class="panel-heading">
    	<h3 class="panel-title">Nova Mesa</h3>
  	</div>
  	<div class="panel-body">
  		@if(Session::has('mensagem_sucesso'))
			{!! 'OK' !!}
  		@endif
		<div class="form-group">
			@if(Request::is('*/editar'))
				<h3>Editar Marca {!! $mesa->numero !!}</h3>
				{!! Form::model($mesa, ['method'=>'PATCH', 'url'=>'admin/mesa/atualizar/'.$mesa->id_mesa]) !!}
			@else
				{!! Form::open(['route' => 'admin.mesa.salvar', 'class'=>'form-horizontal']) !!}
			@endif

					{!! Form::label('numero', 'Mesa', ['class'=>'input-group']) !!}
					{!! Form::input('numeric', 'numero', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Numero']) !!}

					{!! Form::submit('Salvar', ['class'=>'btn btn-primary', 'style'=>'margin-top:2px']) !!}

					<a href="{{Route('admin.mesa.listar')}}"><div class="btn btn-success btn-sm glyphicon glyphicon-share-alt"> Cancelar </div></a>

				{!! Form::close() !!}
		</div>	
	</div>
</div>

@stop