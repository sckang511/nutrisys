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
    return view('welcome');
});

Auth::routes();

// HOME
Route::get('/home', 'Dashboard\HomeController@getRecommendation')->name('home');

// FOOD
Route::get('/food', 'Food\LogController@index')->name('log');
Route::get('/food/log', 'Food\LogController@index')->name('log');
Route::get('/food/log/show/', 'Food\LogController@index');
Route::get('/food/log/show/{date}', 'Food\LogController@show');
Route::get('/food/log/delete/', 'Food\LogController@index');
Route::get('/food/log/delete/{id}', 'Food\LogController@delete');
Route::get('/food/search', 'Food\SearchController@index')->name('search');
Route::get('/food/recipe', 'Food\RecipeController@index')->name('recipe');
Route::post('/food/search','Food\SearchController@store')->name('storeFood');

// GOAL
Route::get('/goal', 'Goal\GoalController@index')->name('goal');
//Route::get('/goal/progress', 'Goal\ProgressController@getChartData')->name('chart');
Route::get('/goal/progress', 'Goal\ProgressController@fetchData')->name('progress');
Route::post('/goal','Goal\GoalController@store')->name('store');
Route::put('/updateRecord/{id}','Goal\ProgressController@update')->name('update');
Route::delete('/goal/progress/deleteRecord/{id}','Goal\ProgressController@delete')->name('delete');

// PROFILE
Route::get('/profile', 'Profile\ProfileController@getProfile')->name('getprofile');
Route::get('/profile/profile', 'Profile\ProfileController@index')->name('profile');
Route::get('/profile/settings', 'Profile\SettingsController@index')->name('settings');
Route::post('/profile/profile', 'Profile\ProfileController@store')->name('profile');