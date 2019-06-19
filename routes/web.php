<?php


Route::get('/', 'MatrizController@index')->name('index');
Route::get('/apaga/{id}', 'MatrizController@destroy')->name('destroy');
Route::post('/gerar/matriz','MatrizController@gerarMatriz')->name('gerarMatriz');
Route::post('/gravar/matriz/{linha}/{coluna}/','MatrizController@gravarMatriz')->name('gravarMatriz');
Route::get('/ver/{id}', 'MatrizController@verMatriz')->name('ver');
Route::get('/inversa/{id}', 'MatrizController@matrizinversa')->name('inversa');
