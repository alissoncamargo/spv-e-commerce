@extends('layouts.admin')

@section('conteudo')

<div class="panel panel-default ">
  	<div class="panel-heading">
    	<h3 class="panel-title">Nova Categoria</h3>
  	</div>
  	<div class="panel-body">
  		@if(Session::has('mensagem_sucesso'))
			{!! 'OK' !!}
  		@endif
		<div class="form-group">
			@if(Request::is('*/editar'))
				<h3>Editar Categoria {!! $categoria->nome !!}</h3>
				{!! Form::model($categoria, ['method'=>'PATCH', 'url'=>'admin/categoria/atualizar/'.$categoria->id]) !!}
			@else
				{!! Form::open(['route' => 'admin.categoria.salvar', 'class'=>'form-horizontal']) !!}
			@endif

			        {!! Form::label('categoria_id', 'Categorias', ['class'=>'col-sm-2 control-label']) !!}
			        {!! Form::select('categoria_id', $listcategorias->lists('nome','id'), null, ['class'=>'form-control', 'placeholder'=>'Categoria Principal']) !!}

					{!! Form::label('nome', 'Categoria', ['class'=>'input-group']) !!}
					{!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome']) !!}

					{!! Form::submit('Salvar', ['class'=>'btn btn-primary input-group' ]) !!}
					<a href="{{Route('admin.categoria.listar')}}"><div class="btn btn-success btn-sm glyphicon glyphicon-share-alt"> Cancelar </div></a>

				{!! Form::close() !!}
		</div>	
	</div>
</div>

@stop
	