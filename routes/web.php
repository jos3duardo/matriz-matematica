<?php

Auth::routes();

Route::get('/', 'MatrizController@index')->name('index');
Route::get('/apaga/{id}', 'MatrizController@destroy')->name('destroy');
Route::post('/gerar/matriz','MatrizController@gerarMatriz')->name('gerarMatriz');
Route::post('/gravar/matriz/{linha}/{coluna}/','MatrizController@gravarMatriz')->name('gravarMatriz');
Route::get('/ver/{id}', 'MatrizController@Ver')->name('ver');
//Route::get('/inversa/{id}', 'MatrizController@Inversa')->name('inversa');
Route::get('/transposta/{id}', 'MatrizController@Transposta')->name('transposta');
Route::get('/oposta/{id}', 'MatrizController@Oposta')->name('oposta');
Route::post('/multiplicar/{id}', 'MatrizController@multiplicar')->name('multiplicar');
Route::get('/multiplicar/form/{id}', 'MatrizController@multiplicarForm')->name('multiplicarForm');
Route::post('/calcular/{id}', 'MatrizController@calcularMatriz')->name('calcularMatriz');

Route::post('/edit/{id}','MatrizController@editar')->name('editar');
Route::get('/inversa/{id}','MatrizController@inversaOrdem2')->name('inversa');
Route::get('/traco/{id}/{coluna}','MatrizController@traco')->name('traco');

Route::get('/home', 'HomeController@index')->name('home');
