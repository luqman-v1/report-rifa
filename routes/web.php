<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'App\Http\Controllers'],function(){
    Route::get('/', 'report@getForm')->name('form.report');
    Route::post('/', 'report@store')->name('form.report.store');
    Route::get('/report', 'report@getReport')->name('report');;
});
