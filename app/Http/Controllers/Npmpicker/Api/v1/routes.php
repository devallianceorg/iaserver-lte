<?php
// Modulo
Route::prefix('npmpicker/api/v1')
  ->namespace('Npmpicker\Api\v1')
  ->group(function () {		
		// RestAPI
		Route::resource('/ping', 'PingRest');
});


