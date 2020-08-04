<?php

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('itemCRUD','ItemCRUDController');

//Banco
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('enviardatos','HomeController@enviardatos')->name('enviardatos');
Route::get('/viewcliente', 'HomeController@viewcliente')->name('viewcliente');
Route::get('/tablaclientes', 'HomeController@tablaclientesindex')->name('tablaclientes');
Route::get('cobrofaci/tablaclientesindex', ['as'=>'cobrofacil.tablaclientesindex','uses'=>'HomeController@tablaclientes']); // for datatable
Route::post('/jsvclientes', 'HomeController@jsvclientes')->name('jsvclientes');


// Validator contraseña
Route::get('/user', 'UserController@user')->name('user');
Route::get('/password', 'UserController@password')->name('password');
Route::get('user/password', 'UserController@password');
Route::post('user/updatepassword', 'UserController@updatePassword');

