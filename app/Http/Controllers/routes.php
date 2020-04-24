<?php
Route::get('/', 'HomeLte@index')->name('home');
Route::get('/login', 'Core\ApiLogin@index')->name('login');
Route::post('/login', 'Core\ApiLogin@start')->name('login.start');
Route::get('/logout', 'Core\ApiLogin@logout')->name('logout');

