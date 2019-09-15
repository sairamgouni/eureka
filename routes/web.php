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
	if(\Auth::user())
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

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


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


//Route::get('challenges/getlist', 'ChallengeController@getList');
Route::get('challenges/getlist', 'ChallengeController@getList');
Route::get('challenges/getDetails', 'ChallengeController@show');
Route::post('challenges/toggle-like', 'ChallengeController@toggleLike');
Route::post('challenges/comment/{comment_id}/owner-like', 'ChallengeController@toggleCommentOwnerLike');
Route::post('challenges/comment/{comment_id}/owner-tick', 'ChallengeController@toggleCommentOwnertick');
Route::post('challenges/comment/{comment_id}/owner-win', 'ChallengeController@toggleCommentOwnerwin');

Route::get('/posts','ChallengeController@gechallenge');
//    $user = \Auth::user();
//    $post_json = DB::table('challenges')->orderBy('challenges.created_at','desc')->take(4)->get();
//return $post_json;



Route::post('challenges/store-comment', 'ChallengeController@postComment');
Route::get('challenges/comments', 'ChallengeController@getComments');
Route::get('friends/getSuggestions/{total?}', 'ChallengeController@getFriendSuggestions');
Route::get('challenges/getChallenges/{total?}', 'ChallengeController@getChallenges');
Route::get('friends/getFriendsList/{total?}', 'ChallengeController@getFriends');
Route::post('friends/toggle-follow', 'ChallengeController@toggleFollow');
Route::get('user/followers-list', 'UsersController@getFollowers');


Route::post('user/update-profile', 'UsersController@updateProfile');
Route::get('user/get-profile/{id}', 'UsersController@getProfile');

Route::get('user/top-contributors', 'UsersController@topContributors');

Route::post('user/top-notifications', 'UsersController@topNotifications');

Route::get('/activities/get-list/{id?}', 'UsersController@getActivities');


Route::post('api/changePassword', 'Auth\passwordresetcontroller@changePassword');

Route::get('search/{searchParameter}','UsersController@searchUsers');

Route::get('api/users', 'UsersController@getusers');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

