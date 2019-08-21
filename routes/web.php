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

Route::get('/', function () {
	// if(\Auth::user())
    	return view('landing');
    // else
    // 	return view('login');
});

// Auth::routes();

Route::post('portal/login', 'Auth\LoginController@postLogin');
Route::post('portal/logout', 'Auth\LoginController@logout');

// Route::post('/login', function(){
// 	if(!\Auth::user())
// 		return view('login');
// 	else
// 		return view('landing');
// })->name('login');



//Route::view('landing', '/');

// Auth::routes();

Route::get('categories/getlist', 'CategoriesController@getList');
Route::post('challenges/create', 'ChallengeController@saveRecord');


Route::get('challenges/getlist', 'ChallengeController@getList');
Route::get('challenges/getDetails', 'ChallengeController@show');
Route::post('challenges/toggle-like', 'ChallengeController@toggleLike');

Route::post('challenges/store-comment', 'ChallengeController@postComment');
Route::get('challenges/comments', 'ChallengeController@getComments');
Route::get('friends/getlist', 'ChallengeController@getFriends');
Route::post('friends/toggle-follow', 'ChallengeController@toggleFollow');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
