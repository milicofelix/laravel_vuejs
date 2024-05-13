<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return 'Olá, seja bem vindo ao curso!';
// });

Route::get('/', 'MainController@main')->name('site.index');
Route::get('/about-us', 'AboutUsController@index')->name('site.sobrenos');
Route::get('/contact', 'ContactController@index')->name('site.contato');
Route::post('/contact', 'ContactController@store')->name('site.contato');
Route::get('/login/{error?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@login')->name('site.login');

    Route::middleware('authentication:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/clients', 'ClientsController@index')->name('app.clients');
    Route::get('/', 'HomeController@index')->name('app.home');
    Route::get('/suppliers', 'SupplierController@index')->name('app.suppliers');
    Route::get('/products', 'ProductsController@index')->name('app.products');
    Route::get('/login', 'LoginController@logoff')->name('app.logoff');
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
