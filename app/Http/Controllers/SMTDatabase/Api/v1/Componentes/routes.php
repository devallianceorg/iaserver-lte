<?php
use Illuminate\Support\Facades\Route;


Route::post('/buscar', [
    'as' => 'smtdatabase.componentes.buscar',
    'uses' => 'ComponentesView@findComponente'
]);

Route::post('/buscar/semielaborado', [
    'as' => 'smtdatabase.componentes.buscar.semielaborado',
    'uses' => 'ComponentesView@findSemielaborado'
]);

Route::post('/buscar/modelo', [
    'as' => 'smtdatabase.componentes.buscar.semielaborado.modelo',
    'uses' => 'ComponentesView@allSemielaboradoByModelo'
]);

Route::get('buscar/semielaborado/{semi}',[
    'as' => 'smtdatabase.componentes.buscar.todos.semielaborado',
    'uses' => 'ComponentesView@findByBom'
]);