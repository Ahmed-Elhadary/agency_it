<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace'  => 'API'],function () {

    Route::get('admins/{loggedIn}', 'AdminsService@admins')->name('api.admins');;
    Route::get('groups', 'GroupsService@groups')->name('api.groups');;
    Route::get('tasks/{loggedInId}', 'TasksService@tasks')->name('api.tasks');;
    Route::get('attachments/{taskId}', 'AttachmentsService@attachements')->name('api.attachements');;
});
