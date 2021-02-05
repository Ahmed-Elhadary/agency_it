<?php
/*
|--------------------------------------------------------------------------
| CRUD Login
|--------------------------------------------------------------------------
*/
Route::group(['prefix' =>  LaravelLocalization::setLocale().'/admin','middleware' =>'admin:admin','namespace'  => 'Admin'],function (){
    /*----------------------------------------------------------------------
                            Index / Login CRUD
    //---------------------------------------------------------------------*/
    Route::get('/index', 'AdminsController@home')->name('admin.home');
    Route::post('logout/admin', 'AdminsController@logout')->name('admin.logout');
    /*----------------------------------------------------------------------
                                Admin CRUD
    //----------------------------------------------------------------------*/
    Route::resource('admins', 'AdminsController', ['except' => ['create','show']]);
    Route::resource('groups', 'GroupsController', ['except' => ['create','show']]);
    Route::resource('tasks', 'TasksController', ['except' => ['create','show']]);
    Route::resource('attachments', 'AttachmentsController', ['except' => ['create','show']]);

    Route::get('permissions/{groupId}', 'PermissionsController@create')->name('permissions.create');
    Route::post('permissions/', 'PermissionsController@store')->name('permissions.store');
    Route::post('tasks-status/{id}', 'TasksController@status')->name('tasks.status');
    Route::post('tasks-type', 'TasksController@type')->name('tasks.type');
    Route::post('tasks-priority', 'TasksController@priority')->name('tasks.priority');
    Route::get('filter', 'TasksController@filter')->name('tasks.filter');
    Route::post('tasks-filter', 'TasksController@post')->name('tasks.filter.post');

});
/*
|--------------------------------------------------------------------------
| Admins Login
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin','namespace'   => 'Admin'],function () {
    Route::get('login', 'AdminsController@get')->name('admin.get');
    Route::post('login', 'AdminsController@post')->name('admin.post');
});
