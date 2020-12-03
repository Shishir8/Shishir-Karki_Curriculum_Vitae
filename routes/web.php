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

Route::get('/','HomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('sweetalert/{type}','SweetalertController@notification');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('aboutme','AboutmeController');
    Route::resource('skill','SkillController');
    Route::resource('service','ServiceController');
    Route::resource('contact','ContactController');
    
});


