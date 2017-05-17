
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Shoppvel - Área Administrativa.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li><a href="{{route('admin.pedidos')}}">Pedidos</a></li>
                <li><a href="{{route('admin.categoria.listar')}}">Categorias</a></li>
                <li><a href="{{route('admin.marca.listar')}}">Marcas</a>
                <li><a href="{{route('admin.produto.listar')}}">Produtos</a>     
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                <li>
                <a href="{{route('admin.dashboard')}}">
                   {{ Auth::user()->name }}
                </a>
                </li>
                <li>
                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </li>
                @endif
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<hr class="clearfix"/>
