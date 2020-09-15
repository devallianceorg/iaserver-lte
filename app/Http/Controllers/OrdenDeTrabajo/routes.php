<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Home@index')->name('ordendetrabajo.index');

Route::match(['get', 'post'], '/find/{op?}', 'Api\v1\TrazabilidadView@findOp')->name('ordendetrabajo.find.op');
