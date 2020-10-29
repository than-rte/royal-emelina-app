<?php

use Illuminate\Support\Facades\Route;

//Web
Route::group(['namespace' => 'Web'],function () {
    //Pages
    Route::get('/', 'PagesController@index');

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
});


//To Admin Page
Route::get('/admin-secret={secret}', function($secret) {
    if ($secret == config('rylapp.admin_secret')) {
        return redirect('admin/login');
    } else {
        return view('fallback');
    }
});

//Admin Login
Route::get('/admin/login', function() {
    return view('admin.login.index');
})->name('login');

//Admin Dashboard
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('{path?}',  function() {
        return view('admin.dashboard.index');
    })->where('path', '[\/\w\.-]*');
});


//Fallback
Route::fallback(function() {
    return view('fallback');
});