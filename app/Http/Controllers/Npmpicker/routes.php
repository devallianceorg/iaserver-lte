<?php
// Modulo
Route::prefix('npmpicker')
  ->namespace('Npmpicker')
  ->group(function () {
	// Rutas
	Route::get('/', 'Home@index')->name('npmpicker.index');

	Route::get('/detalle/{id}', 'Home@detalle');

});


