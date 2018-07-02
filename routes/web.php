<?php
use app\dbClientes;

/*
Auth::routes();

Route::get('/site/',function(){
    Route::get('/', 'siteController@index')->name('index');
    Route::get('/login', 'siteController@login')->name('login');

});
*/

Route::get('/login', 'site\siteController@login')->name('login'); //Leva para tela de login
Route::get('/usuariologin', 'site\siteController@usuarioLogin')->name('usuariologin');
Route::get('/form_lembrar_senha', 'site\siteController@recupera_senha')->name('form_lembrar_senha');

//Rota que envia para a validacao
Route::post('/executarlogin', 'site\siteController@executarLogin')->name('executarlogin');
Route::post('/executaCriarConta', 'site\siteController@executaCriarConta')->name('executaCriarConta');
Route::post('/executaRecuperarSenha', 'site\siteController@executaRecuperarSenha')->name('executaRecuperarSenha');

//Rota que se comunica com o model
Route::get('/cadastro', 'site\siteController@cadastro')->name('cadastro');
Route::get('/recupera_senha', 'site\siteController@recupera')->name('recupera_senha');
Route::get('/', 'site\siteController@index')->name('index');

//routs para a area interna
Route::get('interno/interno','interno\internoConttoller@abrirInterno' )->name('interno');
Route::post('interno/trocarSenha','interno\internoConttoller@trocarSenha' )->name('trocarSenha');
Route::get('interno/criaPdf','interno\internoConttoller@criaPdf' )->name('criaPdf');
Route::get('/logout','site\siteController@logout' )->name('logout');

//Rotas da sessao Clientes
//route::resource('site/cliente','site\clienteController');
route::get('site/clienteListar','site\clienteController@index')->name('clienteListar');//Listar os Clientes Cadastrados
route::get('site/clienteCreate','site\clienteController@create')->name('clienteCreate');//Chama a view onde tera o fromullario de cadastro
route::post('site/clienteStore','site\clienteController@store')->name('clienteStore');//Aqui recebe as informações do formulario e faz o insert
route::post('site/show_cliente','site\clienteController@clienteShow')->name('show_cliente');//Select em Um unico Cliente e exibe
route::get('site/show_cliente_edit/{id}','site\clienteController@edit')->name('show_cliente_edit');//Abre o formulario ara editar os dados
route::post('site/show_cliente_update','site\clienteController@update')->name('show_cliente_update');//Faz o update dos dados vindo do edit
route::get('site/delete_cliente/{id}','site\clienteController@destroy')->name('delete_cliente');//deleta um registro
route::get('site/imprime_cliente/{id}','site\clienteController@imprimeCliente')->name('imprime_cliente');//deleta um registro

//Rotas da sessao Fornecedores
route::get('interno/fornecedorListar','interno\fornecedorController@index')->name('fornecedorListar');//Listar 
route::get('interno/fornecedorCreate','interno\fornecedorController@create')->name('fornecedorCreate');//Chama a view onde tera o fromullario de cadastro
route::post('interno/fornecedorStore','interno\fornecedorController@store')->name('fornecedorStore');//Aqui recebe as informações do formulario e faz o insert
route::get('interno/imprime_fornecedor/{id}','interno\fornecedorController@imprimeFornecedor')->name('imprime_fornecedor');//deleta um registro
route::get('interno/show_fornecedor_edit/{id}','interno\fornecedorController@edit')->name('show_fornecedor_edit');//deleta um registro
route::post('interno/show_fornecedor_update','interno\fornecedorController@update')->name('show_fornecedor_update');//atualiza um registro
route::get('interno/delete_fornecedor/{id}','interno\fornecedorController@destroy')->name('delete_fornecedor');//deleta um registro
route::post('interno/show_fornecedor','interno\fornecedorController@fornecedorShow')->name('show_fornecedor');//Select em Um unico Cliente e exibe


//Rotas da sessao Produtos
route::get('interno/produtosListar','interno\produtosController@index')->name('produtosListar');//Listar 
route::get('interno/produtosCreate','interno\produtosController@create')->name('produtosCreate');//Chama a view onde tera o fromullario de cadastro
route::get('interno/produtosShow/{id}','interno\produtosController@show')->name('produtosShow');//Exibe um unico item
route::post('interno/produtosStore','interno\produtosController@store')->name('produtosStore');//Aqui recebe as informações do formulario e faz o insert
route::post('interno/produtos_update','interno\produtosController@update')->name('produtos_update');//Atualiza um registro
route::get('interno/delete_produtos/{id}','interno\produtosController@destroy')->name('delete_produtos');//Deletar um regeistro
route::get('interno/imprime_Produtos/{id}','interno\produtosController@imprimeProdutos')->name('imprime_Produtos');//deleta um registro

//Rotas da sessao Admin
route::get('admin/usuarioListar','admin\adminController@index')->name('usuarioListar');//Listar 
route::get('admin/usuarioShow/{id}','admin\adminController@show')->name('usuarioShow');//Select em Um unico Cliente e exibe


