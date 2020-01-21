<?php
// Modulo
Route::prefix('admin')
  ->namespace('Admin')
  ->group(function () {
	// Rutas

	Route::get('/', 'Home@index')->name('admin');
	Route::get('/logout', 'Home@logout')->name('logout');
});


