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
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('tracking', 'TrackingController@index')->name('tracking');
Route::post('tracking.show', 'TrackingController@show')->name('tracking.show');

Route::group(
    [
        'as'=>'admin.',
        'prefix' => 'admin',
        'namespace'=>'Admin',
        'middleware'=>['auth','admin']
    ], 
    function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        // user
        Route::get('user.create', 'UserController@create')->name('user.create');
        Route::get('user.index', 'UserController@index')->name('user.index');
        Route::get('user.edit.{id}', 'UserController@edit')->name('user.edit');
        Route::get('user.destroy.{id}', 'UserController@destroy')->name('user.destroy');
        Route::post('user.update.{id}', 'UserController@update')->name('user.update');
        
        // Wajib Pajak
        Route::get('wajib-pajak.create', 'WajibPajakController@create')->name('wajib-pajak.create');
        Route::post('wajib-pajak.store', 'WajibPajakController@store')->name('wajib-pajak.store');
        Route::get('wajib-pajak.index', 'WajibPajakController@index')->name('wajib-pajak.index');
        Route::post('wajib-pajak.update', 'WajibPajakController@update')->name('wajib-pajak.update');

        // profile
        Route::get('profile.edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile.update{id}', 'ProfileController@update')->name('profile.update');
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
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        // profile
        Route::get('profile.edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile.update{id}', 'ProfileController@update')->name('profile.update');

        // Wajib Pajak
        Route::get('wajib-pajak.create', 'WajibPajakController@create')->name('wajib-pajak.create');
        Route::post('wajib-pajak.store', 'WajibPajakController@store')->name('wajib-pajak.store');
        Route::get('wajib-pajak.index', 'WajibPajakController@index')->name('wajib-pajak.index');
        Route::post('wajib-pajak.update', 'WajibPajakController@update')->name('wajib-pajak.update');
       
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
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
       
        // profile
        Route::get('profile.edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile.update{id}', 'ProfileController@update')->name('profile.update');

        // Wajib Pajak
        Route::get('wajib-pajak.create', 'WajibPajakController@create')->name('wajib-pajak.create');
        Route::post('wajib-pajak.store', 'WajibPajakController@store')->name('wajib-pajak.store');
        Route::get('wajib-pajak.index', 'WajibPajakController@index')->name('wajib-pajak.index');
        Route::post('wajib-pajak.update', 'WajibPajakController@update')->name('wajib-pajak.update');
    }
);