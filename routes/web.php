<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'Web\SiteController@index')->name('index');


Route::get('/test', 'Web\SiteController@test')->name('test');
Route::get('/testuser', 'Web\SiteController@testuser')->name('testuser');
Route::get('/db-test2', function(){
    
    return dd(DB::connection()->getPdo());
});


Route::get('/db-test', 'Web\SiteController@getall');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
