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
		<div class="">
			@if(Request::is('*/editar'))
				<h3>Editar Produto {!! $produto->nome !!}</h3>
				{!! Form::model($produto, ['method'=>'PATCH', 'url'=>'admin/produto/atualizar/'.$produto->id]) !!}
			@else
				{!! Form::open(['route' => 'admin.produto.salvar', 'class'=>'', 'style'=>'','files'=>true]) !!}
			@endif
			        {!! Form::label('categoria_id', 'Categoria', ['class'=>'col-sm-2 form-label']) !!}

			        {!! Form::select('categoria_id', $listcategorias->lists('nome','id'), null, ['class'=>'form-control col-sm-3', 'placeholder'=>'Categoria']) !!}

			        {!! Form::label('marca_id', 'Marca', ['class'=>'col-sm-2 form-label']) !!}
			        {!! Form::select('marca_id', $marcas->lists('nome','id'), null, ['class'=>'form-control col-sm-3', 'placeholder'=>'Marca']) !!}
			    
					{!! Form::label('nome', 'Produto', ['class'=>'col-sm-2 forml-label']) !!}
					{!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome']) !!}<br>

					{!! Form::label('descricao', 'Descrição', ['class'=>'col-sm-2 form-label']) !!}
					{!! Form::input('textarea', 'descricao', null, ['class'=>'form-control', '', 'placeholder'=>'Descrição']) !!}<br>

					{!! Form::label('qtde_estoque', 'Quantidade', ['class'=>'col-sm-2 form-label']) !!}
					{!! Form::input('number', 'qtde_estoque', null, ['class'=>'form-control', '', 'placeholder'=>'Quantidade']) !!}<br>

					{!! Form::label('preco_venda', 'Preço Venda', ['class'=>'col-sm-2 form-label']) !!}
					{!! Form::input('text', 'preco_venda', null, ['class'=>'form-control', '', 'placeholder'=>'Preço de Venda']) !!}<br>
					
				
					{!! Form::label('imagem', 'Selecione uma Imagem', ['style'=>'margin-left:10px']) !!}<br/>
    				{!! Form::file('imagem', ['class'=>'']) !!}

  					{!! Form::submit('Salvar', ['class'=>'btn btn-primary', 'style'=>'margin-top:2px']) !!}

					<a href="{{Route('admin.produto.listar')}}"><div class="btn btn-success  glyphicon glyphicon-share-alt">Cancelar </div></a>
					</div>
				</div>
					
				{!! Form::close() !!}

		</div>	
	</div>
</div>

@stop
	