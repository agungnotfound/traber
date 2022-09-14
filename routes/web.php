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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    [
        'as'=>'admin.',
        'prefix' => 'admin',
        'namespace'=>'Admin',
        // 'middleware'=>['auth','admin']
    ], 
    function () {
        Route::resource('wajib-pajak', 'WajibPajakController');
        Route::resource('dashboard', 'DashboardController');
        Route::resource('user', 'UserController');
    }
);

Route::group(
    [
        'as'=>'pegawai.',
        'prefix' => 'pegawai',
        'namespace'=>'Pegawai',
        'middleware'=>['auth','pegawai']
    ],
    function (){
       
    }
);

Route::group(
    [
        'as'=>'kupt.',
        'prefix' => 'kupt',
        'namespace'=>'Kupt',
        'middleware'=>['auth','kupt']
    ],
    function (){
       
    }
);