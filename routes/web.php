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



Route::group(['prefix' => 'angular', 'as' => 'angular.', 'middleware' => 'cors'], function(){
    Route::get('token', 'TokenController@getToken')->name('token');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'DashboardController@logout')->name('logout');
});

Auth::routes();

Route::get('/', 'LandPageController@index')->name('home');
Route::get('/i/{slug}', 'PaginaController@show')->name('pagina.show');

Route::get('/producao', 'LandPageController@producao')->name('producao');

Route::group(['prefix' => 'n', 'as' => 'noticia.'], function(){
   Route::get('', 'NoticiaController@index')->name('index');
   Route::get('{slug}', 'NoticiaController@show')->name('show');
});

Route::get('downloads/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = storage_path() .'/downloads/'. $filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+');
