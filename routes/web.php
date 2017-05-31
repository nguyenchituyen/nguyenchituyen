<?php

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

Route::get('/', 'AdminController@index');

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/home', 'AdminController@index');
Auth::routes();
Route::group(['middleware' => 'web'], function () {

    //user
    Route::get('user/search', ['as' => 'user.search','uses' => 'UserController@search']);
    Route::post('/user/store', [
        'uses' => 'UserController@store',
        'as' => 'user.store',
        'middleware' => 'roles',
        'roles' => ['action' => 'store', 'controller' => 'User']
    ]);
    Route::get('/user/create', [
        'uses' => 'UserController@create',
        'as' => 'user.create',
        'middleware' => 'roles',
        'roles' => ['action' => 'create', 'controller' => 'User']
    ]);
    Route::get('/user', [
        'uses' => 'UserController@index',
        'as' => 'user.index',
        'middleware' => 'roles',
        'roles' => ['action' => 'index', 'controller' => 'User']
    ]);
    Route::get('/user/{id}', [
        'uses' => 'UserController@show',
        'as' => 'user.show',
        'middleware' => 'roles',
        'roles' => ['action' => 'show', 'controller' => 'User']
    ]);
    Route::get('/user/{id}/edit', [
        'uses' => 'UserController@edit',
        'as' => 'user.edit',
        'middleware' => 'roles',
        'roles' => ['action' => 'edit', 'controller' => 'User']
    ]);
    Route::patch('/user/{id}/update', [
        'uses' => 'UserController@update',
        'as' => 'user.update',
        'middleware' => 'roles',
        'roles' => ['action' => 'update', 'controller' => 'User']
    ]);
    Route::delete('/user/{id}/destroy', [
        'uses' => 'UserController@destroy',
        'as' => 'user.destroy',
        'middleware' => 'roles',
        'roles' => ['action' => 'destroy', 'controller' => 'User']
    ]);

    //role
    Route::get('role/search', [
        'uses' => 'RoleController@search',
        'as' => 'role.search',
        'middleware' => 'roles',
        'roles' => ['action' => 'search', 'controller' => 'Role']
    ]);
    Route::get('/role', [
        'uses' => 'RoleController@index',
        'as' => 'role.index',
        'middleware' => 'roles',
        'roles' => ['action' => 'index', 'controller' => 'Role']
    ]);
    Route::get('/role/create', [
        'uses' => 'RoleController@create',
        'as' => 'role.create',
        'middleware' => 'roles',
        'roles' => ['action' => 'create', 'controller' => 'Role']
    ]);
    Route::get('/role/{id}', [
        'uses' => 'RoleController@show',
        'as' => 'role.show',
        'middleware' => 'roles',
        'roles' => ['action' => 'show', 'controller' => 'Role']
    ]);
    Route::get('/role/{id}/edit', [
        'uses' => 'RoleController@edit',
        'as' => 'role.edit',
        'middleware' => 'roles',
        'roles' => ['action' => 'edit', 'controller' => 'Role']
    ]);
    Route::patch('/role/{id}/update', [
        'uses' => 'RoleController@update',
        'as' => 'role.update',
        'middleware' => 'roles',
        'roles' => ['action' => 'update', 'controller' => 'Role']
    ]);
    Route::post('/role/store', [
        'uses' => 'RoleController@store',
        'as' => 'role.store',
        'middleware' => 'roles',
        'roles' => ['action' => 'store', 'controller' => 'Role']
    ]);
    Route::delete('/role/{id}/destroy', [
        'uses' => 'RoleController@destroy',
        'as' => 'role.destroy',
        'middleware' => 'roles',
        'roles' => ['action' => 'destroy', 'controller' => 'Role']
    ]);

    //ACL
    Route::get('/acl', [
        'uses' => 'ACL_Controller@index',
        'as' => 'acl.index',
        'middleware' => 'roles',
        'roles' => ['action' => 'index', 'controller' => 'ACL']
    ]);
    Route::get('/acl/{id}', [
        'uses' => 'ACL_Controller@show',
        'as' => 'acl.show',
        'middleware' => 'roles',
        'roles' => ['action' => 'show', 'controller' => 'ACL']
    ]);
    Route::get('/acl/create', [
        'uses' => 'ACL_Controller@create',
        'as' => 'acl.create',
        'middleware' => 'roles',
        'roles' => ['action' => 'create', 'controller' => 'ACL']
    ]);
    Route::get('/acl/{id}/edit', [
        'uses' => 'ACL_Controller@edit',
        'as' => 'acl.edit',
        'middleware' => 'roles',
        'roles' => ['action' => 'edit', 'controller' => 'ACL']
    ]);
    Route::post('/acl/store', [
        'uses' => 'ACL_Controller@store',
        'as' => 'acl.store',
        'middleware' => 'roles',
        'roles' => ['action' => 'store', 'controller' => 'ACL']
    ]);
    Route::get('/acl/{id}/update', [
        'uses' => 'ACL_Controller@update',
        'as' => 'acl.update',
        'middleware' => 'roles',
        'roles' => ['action' => 'update', 'controller' => 'ACL']
    ]);
    Route::delete('/acl/{id}/destroy', [
        'uses' => 'ACL_Controller@destroy',
        'as' => 'acl.destroy',
        'middleware' => 'roles',
        'roles' => ['action' => 'destroy', 'controller' => 'ACL']
    ]);
    Route::get('/permission', [
        'uses' => 'ACL_Controller@checkPermission',
        'as' => 'acl.permission',
    ]);
    //contact
    Route::get('/contact', [
        'uses' => 'ContactController@index',
        'as' => 'contact.index',
        'middleware' => 'roles',
        'roles' => ['action' => 'index', 'controller' => 'Contact']
    ]);

    Route::get('/contact/{id}', [
        'uses' => 'ContactController@show',
        'as' => 'contact.show',
        'middleware' => 'roles',
        'roles' => ['action' => 'show', 'controller' => 'Contact']
    ]);

    //job
    Route::get('/job/apply', ['as' =>'job.apply','uses' => 'JobsController@jobsApply']);
    Route::get('/job/apply_search', ['as' => 'job.apply_search', 'uses' => 'JobsController@searchApplyForJob']);
    Route::get('/job/show_apply/{id}', ['as' => 'job.show_apply', 'uses' => 'JobsController@showJobApply']);
    Route::get('/apply/delete/{id}', ['as' => 'apply.delete', 'uses' => 'JobsController@deleteApply']);
    Route::resource('job', 'JobsController');
    Route::get('/multi_checkboxes', 'JobsController@multiCheckboxes');
    Route::get('/job/delete/{id}', ['as' => 'job.delete', 'uses' => 'JobsController@destroy']);
    //tag
    Route::get('/tag/create', [
        'uses' => 'JobsController@createTag',
        'as' => 'job.createTag',
        'jobs' => ['action' => 'createTag', 'controller' => 'Jobs']
    ]);

    Route::post('/tag/storeTag', [
        'uses' => 'JobsController@storeTag',
        'as' => 'job.storeTag',
        'roles' => ['action' => 'storeTag', 'controller' => 'Jobs']
    ]);

    Route::get('/tag/index', [
        'uses' => 'JobsController@indexTag',
        'as' => 'job.indexTag',
        'jobs' => ['action' => 'indexTag', 'controller' => 'Jobs']
    ]);

    Route::get('/tag/{id}/edit', [
        'uses' => 'JobsController@editTag',
        'as' => 'job.editTag',
        'jobs' => ['action' => 'editTag', 'controller' => 'Jobs']
    ]);

    Route::patch('/tag/{id}/update', [
        'uses' => 'JobsController@updateTag',
        'as' => 'job.updateTag',
        'jobs' => ['action' => 'updateTag', 'controller' => 'Jobs']
    ]);

    Route::get('/tag/{id}/destroy', [
        'uses' => 'JobsController@destroyTag',
        'as' => 'job.destroyTag',
        'jobs' => ['action' => 'destroyTag', 'controller' => 'Jobs']
    ]);
    //cultural
    Route::resource('cultural', 'CulturalController');
    Route::get('/cultural/{id}/destroy', [
        'uses' => 'CulturalController@destroy',
        'as' => 'cultural.destroy',
        'cultural' => ['action' => 'destroy', 'controller' => 'Cultural']
    ]);
    //resource
    Route::get('resource/search', ['as' => 'resource.search', 'uses' => 'ResourceController@search']);
    Route::resource('resource', 'ResourceController');
    Route::get('/resource/{id}/destroy', [
        'uses' => 'ResourceController@destroy',
        'as' => 'resource.destroy',
        'roles' => ['action' => 'destroy', 'controller' => 'Resource']
    ]);
});
Route::get('contact/search', ['as' => 'contact.search', 'uses' => 'ContactController@search']);
Route::resource('contact', 'ContactController');
Route::resource('about', 'AboutController');