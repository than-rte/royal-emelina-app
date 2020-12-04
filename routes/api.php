<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function() {

    //Venues
    Route::group(['prefix' => 'venues'], function() {
        Route::get('/', 'Api\VenuesController@index');
        Route::post('/', 'Api\VenuesController@store');
        Route::get('/{venue}', 'Api\VenuesController@show');
        Route::patch('/{venue}', 'Api\VenuesController@update');
        Route::delete('/{venue}', 'Api\VenuesController@destroy');
    });

    //Venue Images
    Route::group(['prefix' => 'venue-image'], function() {
        Route::get('/', 'Api\VenueImagesController@index');
        Route::post('/', 'Api\VenueImagesController@store');
    });
    
});

