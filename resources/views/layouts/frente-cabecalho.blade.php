<div clas="row">
    <h3 class="text-muted col-sm-2">Shoppvel</h3>
    {!! Form::open(array('route' => 'produto.buscar', 'class'=>'navbar-form navbar-right')) !!} 
    <div class="form-group">
        {!! Form::text('termo-pesquisa', null,['placeholder'=>'Pesquisar',
        'class'=>'form-control']) !!}
    </div>
    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </button>
    {!! Form::close() !!}
    <nav>
        <ul class="nav nav-justified">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{route('categoria.listar')}}">Categorias</a></li>
            <li><a href="{{route('carrinho.listar')}}">Carrinho</a></li>
            <li><a href="{{route('sobre')}}">Sobre</a></li>            

            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            @else
            <li class="small">
                <a href="{{route('cliente.dashboard')}}">
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </li>
            @endif

        </ul>
    </nav>
</div>

<hr class="clearfix"/>
