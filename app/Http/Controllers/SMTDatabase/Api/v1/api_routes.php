<?php
use Illuminate\Support\Facades\Route;
// En caso de ocupar la ruta por medio de VUE
Route::get('/resume/{fecha}', 'Npmpicker@GetPing');
Route::get('/resume/{fecha}/{id_linea}/{turno}/{estado?}', 'Npmpicker@GetFeeders');
Route::get('/stat/{id_stat}', 'Npmpicker@GetFeederDetail');

