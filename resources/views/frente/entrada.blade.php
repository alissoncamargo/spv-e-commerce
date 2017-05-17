@extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <div class="page-header text-muted">
        {{count($produtos)}} produtos em destaque
    </div>
</div>
<div class="row">
@foreach($produtos as $produto)
    <div class="col-sm-6 col-md-4">
        <div class="panel panel-primary">
            <div class="thumbnail">
                <img src="{{route('imagem.file',$produto->imagem_nome)}}" alt="{{$produto->imagem_nome}}" >
                <div class="caption">
                    <div  class=""><h3>{{$produto->nome}}</h3></div>
                    <h4 class="" class="text-muted">{{$produto->marca->nome}}</h4>
                    <p>{{str_limit($produto->descricao,100)}}</p>
                    <p><a href="{{route('produto.detalhes', $produto->id)}}" class="btn btn-primary" role="button">Detalhes</a></p>
                </div>
            </div>
        </div>
</div>
@endforeach
</div>
@stop