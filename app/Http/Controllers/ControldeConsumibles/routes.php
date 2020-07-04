<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Home@index')->name('controldeconsumibles.index');
Route::get('/cliente','Home@clienteIndex')->name('controldeconsumibles.cliente.index');

Route::namespace('Api\v1')->group(function(){
  Route::get('/history','ControldeConsumiblesView@getHistory')->name('controldeconsumibles.history');
  Route::get('/request/{barcode}','ControldeConsumiblesView@getConsumable');
  Route::get('/login/{barcode}','ControldeConsumiblesView@getUserInfo')->name('controldeconsumibles.login');
  Route::get('/prompt','ControldeConsumiblesView@prompt');

  Route::post('/egress/store','ControldeConsumiblesView@egressStore');
  Route::post('/returns/store','ControldeConsumiblesView@returnsStore');
});