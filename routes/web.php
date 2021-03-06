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

Route::get('password/forgot', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.submit');


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
Route::get('challenges/getlists', 'ChallengeController@getLists');
Route::get('challenges/getDetails', 'ChallengeController@show');
Route::post('challenges/update/{id}', 'ChallengeController@updateChallenge');
Route::post('challenges/delete/{id}', 'ChallengeController@deleteChallenge');
Route::post('challenges/toggle-like', 'ChallengeController@toggleLike');
Route::post('challenges/comment/{comment_id}/owner-like', 'ChallengeController@toggleCommentOwnerLike');
Route::post('challenges/comment/{comment_id}/owner-tick', 'ChallengeController@toggleCommentOwnertick');
Route::post('challenges/comment/{comment_id}/owner-win', 'ChallengeController@toggleCommentOwnerwin');
Route::delete('challenges/comment/{comment}', 'ChallengeController@deleteComment');


Route::get('/posts','ChallengeController@gechallenge');
//    $user = \Auth::user();
//    $post_json = DB::table('challenges')->orderBy('challenges.created_at','desc')->take(4)->get();
//return $post_json;


Route::patch('challenges/update-comment/{comment}', 'ChallengeController@updateComment');
Route::post('challenges/store-comment', 'ChallengeController@postComment');
Route::get('challenges/comments', 'ChallengeController@getComments');
Route::get('friends/getSuggestions/{total?}', 'ChallengeController@getFriendSuggestions');
Route::get('challenges/getChallenges/{total?}', 'ChallengeController@getChallenges');
Route::get('friends/getFriendsList/{total?}', 'ChallengeController@getFriends');
Route::post('friends/toggle-follow', 'ChallengeController@toggleFollow');
Route::get('user/followers-list', 'UsersController@getFollowers');
Route::get('users/activities', 'UsersController@getUserActivities');
Route::get('users-list/{country}', 'UsersController@getUsersByCountry');


Route::post('user/update-profile', 'UsersController@updateProfile');
Route::get('user/get-profile/{id}', 'UsersController@getProfile');

Route::get('user/top-contributors', 'UsersController@topContributors');

Route::get('user/all-notifications', 'UsersController@allNotifications');
Route::post('user/top-notifications', 'UsersController@topNotifications');
Route::post('user/read-top-notifications', 'UsersController@readTopNotifications');
Route::get('userssearch', 'UsersController@search');

Route::get('/activities/get-list/{id?}', 'UsersController@getActivities');


Route::post('api/changePassword', 'Auth\passwordresetcontroller@changePassword');

Route::get('search/{searchParameter}','UsersController@searchUsers');

Route::get('api/users', 'UsersController@getusers');
Route::post('search-user', 'UsersController@getusers');
Route::get('challenge/search', 'ChallengeController@search');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
//    die('herer');

    Route::get('/login', 'Auth\LoginadminController@showLoginForm')->name('login');
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::post('/admin/login', 'Auth\LoginController@login')->name('admin.login');;
    Route::post ( '/login', 'Auth\LoginadminController@login' )->name('admin.login');
    Route::post ( '/logout', 'Auth\LoginadminController@logout' )->name('logout');;


    // Auth::routes();
//    Route::get('/home', 'CategoriesController@index')->name('category_list');
    Route::get('/categories', 'CategoriesController@index')->name('category_list');
    Route::get('/categories/add', 'CategoriesController@add')->name('categories_add');
    Route::post('/categories/store', 'CategoriesController@store')->name('categories_store');
    Route::get('/categories/edit/{slug}', 'CategoriesController@edit')->name('categories.edit');;
    Route::patch('/categories/edit/{slug}', 'CategoriesController@update')->name('categories_update');
    Route::post('/categories/delete', 'CategoriesController@destroy')->name('categories_delete');
    Route::get('/categories/data', 'CategoriesController@data')->name('categories_data');

// USER ROUTES

    Route::get('/users','UsersController@index')->name('users_list');
    Route::get('/users/add','UsersController@add')->name('users_add');
    Route::post('/users/store', 'UsersController@store')->name('users_store');
// Route::post('/users/add','UsersController@store')->name('users_store');
    Route::get('/users/edit/{slug}','UsersController@edit')->name('users_edit');;
    Route::patch('/users/edit/{slug}','UsersController@update')->name('users_update');
    Route::post('/users/delete', 'UsersController@destroy')->name('users_delete');
    Route::get('/users/data', 'UsersController@data')->name('users_data');


//CHANLENGES ROUTES

    Route::get('/home', 'ChallengeController@index')->name('challenge_list');
    Route::get('/challenges', 'ChallengeController@index')->name('challenge_list');
    Route::get('/challenges/add', 'ChallengeController@add')->name('challenges_add');
    Route::post('/challenges/store', 'ChallengeController@store')->name('challenges_store');
    Route::get('/challenges/edit/{slug}', 'ChallengeController@edit')->name('challenges_edit');
    Route::patch('/challenges/edit/{slug}', 'ChallengeController@update')->name('challenge_update');
    Route::post('/challenges/delete', 'ChallengeController@destroy')->name('challenge_delete');
    Route::get('/challenges/data', 'ChallengeController@data')->name('challenge_data');
// Route::get('/edit/ticket/{id}','TicketController@edit');
// Route::post('/edit/ticket/{id}','TicketController@update');

    Route::get('/campaigns', 'CampaignController@index')->name('campaign_list');
//    Route::get('/campaigns/getlist', 'CampaignController@getcampaign')->name('campaign_get');
    Route::get('/campaigns/add', 'CampaignController@add')->name('campaign_add');
    Route::post('/campaigns/store', 'CampaignController@store')->name('campaign_store');
// Route::post('/campaigns/add', 'CampaignController@store')->name('category_store');;
    Route::get('/campaigns/edit/{slug}', 'CampaignController@edit')->name('campaign_edit');;
    Route::patch('/campaigns/edit/{slug}', 'CampaignController@update')->name('campaign_update');
    Route::post('/campaigns/delete', 'CampaignController@destroy')->name('campaign_delete');;
    Route::get('/campaigns/data', 'CampaignController@data')->name('campaign_data');
});

Route::get('categories/getlists', 'CategoriesController@select2LoadMore');

