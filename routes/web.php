<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(); 
Route::get('/',['as' => 'site.home', 'uses'=>'Site\HomeController@index']);
Route::get('/sobre',['as' => 'site.sobre', 'uses'=>'Site\PaginaController@sobre']);
Route::get('/contato',['as' => 'site.contato', 'uses'=>'Site\PaginaController@contato']);
Route::post('/contato/enviar',['as' => 'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);
Route::get('/produto/{id}/{titulo?}',['as' => 'site.produto', 'uses'=>'Site\ProdutoController@index']);
Route::get('/marcas',['as' => 'site.marcas', 'uses'=>'Site\MarcaController@index']);
Route::get('/catalogos',['as' => 'site.catalogos', 'uses'=>'Site\CatalogoController@index']);
Route::get('/busca',['as' => 'site.busca', 'uses'=>'Site\HomeController@busca']);
Route::get('/admin/login', ['as'>'admin.login', function(){	return view ('admin.login.index');}]);
Route::post('/admin/login', ['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);


Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');
Route::get('/carrinho/adicionar', function() {return redirect()->route('index');});
Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
Route::post('/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');
Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
Route::post('/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');
Route::post('/carrinho/desconto', 'CarrinhoController@desconto')->name('carrinho.desconto');
Route::get('/carrinho/duplicar/{id}', 'CarrinhoController@duplicar')->name('carrinho.duplicar');
Route::post('/newslatter/salvar',['as' => 'site.newslatter.salvar','uses'=> 'Site\NewslatterController@salvar']);

Route::group(['middleware'=>'auth'], function(){

	Route::get('/admin',['as' => 'admin.principal', function(){
		return view('admin.principal.index');
	}]);

	Route::get('/admin/login/sair', ['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

	Route::get('/admin/usuarios',['as' => 'admin.usuarios','uses'=> 'Admin\UsuarioController@index']);
	Route::get('/admin/usuarios/adicionar',['as' => 'admin.usuarios.adicionar','uses'=> 'Admin\UsuarioController@adicionar']);
	Route::post('/admin/usuarios/salvar',['as' => 'admin.usuarios.salvar','uses'=> 'Admin\UsuarioController@salvar']);
	Route::get('/admin/usuarios/editar/{id}',['as' => 'admin.usuarios.editar','uses'=> 'Admin\UsuarioController@editar']);
	Route::put('/admin/usuarios/atualizar/{id}',['as' => 'admin.usuarios.atualizar','uses'=> 'Admin\UsuarioController@atualizar']);
	Route::get('/admin/usuarios/deletar/{id}', ['as'=> 'admin.usuarios.deletar', 'uses'=>'Admin\UsuarioController@deletar']);
	Route::get('/admin/usuarios/papel/{id}', ['as'=> 'admin.usuarios.papel', 'uses'=>'Admin\UsuarioController@papel']);
	Route::post('/admin/usuarios/papel/{id}/salvar', ['as'=> 'admin.usuarios.papel.salvar', 'uses'=>'Admin\UsuarioController@salvarPapel']);
	Route::get('/admin/usuarios/papel/remover/{id}/{papel_id}', ['as'=> 'admin.usuarios.papel.remover', 'uses'=>'Admin\UsuarioController@removerPapel']);
	Route::get('/admin/usuarios/papel/{id}', ['as'=> 'admin.usuarios.papel', 'uses'=>'Admin\UsuarioController@papel']);
	
	Route::get('/admin/paginas', ['as'=>'admin.paginas', 'uses'=>'Admin\PaginaController@index']);
	Route::get('/admin/paginas/editar/{id}',['as' => 'admin.paginas.editar','uses'=> 'Admin\PaginaController@editar']);
	Route::put('/admin/paginas/atualizar/{id}', ['as'=>'admin.paginas.atualizar', 'uses'=>'Admin\PaginaController@atualizar']);


	Route::get('/admin/categorias',['as' => 'admin.categorias','uses'=> 'Admin\SetorController@index']);
	Route::get('/admin/categorias/adicionar',['as' => 'admin.categorias.adicionar','uses'=> 'Admin\SetorController@adicionar']);
	Route::post('/admin/categorias/salvar',['as' => 'admin.categorias.salvar','uses'=> 'Admin\SetorController@salvar']);
	Route::get('/admin/categorias/editar/{id}',['as' => 'admin.categorias.editar','uses'=> 'Admin\SetorController@editar']);
	Route::put('/admin/categorias/atualizar/{id}',['as' => 'admin.categorias.atualizar','uses'=> 'Admin\SetorController@atualizar']);
	Route::get('/admin/categorias/deletar/{id}', ['as'=> 'admin.categorias.deletar', 'uses'=>'Admin\SetorController@deletar']);


	Route::get('/admin/cidades',['as' => 'admin.cidades','uses'=> 'Admin\CidadeController@index']);
	Route::get('/admin/cidades/adicionar',['as' => 'admin.cidades.adicionar','uses'=> 'Admin\CidadeController@adicionar']);
	Route::post('/admin/cidades/salvar',['as' => 'admin.cidades.salvar','uses'=> 'Admin\CidadeController@salvar']);
	Route::get('/admin/cidades/editar/{id}',['as' => 'admin.cidades.editar','uses'=> 'Admin\CidadeController@editar']);
	Route::put('/admin/cidades/atualizar/{id}',['as' => 'admin.cidades.atualizar','uses'=> 'Admin\CidadeController@atualizar']);
	Route::get('/admin/cidades/deletar/{id}', ['as'=> 'admin.cidades.deletar', 'uses'=>'Admin\CidadeController@deletar']);


	Route::get('/admin/lancamentos',['as' => 'admin.lancamentos','uses'=> 'Admin\LacamentoController@index']);
	Route::get('/admin/lancamentos/adicionar',['as' => 'admin.lancamentos.adicionar','uses'=> 'Admin\LacamentoController@adicionar']);
	Route::post('/admin/lancamentos/salvar',['as' => 'admin.lancamentos.salvar','uses'=> 'Admin\LacamentoController@salvar']);
	Route::get('/admin/lancamentos/editar/{id}',['as' => 'admin.lancamentos.editar','uses'=> 'Admin\LacamentoController@editar']);
	Route::put('/admin/lancamentos/atualizar/{id}',['as' => 'admin.lancamentos.atualizar','uses'=> 'Admin\LacamentoController@atualizar']);
	Route::get('/admin/lancamentos/deletar/{id}', ['as'=> 'admin.lancamentos.deletar', 'uses'=>'Admin\LacamentoController@deletar']);


	Route::get('/admin/marcas',['as' => 'admin.marcas','uses'=> 'Admin\MarcaController@index']);
	Route::get('/admin/marcas/adicionar',['as' => 'admin.marcas.adicionar','uses'=> 'Admin\MarcaController@adicionar']);
	Route::post('/admin/marcas/salvar',['as' => 'admin.marcas.salvar','uses'=> 'Admin\MarcaController@salvar']);
	Route::get('/admin/marcas/editar/{id}',['as' => 'admin.marcas.editar','uses'=> 'Admin\MarcaController@editar']);
	Route::put('/admin/marcas/atualizar/{id}',['as' => 'admin.marcas.atualizar','uses'=> 'Admin\MarcaController@atualizar']);
	Route::get('/admin/marcas/deletar/{id}', ['as'=> 'admin.marcas.deletar', 'uses'=>'Admin\MarcaController@deletar']);

	Route::get('/admin/depoimentos',['as' => 'admin.depoimentos','uses'=> 'Admin\DepoimentoController@index']);
	Route::get('/admin/depoimentos/adicionar',['as' => 'admin.depoimentos.adicionar','uses'=> 'Admin\DepoimentoController@adicionar']);
	Route::post('/admin/depoimentos/salvar',['as' => 'admin.depoimentos.salvar','uses'=> 'Admin\DepoimentoController@salvar']);
	Route::get('/admin/depoimentos/editar/{id}',['as' => 'admin.depoimentos.editar','uses'=> 'Admin\DepoimentoController@editar']);
	Route::put('/admin/depoimentos/atualizar/{id}',['as' => 'admin.depoimentos.atualizar','uses'=> 'Admin\DepoimentoController@atualizar']);
	Route::get('/admin/depoimentos/deletar/{id}', ['as'=> 'admin.depoimentos.deletar', 'uses'=>'Admin\DepoimentoController@deletar']);

	Route::get('/admin/catalogos',['as' => 'admin.catalogos','uses'=> 'Admin\CatalogoController@index']);
	Route::get('/admin/catalogos/adicionar',['as' => 'admin.catalogos.adicionar','uses'=> 'Admin\CatalogoController@adicionar']);
	Route::post('/admin/catalogos/salvar',['as' => 'admin.catalogos.salvar','uses'=> 'Admin\CatalogoController@salvar']);
	Route::get('/admin/catalogos/editar/{id}',['as' => 'admin.catalogos.editar','uses'=> 'Admin\CatalogoController@editar']);
	Route::put('/admin/catalogos/atualizar/{id}',['as' => 'admin.catalogos.atualizar','uses'=> 'Admin\CatalogoController@atualizar']);
	Route::get('/admin/catalogos/deletar/{id}', ['as'=> 'admin.catalogos.deletar', 'uses'=>'Admin\CatalogoController@deletar']);


	Route::get('/admin/produtos',['as' => 'admin.produtos','uses'=> 'Admin\ProdutoController@index']);
	Route::get('/admin/produtos/adicionar',['as' => 'admin.produtos.adicionar','uses'=> 'Admin\ProdutoController@adicionar']);
	Route::post('/admin/produtos/salvar',['as' => 'admin.produtos.salvar','uses'=> 'Admin\ProdutoController@salvar']);
	Route::get('/admin/produtos/editar/{id}',['as' => 'admin.produtos.editar','uses'=> 'Admin\ProdutoController@editar']);
	Route::put('/admin/produtos/atualizar/{id}',['as' => 'admin.produtos.atualizar','uses'=> 'Admin\ProdutoController@atualizar']);
	Route::get('/admin/produtos/deletar/{id}', ['as'=> 'admin.produtos.deletar', 'uses'=>'Admin\ProdutoController@deletar']);


	Route::get('/admin/galerias/{id}',['as' => 'admin.galerias','uses'=> 'Admin\GaleriaController@index']);
	Route::get('/admin/galerias/adicionar/{id}',['as' => 'admin.galerias.adicionar','uses'=> 'Admin\GaleriaController@adicionar']);
	Route::post('/admin/galerias/salvar/{id}',['as' => 'admin.galerias.salvar','uses'=> 'Admin\GaleriaController@salvar']);
	Route::get('/admin/galerias/editar/{id}',['as' => 'admin.galerias.editar','uses'=> 'Admin\GaleriaController@editar']);
	Route::put('/admin/galerias/atualizar/{id}',['as' => 'admin.galerias.atualizar','uses'=> 'Admin\GaleriaController@atualizar']);
	Route::get('/admin/galerias/deletar/{id}', ['as'=> 'admin.galerias.deletar', 'uses'=>'Admin\GaleriaController@deletar']);


	Route::get('/admin/slides',['as' => 'admin.slides','uses'=> 'Admin\SlideController@index']);
	Route::get('/admin/slides/adicionar',['as' => 'admin.slides.adicionar','uses'=> 'Admin\SlideController@adicionar']);
	Route::post('/admin/slides/salvar',['as' => 'admin.slides.salvar','uses'=> 'Admin\SlideController@salvar']);
	Route::get('/admin/slides/editar/{id}',['as' => 'admin.slides.editar','uses'=> 'Admin\SlideController@editar']);
	Route::put('/admin/slides/atualizar/{id}',['as' => 'admin.slides.atualizar','uses'=> 'Admin\SlideController@atualizar']);
	Route::get('/admin/slides/deletar/{id}', ['as'=> 'admin.slides.deletar', 'uses'=>'Admin\SlideController@deletar']);


	Route::get('/admin/funcoes',['as' => 'admin.funcoes','uses'=> 'Admin\PapelController@index']);
	Route::get('/admin/funcoes/adicionar',['as' => 'admin.funcoes.adicionar','uses'=> 'Admin\PapelController@adicionar']);
	Route::post('/admin/funcoes/salvar',['as' => 'admin.funcoes.salvar','uses'=> 'Admin\PapelController@salvar']);
	Route::get('/admin/funcoes/editar/{id}',['as' => 'admin.funcoes.editar','uses'=> 'Admin\PapelController@editar']);
	Route::put('/admin/funcoes/atualizar/{id}',['as' => 'admin.funcoes.atualizar','uses'=> 'Admin\PapelController@atualizar']);
	Route::get('/admin/funcoes/deletar/{id}', ['as'=> 'admin.funcoes.deletar', 'uses'=>'Admin\PapelController@deletar']);
	Route::get('/admin/funcoes/permissao/{id}',['as' => 'admin.funcoes.permissao','uses'=> 'Admin\PapelController@permissao']);
	Route::post('/admin/funcoes/permissao/{id}/salvar',['as' => 'admin.funcoes.permissao.salvar','uses'=> 'Admin\PapelController@salvarPermissao']);
	Route::get('/admin/funcoes/permissao/{id}/remover/{id_permissao}',['as' => 'admin.funcoes.permissao.remover','uses'=> 'Admin\PapelController@removerPermissao']);
	Route::get('/admin/funcoes/permissao/{id}',['as' => 'admin.funcoes.permissao','uses'=> 'Admin\PapelController@permissao']);
	Route::post('/admin/funcoes/permissao/salvar/{id}',['as' => 'admin.funcoes.permissao.salvar','uses'=> 'Admin\PapelController@salvarPermissao']);
	Route::get('/admin/funcoes/permissao/remover/{id}/{id_permissao}',['as' => 'admin.funcoes.permissao.remover','uses'=> 'Admin\PapelController@removerPermissao']);

	Route::get('/enderecos',['as' => 'enderecos.index','uses'=> 'Site\EnderecoController@index']);
	Route::get('/enderecos/adicionar',['as' => 'enderecos.adicionar','uses'=> 'Site\EnderecoController@adicionar']);
	Route::post('/enderecos/salvar',['as' => 'enderecos.salvar','uses'=> 'Site\EnderecoController@salvar']);
	Route::get('/enderecos/editar/{id}',['as' => 'enderecos.editar','uses'=> 'Site\EnderecoController@editar']);
	Route::put('/enderecos/atualizar/{id}',['as' => 'enderecos.atualizar','uses'=> 'Site\EnderecoController@atualizar']);
	Route::get('/enderecos/deletar/{id}', ['as'=> 'enderecos.deletar', 'uses'=>'Site\EnderecoController@deletar']);
});

