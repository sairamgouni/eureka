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
    if (\Auth::user())
        return view('landing');
    else
        return view('login');
});

// Auth::routes();

Route::post('webportal/login', 'Auth\LoginController@postWebLogin');
Route::post('portal/login', 'Auth\LoginController@postLogin');
Route::post('portal/isUserLoggedIn', 'Auth\LoginController@isUserLoggedIn');
Route::post('portal/logout', 'Auth\LoginController@logout');
Route::get('home', 'Auth\LoginController@setLocalStorage');
Route::get('portal/mytest', 'Auth\LoginController@myTestCode');

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
Route::post('challenges/comment/{comment_id}/owner-like', 'ChallengeController@toggleCommentOwnerLike');

Route::post('challenges/store-comment', 'ChallengeController@postComment');
Route::get('challenges/comments', 'ChallengeController@getComments');
Route::get('friends/getSuggestions/{total?}', 'ChallengeController@getFriendSuggestions');
Route::get('friends/getFriendsList/{total?}', 'ChallengeController@getFriends');
Route::post('friends/toggle-follow', 'ChallengeController@toggleFollow');


Route::post('user/update-profile', 'UsersController@updateProfile');
Route::get('user/get-profile/{id}', 'UsersController@getProfile');

Route::get('/activities/get-list/{id?}', 'UsersController@getActivities');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
