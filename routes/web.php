<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades;

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
auth('admin')->loginUsingId(1);
Auth::routes();
Route::group(['namespace' => 'Front'],function (){
   Route::get('/','IndexController@index')->name('index');
});
