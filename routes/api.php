<?php

use Illuminate\Support\Facades\Route;

Route::namespace('API\V1')->group(function () {
    Route::prefix('v1')->group(function () {
        /** Authentication */
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');

        /** Transactions */
        Route::post('transactions/{donation}', 'TransactionController@store');
        // Route::post('transactions/{transaction}', 'TransactionController@store');

        Route::middleware('auth:api')->group(function () {
            /** Middleware to handle role admin */
            Route::middleware('admin')->group(function () {
                Route::post('donations', 'DonationController@store');
                Route::put('donations/{donation}', 'DonationController@update');
                Route::delete('donations/{donation}', 'DonationController@destroy');

                Route::post('events', 'EventController@store');
                Route::put('events/{event}', 'EventController@update');
                Route::delete('events/{id}', 'EventController@destroy');

                Route::delete('users/{user}', 'UserController@destroy');
            });

            Route::get('users', 'UserController@index');

            Route::get('donations', 'DonationController@index');
            Route::get('donations/{id}', 'DonationController@show');
            Route::get('events', 'EventController@index');
            Route::get('events/{id}', 'EventController@show');

            Route::post('logout', 'AuthController@logout');
        });
    });
});
