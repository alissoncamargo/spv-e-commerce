@extends('layouts.frente-loja')

@section('conteudo')

<!-- TEMPORARIAMENTE -->
<style>
.btn-lg{
   padding: 8px 18px;
   font-size: 25px;
   line-height: 1.3333333;
   border-radius: 5px;
   margin: 10px;
   margin-left: 0;
}
</style>
<br/>
<div class='container'>
    <h3>Mesas disponíveis</h3>
    @foreach($mesa as $m)
        <a  href="{{url('getmesa',$m->id_mesa)}}" class='btn btn-primary btn-lg' >{{$m->numero}}</a>
    @endforeach
</div>
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
                <img src="{{route('imagem.file',$produto->imagem_nome)}}" alt="{{$produto->imagem_nome}}" data-lightbox="roadtrip">
                <div class="caption">
                    <div><h3>{{$produto->nome}}</h3></div>
                    <h4 class="text-muted">{{$produto->marca->nome}}</h4>
                    <p>{{str_limit($produto->descricao,100)}}</p>
                    <p><a href="{{route('produto.detalhes', $produto->id)}}" class="btn btn-primary" role="button">Detalhes</a></p>
                </div>
            </div>
        </div>
</div>
@endforeach
</div>
@stop