<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Shoppvel- e commerce</a>
        </div>
        {!! Form::open(array('route' => 'produto.buscar', 'class'=>'navbar-form navbar-right')) !!} 
        <div class="form-group">
            {!! Form::text('termo-pesquisa', null,['placeholder'=>'Pesquisar',
            'class'=>'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
        {!! Form::close() !!}
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Home</a></li>
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
            </li>
          </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<hr class="clearfix"/>
