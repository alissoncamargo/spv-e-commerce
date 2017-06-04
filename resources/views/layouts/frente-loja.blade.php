<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Shoppvel</title>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        {!! HTML::style('bootstrap/css/assets/css/style.css') !!}
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        
        <!-- Custom styles for this template -->
        <link href="{{asset('bootstrap/css/nav-justified.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/css/lightbox.css')}}" rel="stylesheet">
        <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        
        <!--<script src="{{asset('bootstrap/js/ie10-viewport-bug-workaround.js')}}"></script>-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            @include('layouts.frente-cabecalho')
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-lg-2 ">
                    <h3>Categorias</h3>
                    <ul class="list-group">
                        @foreach ($listcategorias as $cat)
                        @if (is_null($cat->categoria_id))
                        <li class="list-group-item">
                            <a href="{{route('categoria.listar', $cat->id)}}">
                                {{$cat->nome}}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-10">
                    @include('layouts.messages')

                    @yield('conteudo')
                </div>
            </div>

            <!-- Site footer -->
            <footer class="footer">
                <p>&copy; 2016 Ademir Mazer Junior. @nunomazer - ademir.mazer.jr@gmail.com</p>
            </footer>

        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{asset('bootstrap/js/ie10-viewport-bug-workaround.js')}}"></script>
        <script src="{{asset('bootstrap/js/lightbox.js')}}"></script>
    </body>
</html>
