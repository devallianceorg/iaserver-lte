<?php
use Illuminate\Support\Facades\Route;

Route::get('/v1/lanzamientos', 'v1\LanzamientosController@index')->name('controldecalidad.lanzamientos');

Route::get('/v1/cuarentena', 'v1\CuarentenaController@index')->name('controldecalidad.cuarentena');
Route::get('/v1/cuarentena/create', 'v1\CuarentenaController@createView')->name('controldecalidad.cuarentena.create');
Route::get('/v1/cuarentena/edit', 'v1\CuarentenaController@editView')->name('controldecalidad.cuarentena.edit');
