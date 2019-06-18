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

Route::get('/', 'MatrizController@index')->name('index');
Route::get('/ver/{id}', 'MatrizController@ver')->name('ver');
Route::get('/apaga/{id}', 'MatrizController@destroy')->name('destroy');
Route::post('/gerar/matriz','MatrizController@gerarMatriz')->name('gerarMatriz');
//Route::post('/gravar/matriz/{id}','MatrizController@gravarMatriz')->name('gravarMatriz');
Route::post('/gravar/matriz','MatrizController@gravarMatriz')->name('gravarMatriz');

