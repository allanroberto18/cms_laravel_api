<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'angular', 'middleware' => 'cors', 'as' => 'angular.', 'namespace' => 'Angular'], function(){
    Route::group(['prefix' => 'config', 'as' => 'config.'], function(){
        Route::get('', 'ConfigController@index')->name('index');
        Route::post('remover', 'ConfigController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'ConfigController@create')->name('create');
        Route::post('upload', 'ConfigController@upload')->name('upload');
        Route::put('atualizar/{id}', 'ConfigController@update')->name('update');
    });
    Route::group(['prefix' => 'download', 'as' => 'download.'], function(){
        Route::get('', 'DownloadController@index')->name('index');
        Route::post('remover', 'DownloadController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'DownloadController@create')->name('create');
        Route::put('atualizar/{id}', 'DownloadController@update')->name('update');
    });
    Route::group(['prefix' => 'assunto', 'as' => 'assunto.'], function(){
        Route::get('', 'FaleConoscoAssuntoController@index')->name('index');
        Route::post('remover', 'FaleConoscoAssuntoController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'FaleConoscoAssuntoController@create')->name('create');
        Route::put('atualizar/{id}', 'FaleConoscoAssuntoController@update')->name('update');
    });
    Route::group(['prefix' => 'contato', 'as' => 'contato.'], function(){
        Route::get('', 'FaleConoscoController@index')->name('index');
        Route::post('remover', 'FaleConoscoController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'FaleConoscoController@create')->name('create');
        Route::get('assuntos', 'FaleConoscoController@assuntos')->name('assuntos');
        Route::put('atualizar/{id}', 'FaleConoscoController@update')->name('update');
    });
    Route::group(['prefix' => 'menu', 'as' => 'menu.'], function(){
        Route::get('', 'MenuController@index')->name('index');
        Route::post('remover', 'MenuController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'MenuController@create')->name('create');
        Route::post('upload', 'MenuController@upload')->name('upload');
        Route::put('atualizar/{id}', 'MenuController@update')->name('update');
    });
    Route::group(['prefix' => 'noticia', 'as' => 'noticia.'], function(){
        Route::get('', 'NoticiaController@index')->name('index');
        Route::post('remover', 'NoticiaController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'NoticiaController@create')->name('create');
        Route::post('upload', 'NoticiaController@upload')->name('upload');
        Route::put('atualizar/{id}', 'NoticiaController@update')->name('update');
    });

    Route::group(['prefix' => 'banner', 'as' => 'banner.'], function(){
        Route::get('', 'BannerController@index')->name('index');
        Route::post('remover', 'BannerController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'BannerController@create')->name('create');
        Route::post('upload', 'BannerController@upload')->name('upload');
        Route::put('atualizar/{id}', 'BannerController@update')->name('update');
    });

    Route::group(['prefix' => 'pagina', 'as' => 'pagina.'], function(){
        Route::get('', 'PaginaController@index')->name('index');
        Route::post('remover', 'PaginaController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'PaginaController@create')->name('create');
        Route::post('upload', 'PaginaController@upload')->name('upload');
        Route::put('atualizar/{id}', 'PaginaController@update')->name('update');

        Route::group(['prefix' => 'caracteristica', 'as' => 'caracteristica.'], function(){
            Route::get('{paginaId}', 'PaginaCaracteristicaController@index')->name('index');
            Route::post('remover', 'PaginaCaracteristicaController@removeSelected')->name('removeSelected');
            Route::post('salvar', 'PaginaCaracteristicaController@create')->name('create');
            Route::put('atualizar/{id}', 'PaginaCaracteristicaController@update')->name('update');
        });

        Route::group(['prefix' => 'cliente', 'as' => 'cliente.'], function(){
            Route::get('{paginaId}', 'PaginaClienteController@index')->name('index');
            Route::post('remover', 'PaginaClienteController@removeSelected')->name('removeSelected');
            Route::post('salvar', 'PaginaClienteController@create')->name('create');
            Route::post('upload', 'PaginaClienteController@upload')->name('upload');
            Route::put('atualizar/{id}', 'PaginaClienteController@update')->name('update');
        });

        Route::group(['prefix' => 'produto', 'as' => 'produto.'], function(){
            Route::get('{paginaId}', 'PaginaProdutoController@index')->name('index');
            Route::post('remover', 'PaginaProdutoController@removeSelected')->name('removeSelected');
            Route::post('salvar', 'PaginaProdutoController@create')->name('create');
            Route::post('upload', 'PaginaProdutoController@upload')->name('upload');
            Route::put('atualizar/{id}', 'PaginaProdutoController@update')->name('update');

            Route::group(['prefix' => 'caracteristica', 'as' => 'caracteristica.'], function(){
                Route::get('{paginaId}', 'PaginaProdutoCaracteristicaController@index')->name('index');
                Route::post('remover', 'PaginaProdutoCaracteristicaController@removeSelected')->name('removeSelected');
                Route::post('salvar', 'PaginaProdutoCaracteristicaController@create')->name('create');
                Route::put('atualizar/{id}', 'PaginaProdutoCaracteristicaController@update')->name('update');
            });
        });
        
        Route::group(['prefix' => 'video', 'as' => 'video.'], function(){
            Route::get('{paginaId}', 'PaginaVideoController@index')->name('index');
            Route::post('remover', 'PaginaVideoController@removeSelected')->name('removeSelected');
            Route::post('salvar', 'PaginaVideoController@create')->name('create');
            Route::put('atualizar/{id}', 'PaginaVideoController@update')->name('update');
        });
    });
    Route::group(['prefix' => 'video', 'as' => 'video.'], function(){
        Route::get('', 'VideoController@index')->name('index');
        Route::post('remover', 'VideoController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'VideoController@create')->name('create');
        Route::put('atualizar/{id}', 'VideoController@update')->name('update');
        Route::get('categorias', 'VideoController@categorias')->name('assuntos');
    });
    Route::group(['prefix' => 'video/categoria', 'as' => 'video_categoria.'], function(){
        Route::get('', 'VideoCategoriaController@index')->name('index');
        Route::post('remover', 'VideoCategoriaController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'VideoCategoriaController@create')->name('create');
        Route::put('atualizar/{id}', 'VideoCategoriaController@update')->name('update');
    });

    Route::group(['prefix' => 'sobre_nos', 'as' => 'sobre_nos.'], function(){
        Route::get('', 'SobreNosController@index')->name('index');
        Route::get('icones', 'SobreNosController@icones')->name('icones');
        Route::post('remover', 'SobreNosController@removeSelected')->name('removeSelected');
        Route::post('salvar', 'SobreNosController@create')->name('create');
        Route::post('upload', 'SobreNosController@upload')->name('upload');
        Route::put('atualizar/{id}', 'SobreNosController@update')->name('update');
    });

});