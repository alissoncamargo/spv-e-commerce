@extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <h2 class="page-header text-info">
        Categorias
    </h2>
</div>
<div class="col-sm-6 col-md-4">
    <ul class="list-group">
        @foreach ($listcategorias as $cat)
        <li class="list-group-item">
            <a href="{{route('categoria.listar', $cat->id)}}">
                {{$cat->nome}}
            </a>
        </li>
        @endforeach
    </ul>
</div>
@stop
<!--@extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <h2 class="page-header text-info">
        Categorias
    </h2>
</div>
<div class="dropdown col-sm-6 col-md-4">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Categorias
    <span class="caret"></span></button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        @foreach ($listcategorias as $cat)
            <li><a href="{{route('categoria.listar', $cat->id)}}">
                {{$cat->nome}}
            </a></li>
        @endforeach
    </ul>
</div>
@stop-->