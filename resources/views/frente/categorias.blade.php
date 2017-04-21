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