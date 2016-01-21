<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['uses' => 'PointsController@index']);

Route::get('members/filter', ['as' => 'members.filter', 'uses' => 'MembersController@filter']);
Route::get('members/search', ['as' => 'members.search', 'uses' => 'MembersController@search']);
Route::resource('members', 'MembersController');

Route::resource('events','EventsController', ['except' => 'show']);

Route::get('points/filter', ['as' => 'points.filter', 'uses' => 'PointsController@filter']);
Route::get('points/search', ['as' => 'points.search', 'uses' => 'PointsController@search']);
Route::get('points', ['as' => 'points.index', 'uses' => 'PointsController@index']);
Route::resource('members.points','PointsController', ['except' => 'index','edit','update','show']);

Route::get('tambay_points/filter', ['as' => 'tambay_points.filter', 'uses' => 'TambayPointsController@filter']);
Route::get('tambay_points/search', ['as' => 'tambay_points.search', 'uses' => 'TambayPointsController@search']);
Route::get('tambay_points', ['as' => 'tambay_points.index', 'uses' => 'TambayPointsController@index']);
Route::resource('members.tambay_points','TambayPointsController', ['except' => 'index','edit','update']);
});
