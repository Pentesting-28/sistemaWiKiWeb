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

//Login
Route::get('/', function () {
    return view('auth.login');
});

//Register on laravel disable
Auth::routes(['register' => false]);

//Home
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function (){

//Users
Route::get('users','UserController@index')->name('users.index')->middleware('can:users.index');
Route::get('users/search','UserController@busqueda')->name('users.busqueda')->middleware('can:users.index');
Route::get('users/create','UserController@create')->name('users.create')->middleware('can:users.create');
Route::post('users/store','UserController@store')->name('users.store')->middleware('can:users.create');
Route::get('users/{id}','UserController@show')->name('users.show')->middleware('can:users.show');
Route::get('users/{user}/edit','UserController@edit')->name('users.edit')->middleware('can:users.edit');
Route::put('users/{user}','UserController@update')->name('users.update')->middleware('can:users.edit');
Route::delete('users/{id}','UserController@destroy')->name('users.destroy')->middleware('can:users.destroy');

//Roles
Route::get('role','RoleController@index')->name('roles.index')->middleware('can:roles.index');
Route::get('role/search','RoleController@busqueda')->name('roles.busqueda')->middleware('can:roles.index');
Route::get('role/create','RoleController@create')->name('roles.create')->middleware('can:roles.create');
Route::post('role/store','RoleController@store')->name('roles.store')->middleware('can:roles.create');
Route::get('role/{id}','RoleController@show')->name('roles.show')->middleware('can:roles.show');
Route::get('role/{id}/edit','RoleController@edit')->name('roles.edit')->middleware('can:roles.edit');
Route::put('role/{id}','RoleController@update')->name('roles.update')->middleware('can:roles.edit');
Route::delete('role/{id}','RoleController@destroy')->name('roles.destroy')->middleware('can:roles.destroy');

//Manuals_Procedimientos
Route::get('manuals','ManualController@index')->name('manuales.index')->middleware('can:manuales.index');
Route::get('manuals/search','ManualController@busqueda')->name('manuales.busqueda')->middleware('can:manuales.index');
Route::get('manuals/create','ManualController@create')->name('manuales.create')->middleware('can:manuales.create');
Route::post('manuals/store','ManualController@store')->name('manuales.store')->middleware('can:manuales.create');
Route::get('manuals/{id}','ManualController@show')->name('manuales.show')->middleware('can:manuales.show');
Route::get('manuals/{id}/edit','ManualController@edit')->name('manuales.edit')->middleware('can:manuales.edit');
Route::put('manuals/{id}','ManualController@update')->name('manuales.update')->middleware('can:manuales.edit');
Route::delete('manuals/{id}','ManualController@destroy')->name('manuales.destroy')->middleware('can:manuales.destroy');

//Subtitle
Route::post('Subtitle/store','SubtitleController@store')->name('subtitle.store')->middleware('can:manuales.create');
Route::put('Subtitle/{id}','SubtitleController@update')->name('subtitle.update')->middleware('can:manuales.edit');
Route::delete('Subtitle/{id}','SubtitleController@destroy')->name('subtitle.destroy')->middleware('can:manuales.destroy');

//Images
Route::post('Imagen/store','ImagenController@store')->name('imagen.store')->middleware('can:manuales.create');
Route::get('Imagen/{id}/edit','ImagenController@edit')->name('imagen.edit')->middleware('can:manuales.edit');
Route::put('Imagen/{id}','ImagenController@update')->name('imagen.update')->middleware('can:manuales.edit');
Route::delete('Imagen/{id}','ImagenController@destroy')->name('imagen.destroy')->middleware('can:manuales.destroy');

});


