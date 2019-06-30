<?php


Route::get('/', 'MatrizController@index')->name('index');
Route::get('/apaga/{id}', 'MatrizController@destroy')->name('destroy');
Route::post('/gerar/matriz','MatrizController@gerarMatriz')->name('gerarMatriz');
Route::post('/gravar/matriz/{linha}/{coluna}/','MatrizController@gravarMatriz')->name('gravarMatriz');
Route::get('/ver/{id}', 'MatrizController@Ver')->name('ver');
Route::get('/inversa/{id}', 'MatrizController@Inversa')->name('inversa');
Route::get('/transposta/{id}', 'MatrizController@Transposta')->name('transposta');
Route::post('/multiplicar/{id}', 'MatrizController@multiplicar')->name('multiplicar');
Route::post('/multiplicar/form/{id}', 'MatrizController@multiplicarForm')->name('multiplicarForm');


