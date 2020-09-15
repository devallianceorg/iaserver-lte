<?php
use Illuminate\Support\Facades\Route;

Route::match(['get','post'],'/', 'Home@index');
Route::post('/search/{op?}', 'View\MemoriasView@search')->name('memorias.search');


Route::match(['get', 'post'], '/search/{op?}',  [
    'as' => 'memorias.search',
    'uses' => 'Memorias\MemoriasView@search'
]);