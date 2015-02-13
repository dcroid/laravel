<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/login', function () {
    return View::make('Login.Login');
});

Route::post('/login', 'UserController@enter');



Route::get('/logout', function () {
    return View::make('Login.Login');
});

Route::get('/', function () {

    if(Auth::check())
        return Redirect::to('/url');
    else
        return Redirect::to('/login');

});


/** Users */
Route::group(['prefix'=>'/user'], function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@edit');
    Route::post('/{id}', 'UserController@update');
    Route::get('/delete/{id}', 'UserController@destroy');
});


/** Urls */
Route::group(['prefix'=>'/url'], function(){
    Route::get('/', 'UrlController@index');
    Route::get('/{id}', 'UrlController@show');
    Route::get('/delete/{id}', 'UrlController@destroy');
    Route::get('/edit/{id}', 'UrlController@edit');
    Route::post('/edit/{id}', 'UrlController@update');
});


/** Adverts */
Route::group(['prefix'=>'/advert'], function(){
    Route::get('/{id}', 'AdvertController@show');
    Route::get('/delete/{id}','AdvertController@destroy');
});


