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
<<<<<<< HEAD
=======
            <!-- verificação para listar somente as categorias filhas na Subcategoria -->
            @if($cat->categoria_id != '')
>>>>>>> 5f433a9b27f37e2049274e3ddeb1adf35e56b174
            <a href="{{route('categoria.listar', $cat->id)}}">
                {{$cat->nome}}
            </a>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@stop