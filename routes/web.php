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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/excel', 'AbsenImport@index');
    Route::post('/excel', 'AbsenImport@store')->name('excel.store');
    Route::get('/', 'Report@getForm')->name('form.report');
    Route::post('/', 'Report@store')->name('form.report.store');
    Route::get('/report', 'Report@getReport')->name('report');
    Route::post('/report/generate', 'Report@getReportGenerate')->name('report.generate');
    Route::get('/report/list', 'Report@getReportList')->name('report.list');
    Route::get('report/delete/{tanggal}', 'Report@getReportDelete')->name('report.delete');
});
