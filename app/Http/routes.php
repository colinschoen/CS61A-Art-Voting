<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ["as" => "index", "uses" => "IndexController@get_index"]);


//Admin Routes
    //GET
    Route::get('admin', ["as" => "admin", "uses" => "AdminController@get_admin"]);
    Route::get('admin/entries', ["as" => "adminentries", "uses" => "AdminController@get_admin"]);
    Route::get('admin/results', ["as" => "adminresults", "uses" => "AdminController@get_admin"]);
    //POST
    Route::post('admin/entries/new', ["as" => "adminresultnew", "uses" => "AdminController@post_entry_new"]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
