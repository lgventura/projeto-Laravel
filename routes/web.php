<?php


Route::get('/', 'TimeController@index');

Route::get('/adm/times', 'TimeController@index');
Route::get('/adm/times/cadastrar', 'TimeController@cadastrar');
Route::post('/adm/times/inserir', 'TimeController@inserir');
Route::get('/adm/times/dados/{id}', 'TimeController@dados');
Route::get('/adm/times/detalhes/{id}', 'TimeController@detalhes');
Route::get('/adm/times/vincular/{id}', 'TimeController@vincular');
Route::post('/adm/times/jogadores', 'TimeController@jogadores');
Route::get('/adm/times/deletar/{id}', 'TimeController@deletar');
Route::post('/adm/times/editar', 'TimeController@editar');

Route::get('/adm/times/export','TimeController@exportExcel');
Route::get('/adm/times/exportDetalhesExcel/{id}','TimeController@exportDetalhesExcel');

Route::get('/adm/jogadores', 'JogadoreController@index');
Route::get('/adm/jogadores/cadastrar', 'JogadoreController@cadastrar');
Route::post('/adm/jogadores/inserir', 'JogadoreController@inserir');
Route::get('/adm/jogadores/dados/{id}', 'JogadoreController@dados');
Route::get('/adm/jogadores/deletar/{id}', 'JogadoreController@deletar');
Route::post('/adm/jogadores/editar', 'JogadoreController@editar');
Route::get('/adm/jogadores/desvincular/{id}', 'JogadoreController@desvincular');

Route::get('/adm/jogadores/export','JogadoreController@exportExcel');

Route::get('/adm/xmls', 'XmlController@index');
Route::get('/adm/xmls/importar', 'XmlController@importar');
Route::post('/adm/xmls/inserir', 'XmlController@inserir');
Route::get('/adm/xmls/downloadxml/{id}', 'XmlController@downloadxml');
Route::post('/adm/xmls/downloadSelectedXmls', 'XmlController@downloadSelectedXmls');


