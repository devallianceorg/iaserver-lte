<?php
use Illuminate\Support\Facades\Route;

Route::get('/v1/lanzamientos', 'v1\LanzamientosController@index')->name('controldecalidad.lanzamientos');
