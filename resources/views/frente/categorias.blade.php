@extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <h2 class="page-header text-info">
        Sub-Categoria
    </h2>
</div>
<div class="col-sm-6 col-md-4">
    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"    aria-haspopup="true" aria-expanded="true">
        Sub-Categoria
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        @foreach ($listcategorias as $cat)
        <li>
            <a href="{{route('categoria.listar', $cat->id)}}">
                {{$cat->nome}}
            </a>
        </li>
        @endforeach
    </ul>
</div>
@stop