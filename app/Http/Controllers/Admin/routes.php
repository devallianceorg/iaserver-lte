<?php
Route::get('/', 'Home@index')->name('admin');
Route::get('/logout', 'Home@logout')->name('logout');


