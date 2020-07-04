<?
use Illuminate\Support\Facades\Route;

Route::match(['get','post'],'/cogiscan_utilities', 'Home@index');
