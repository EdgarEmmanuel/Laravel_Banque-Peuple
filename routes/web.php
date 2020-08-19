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

use App\Http\Middleware\preventBackButton; 

// ============= All get request ===================
Route::get('/', 'pageController@getLogin');

//Route::middleware('cache.headers:public,no-cache,no-store,must-revalidate');

Route::get('/admin/cni','pageController@getPageCni');

Route::get('/client/clientSalarie','pageController@getPageInsertClientSalarie');

Route::get('/client/clientMoral','pageController@getPageInsertClientMoral');

Route::get('/client/clientIndependant','pageController@getPageInsertClientIndependant');

//deconnexion for the responsable compte
Route::get('/logout','userController@logOutRespo');

//the route vers page insert compte
Route::get('/insert/compte','pageController@getPagInsertCompte');

Route::get('/display/clients','pageController@getPageDisplayClient');

Route::get("/display/moraux","pageController@getPageDisplayMoral");

Route::get("/display/salaries","pageController@getPageDisplaySalarie");





// post request
Route::post("/verify_user", "userController@store");

//for insert client salarie
Route::post('/insert/Salarie',"clients_controller@insertClientSalarie");

//for insert client independant
Route::post('/insert/independant','clients_controller@InsertClientIndependant');

//insert client Moral
Route::post('/insert/clientMoral','clients_controller@insertClientMoral');

Route::post('/checkCni','userController@checkCNI');


//route for the post from the insertCompte page 
Route::post('/compte','compte_controller@insertCompte');