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

        <title>Lanchonete</title>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/css/assets/css/style.css')}}" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="{{asset('bootstrap/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

        <!-- Custom styles for this template -->
        
        
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            @include('layouts.admin-cabecalho')
            <!-- Example row of columns -->
            <div class="row" style="padding-top: 40px;">
                <div class="col-lg-2">
                    <h3>Administrador</h3>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('admin.dashboard')}}">
                                Painel de controle
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.pedidos')}}">
                                Todos os pedidos
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.pedidos', '?status=nao-pagos')}}">
                                Pedidos pendentes de pagamento
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.pedidos', '?status=pagos')}}">
                                Pedidos pagos
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.pedidos', '?status=finalizados')}}">
                                Pedidos finalizados
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.perfil')}}">
                                Perfil
                            </a>
                        </li>
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
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    </body>
</html>
