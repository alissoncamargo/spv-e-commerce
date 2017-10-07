@extends('layouts.admin')

@section('conteudo')

<div class="panel panel-default ">
  	<div class="panel-heading">
    	<h3 class="panel-title">Nova Produto</h3>
  	</div>
  	<div class="panel-body">
  		@if(Session::has('mensagem_sucesso'))
			{!! mensagem_sucesso !!}
  		@endif
		<div class="form-group">
			@if(Request::is('*/editar'))
				<h3>Editar Produto {!! $produto->nome !!}</h3>
				{!! Form::model($produto, ['method'=>'PATCH', 'url'=>'admin/produto/atualizar/'.$produto->id]) !!}
			@else
				{!! Form::open(['route' => 'admin.produto.salvar', 'class'=>'form-horizontal', 'style'=>'display'],'image/save',array('files'=>true)) !!}
			@endif

			        {!! Form::label('categoria_id', 'Categoria', ['class'=>'col-sm-2 form-label']) !!}
			        {!! Form::select('categoria_id', $listcategorias->lists('nome','id'), null, ['class'=>'form-control', 'placeholder'=>'Categoria']) !!}<br>

			        {!! Form::label('marca_id', 'Marca', ['class'=>'col-sm-2 form-label']) !!}
			        {!! Form::select('marca_id', $marcas->lists('nome','id'), null, ['class'=>'form-control', 'placeholder'=>'Marca']) !!}<br>

					{!! Form::label('nome', 'Produto', ['class'=>'col-sm-2 forml-label']) !!}
					{!! Form::input('text', 'nome', null, ['class'=>'form-control', 'placeholder'=>'Nome']) !!}<br>

					{!! Form::label('descricao', 'Descrição', ['class'=>'col-sm-2 form-label']) !!}
					{!! Form::input('textarea', 'descricao', null, ['class'=>'form-control', '', 'placeholder'=>'Descrição']) !!}<br>

					{!! Form::label('qtde_estoque', 'Quantidade', ['class'=>'col-sm-2 form-label']) !!}
					{!! Form::input('number', 'qtde_estoque', null, ['class'=>'form-control', '', 'placeholder'=>'Quantidade']) !!}<br>

					{!! Form::label('preco_venda', 'Preço Venda', ['class'=>'col-sm-2 form-label']) !!}
					{!! Form::input('number', 'preco_venda', null, ['class'=>'form-control', '', 'placeholder'=>'Preço de Venda']) !!}<br>

					{!! Form::label('destacado', 'Destacado', ['class'=>'col-sm-2 form-label'])!!}
					{!! Form::select('destacado', ['1'=>'Sim','0'=>'Não'], null, ['class'=>'form-control']) !!}<br><br><br>

					<div class="col-md-12">{!! Form::label('imagem_nome', 'Imagem', ['class'=>'col-md-12 col-sm-2 form-label']) !!}</div>
					{!! Form::input('file', 'imagem_nome', null, ['class'=>'col-md-12', '', 'placeholder'=>'Nome da Imagem']) !!}<br><br>

					<div class="col-md-12">
					{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

						<a href="{{Route('admin.produto.listar')}}"><div class="btn btn-success btn-sm  glyphicon glyphicon-share-alt col-md-offset-1"> Cancelar</div></a>
					</div>

				{!! Form::close() !!}

		</div>	
	</div>
</div>

@stop