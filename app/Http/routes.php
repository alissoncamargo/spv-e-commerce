<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::post('/pagseguro/notification', [
    'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
    'as' => 'pagseguro.notification',
]);

Route::auth();


//github
Route::get('/auth/github', 'SocialAuthController@EntrarGitHub');

Route::get('/retorno/github', 'SocialAuthController@RetornoGitHub');


//facebook
Route::get('/auth/facebook', 'SocialAuthController@EntrarFacebook');

Route::get('/retorno/facebook', 'SocialAuthController@RetornoFacebook');

Route::get('home', array('as' => 'home', 'uses' => function(){
  return view('home');
}));

Route::get('/', 'FrenteLojaController@getIndex');

Route::get('admin', function () {
    return view('admin_template');
});

Route::get('sobre', [
    'as' => 'sobre',
    'uses' => 'FrenteLojaController@getSobre'
]);
Route::get('pagseguro/checkout', [
    'as' => 'pagseguro.checkout',
    'uses' => 'PedidoController@postCheckout'
]);
Route::get('categoria/{id?}', [
    'as' => 'categoria.listar',
    'uses' => 'CategoriaController@getCategoria'
]);
/*
 * ATENÇÃO para esta rota, ela deve estar antes de produto/{id}
 * para funcionar
 */
Route::any('produto/buscar', [
    'as' => 'produto.buscar',
    'uses' => 'ProdutoController@getBuscar'
]);
Route::get('produto/{id}', [
    'as' => 'produto.detalhes',
    'uses' => 'ProdutoController@getProdutoDetalhes'
]);
Route::get('imagem/arquivo/{nome}', [
    'as' => 'imagem.file',
    'uses' => 'ImagemController@getImagemFile'
]);

Route::any('imagem/arquivo/{nome}', [
    'as' => 'imagem.file',
    'uses' => 'ImagemController@getImagemFile'
]);

Route::any('carrinho/adicionar/{id}', [
    'as' => 'carrinho.adicionar',
    'uses' => 'CarrinhoController@anyAdicionar'
]);

Route::any('carrinho/remover_item/{id}', [
    'as' => 'carrinho.remover-item',
    'uses' => 'CarrinhoController@remover_item'
]);

Route::get('carrinho', [
    'as' => 'carrinho.listar',
    'uses' => 'CarrinhoController@getListar'
]);

Route::get('carrinho/esvaziar', [
    'as' => 'carrinho.esvaziar',
    'uses' => 'CarrinhoController@getEsvaziar'
]);
Route::post('carrinho/avaliar', [
    'as' => 'carrinho.avaliar',
    'uses' => 'CarrinhoController@Avaliar'

]);

Route::post('carrinho/calcFrete', [
    'as' => 'carrinho.calcFrete',
    'uses' => 'CarrinhoController@calcFrete'
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('carrinho/finalizar-compra', [
        'as' => 'carrinho.finalizar-compra',
        'uses' => 'CarrinhoController@getFinalizarCompra'
    ]);

    Route::get('cliente/dashboard', [
        'as' => 'cliente.dashboard',
        'uses' => 'ClienteController@getDashboard'
    ]);

    Route::get('cliente/pedidos/{id?}', [
        'as' => 'cliente.pedidos',
        'uses' => 'ClienteController@getPedidos'
    ]);
    Route::get('cliente/perfil', [
        'as' => 'cliente.perfil',
        'uses' => 'ClienteController@getPerfil'
    ]);
    Route::any('cliente/avaliar/{id}', [
        'as' => 'cliente.avaliar',
        'uses' => 'ClienteController@postAvaliar'
    ]);

        
            Route::get('admin', [
                'as' => 'admin',
                'uses' => 'AdminController@getDashboard'
            ]);
            Route::get('admin/dashboard', [
                'as' => 'admin.dashboard',
                'uses' => 'AdminController@getDashboard'
            ]);
            Route::put('admin/pedido/pago/{id}', [
                'as' => 'admin.pedido.pago',
                'uses' => 'AdminController@putPedidoPago'
            ]);
            Route::put('admin/pedido/finalizado/{id}', [
                'as' => 'admin.pedido.finalizado',
                'uses' => 'AdminController@putPedidoFinalizado'
            ]);
            Route::get('admin/pedidos/{id?}', [
                'as' => 'admin.pedidos',
                'uses' => 'AdminController@getPedidos'
            ]);
            Route::get('admin/perfil', [
                'as' => 'admin.perfil',
                'uses' => 'AdminController@getPerfil'
            ]);
            Route::get('admin/categoria/listar', [
                'as' => 'admin.categoria.listar',
                'uses' => 'CategoriaController@listar'
            ]);
            Route::get('admin/categoria/{id?}/editar', [
                'as' => 'admin.categoria.editar',
                'uses' => 'CategoriaController@editar'
            ]);
            Route::get('admin/categoria/form', [
                'as' => 'admin.categoria.criar',    
                'uses' => 'CategoriaController@criar'
            ]);
            Route::get('admin/categoria/excluir', [
                'as' => 'admin.categoria.excluir',
                'uses' => 'CategoriaController@excluir'
            ]);
            Route::post('admin/categoria/listar', [
                'as' => 'admin.categoria.salvar',
                'uses' => 'CategoriaController@salvar'
            ]);
            Route::patch('admin/categoria/atualizar/{id}', [
                'as' => 'admin.categoria.atualizar',
                'uses' => 'CategoriaController@atualizar'
            ]);
            Route::get('admin/categoria/{id?}/excluir', [
                'as' => 'admin.categoria.excluir',
                'uses' => 'CategoriaController@excluir'
            ]);
            Route::delete('admin/categoria/{id?}/delete', [
                'as' => 'admin.categoria.delete',
                'uses' => 'CategoriaController@delete'
            ]);
            Route::get('admin/marca/listar', [
                'as' => 'admin.marca.listar',
                'uses' => 'MarcaController@listar'
            ]);
            Route::get('admin/marca/{id?}/editar', [
                'as' => 'admin.marca.editar',
                'uses' => 'MarcaController@editar'
            ]);
            Route::get('admin/marca/form', [
                'as' => 'admin.marca.criar',    
                'uses' => 'MarcaController@criar'
            ]);
            Route::get('admin/marca/excluir', [
                'as' => 'admin.marca.excluir',
                'uses' => 'MarcaController@excluir'
            ]);
            Route::post('admin/marca/listar', [
                'as' => 'admin.marca.salvar',
                'uses' => 'MarcaController@salvar'
            ]);
            Route::patch('admin/marca/atualizar/{id}', [
                'as' => 'admin.marca.atualizar',
                'uses' => 'MarcaController@atualizar'
            ]);
            Route::get('admin/marca/{id?}/excluir', [
                'as' => 'admin.marca.excluir',
                'uses' => 'MarcaController@excluir'
            ]);
            Route::delete('admin/marca/{id?}/delete', [
                'as' => 'admin.marca.delete',
                'uses' => 'MarcaController@delete'
            ]);
            Route::get('admin/produto/listar', [
                'as' => 'admin.produto.listar',
                'uses' => 'ProdutoController@listar'
            ]);
            Route::get('admin/produto/{id?}/editar', [
                'as' => 'admin.produto.editar',
                'uses' => 'ProdutoController@editar'
            ]);
            Route::get('admin/produto/form', [
                'as' => 'admin.produto.criar',    
                'uses' => 'ProdutoController@criar'
            ]);
            Route::get('admin/produto/excluir', [
                'as' => 'admin.produto.excluir',
                'uses' => 'ProdutoController@excluir'
            ]);
            Route::post('admin/produto/listar', [
                'as' => 'admin.produto.salvar',
                'uses' => 'ProdutoController@salvar'
            ]);
            Route::patch('admin/produto/atualizar/{id}', [
                'as' => 'admin.produto.atualizar',
                'uses' => 'ProdutoController@atualizar'
            ]);
            Route::get('admin/produto/{id?}/excluir', [
                'as' => 'admin.produto.excluir',
                'uses' => 'ProdutoController@excluir'
            ]);
            Route::delete('admin/produto/{id?}/delete', [
                'as' => 'admin.produto.delete',
                'uses' => 'ProdutoController@delete'
            ]);
});


//Route::get('/home', 'HomeController@index');