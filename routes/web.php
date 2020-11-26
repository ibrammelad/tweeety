<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function(){
    Route::get('/tweets','tweetsController@index')->name('home');
    Route::post('/tweets','tweetsController@store');
    Route::post('/tweets/{tweet}/like','TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like','TweetLikesController@destroy');

    Route::post('/profiles/{user:username}/follow', 'FollowController@store');
    Route::get('/profiles/{user:username}/edit', 'profileController@edit');
    Route::patch('profiles/{user:username}', 'profileController@update');
    Route::get('/explore', 'ExploreController@index');

});
    Route::get('profiles/{user:username}', 'profileController@show')->name('profile');

Auth::routes();
