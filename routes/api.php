<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jobs_detail/{alias}', 'Api\JobsController@jobsDetail');
Route::get('/jobs_list/{alias?}', 'Api\JobsController@jobsList');
Route::get('/jobs_tags/{tagAlias}', 'Api\JobsController@jobsTags');

//store contacts
Route::post('/contact/', 'Api\ContactController@store');
//store job apply
Route::post('/jobs-apply/', 'Api\JobsController@jobsApply');
// get about us company
Route::get('/about-us/', 'Api\AboutController@aboutUs');

//cultural
Route::get('/cultural/{id}/info', 'Api\CulturalController@culturalInfo');
Route::get('/cultural/{id}/detail', 'Api\CulturalController@culturalDetail');
