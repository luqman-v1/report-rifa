<?php

use App\Http\Controllers\QuizImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
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

Route::get('/aaa', function () {
    $absenImport = new QuizImport;
    Excel::import($absenImport, public_path('Test_1.xlsx'));
    $rows    = collect($absenImport->data_rows)->groupBy('nopek')->take(10)->all();
    $headers = $absenImport->data_header;
    return view('excel.quiz', compact('rows', 'headers'));
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/excel/quiz', 'QuizImport@index');
    Route::post('/excel/quiz/store', 'QuizImport@store')->name('excel.quiz.store');
    Route::get('/excel', 'AbsenImport@index');
    Route::post('/excel', 'AbsenImport@store')->name('excel.store');
    Route::get('/ckh', 'Report@getForm')->name('form.report');
    Route::post('/ckh', 'Report@store')->name('form.report.store');
    Route::get('/report', 'Report@getReport')->name('report');
    Route::post('/report/generate', 'Report@getReportGenerate')->name('report.generate');
    Route::get('/report/list', 'Report@getReportList')->name('report.list');
    Route::get('report/delete/{tanggal}', 'Report@getReportDelete')->name('report.delete');
});
