<?php


use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('jde', 'App\Http\Controllers\JdeApiController@index')->name('todosJDE');

Route::get('proactivanet', 'App\Http\Controllers\ProactivanetApiController@index')->name('todosPROA');

Route::get('cruce', 'App\Http\Controllers\CompararArrays@comparar')->name('cruceJDE');
Route::get('llenarBD', 'App\Http\Controllers\CompararArrays@llenarBD')->name('llenarBD');
