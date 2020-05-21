<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Home@index')->name('ordendetrabajo.index');

Route::match(['get', 'post'], '/find/{op?}', [
  'as' => 'ordendetrabajo.find.op',
  'uses' => 'Api\v1\TrazabilidadView@findOp'
]);
