<?php

use Illuminate\Support\Facades\Route;

//Web
Route::group(['namespace' => 'Web'],function () {
    //Pages
    Route::get('/', 'PagesController@index')->name('home');

    //Search Avaiable Venues
    Route::get('/enquiries/search', 'EnquiriesController@searchAvailableVenues');

    //Venues
    Route::group(['prefix' => 'venues'], function() {
        Route::get('/', 'VenuesController@index');
        Route::get('{id}', 'VenuesController@show');
    });

    //Events
    Route::group(['prefix' => 'events'], function() {
        Route::get('/', 'EventsController@index');
        Route::get('{id}', 'EventsController@show');
    });

    //Menu
    Route::group(['prefix' => 'foodsets'], function() {
        Route::get('/', 'FoodsetsController@index');
        Route::get('{name}', 'FoodsetsController@show');
        Route::get('{name}/{id}', 'FoodsetsController@showSubset');
    });

    //About
    Route::get('/about', 'PagesController@about');

    //Contacts
    Route::get('/contacts', 'PagesController@contacts');

    Route::get('/login/{secret}', 'ToAdminController@login');

    //Admin Login
    Route::group(['middleware' => ['checkToken']], function () {
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/login', 'LoginController@store');
    });

    Route::get('/dashboard/logout', 'UsersController@logout');
});


//Admin Dashboard
Route::group([ 'middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('{path?}',  function() {
        return view('admin.dashboard.index');
    })->where('path', '[\/\w\.-]*')->name('dashboard');
});


// //Fallback
// Route::fallback(function() {
//     return view('fallback');
// });