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

// get request 

Route::get('/', 'pageController@getLogin');

Route::get('/admin/cni','pageController@getPageCni');

Route::get('/client/clientSalarie','pageController@getPageInsertClientSalarie');

Route::get('/client/clientMoral','pageController@getPageInsertClientMoral');

Route::get('/client/clientIndependant','pageController@getPageInsertClientIndependant');


// post request

Route::post("/verify_user", "userController@store");
