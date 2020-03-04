<?php


use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::name('user.')
    ->prefix('user')
    ->group(function () {

        Route::get('/profile', 'UserController@profile')->name('profile');
        Route::put('/password', 'UserController@password')->name('password');

        Route::prefix('password/{user}')
            ->name('password.')
            ->group(function () {
                Route::get('/', 'UserController@editPassword')->name('edit');
                Route::put('/', 'UserController@updatePassword')->name('update');
        });

});

Route::resource('user', 'UserController')->except('show');
Route::resource('category', 'PostCategoryController')->except('show');
Route::resource('post', 'PostController');

