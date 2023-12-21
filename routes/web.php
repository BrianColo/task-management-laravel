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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/proyectos', 'ProjectController@index')->name('index_proyect');
Route::get('/proyectos/edit/{id}', 'ProjectController@edit')->name('edit_proyect');
Route::get('/proyectos/delete/{id}', 'ProjectController@delete')->name('delete_proyect');
Route::get('/proyectos/create', 'ProjectController@create')->name('create_proyect');
Route::put('/proyectos/update/{id}', 'ProjectController@update')->name('update_proyect');