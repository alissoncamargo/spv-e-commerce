
<div class="row">
    <h3 class="text-muted col-sm-2">Shoppvel - Área Administrativa</h3>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav nav-justified">
            <li class="active"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li><a href="{{route('admin.pedidos')}}">Pedidos</a></li>
            <li><a href="{{route('admin.categoria.listar')}}">Categorias</a></li>
            <li><a href="{{route('admin.marca.listar')}}">Marcas</a>
            <li><a href="{{route('admin.produto.listar')}}">Produtos</a>     
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            @else
            <li class="small">
                <a href="{{route('admin.dashboard')}}">
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </li>
            @endif

        </ul>
    </div>
</div>
<hr class="clearfix"/>
