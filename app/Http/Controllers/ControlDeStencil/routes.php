<?php
Route::match(['get','post'],'/', 'Home@index');
Route::get('/detalle/{codigo}', 'View\StencilDetalle@index');

Route::prefix('observaciones')->group(function () {
    Route::get('/', 'View\Observaciones@index');
    Route::post('/create', 'View\Observaciones@create');
    Route::post('/delete/{id}', 'View\Observaciones@delete');
});

Route::prefix('lavados')->group(function () {
    Route::get('/', 'View\Lavados@index');
    Route::post('/create', 'View\Lavados@create');
    Route::post('/delete/{id}', 'View\Lavados@delete');
});

Route::prefix('tension')->group(function () {
    Route::post('/create', 'View\Tension@create');
    Route::post('/delete/{id}', 'View\Tension@delete');
});
