<?php
Route::match(['get','post'],'/', 'Home@index')->name('controldestencil.index');

Route::get('/observaciones', 'Home@observaciones')->name('controldestencil.observaciones');
Route::post('/observaciones/create', 'Home@observacionesCreate')->name('controldestencil.observaciones.create');
Route::post('/observaciones/delete/{id}', 'Home@observacionesDelete')->name('controldestencil.observaciones.delete');

Route::get('/detalle/{codigo}', 'Home@detalle')->name('controldestencil.detalle');
Route::get('/lavados', 'Home@lavados')->name('controldestencil.lavados');


