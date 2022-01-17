<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('facebook/auth', 'SocialController@index')->name('fb.auth');
    Route::get('facebook/auth/callback', 'SocialController@callback');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.index');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::post('/create', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::patch('/rename', 'RenameController')->name('admin.category.rename');
        Route::delete('/delete/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::post('/create', 'CreateController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::patch('/edit', 'EditController')->name('admin.user.edit');
        Route::delete('/delete/{user}', 'DeleteController')->name('admin.user.delete');
        Route::delete('/delete/thumb/{user}', 'DeleteThumbController')->name('admin.user.deleteThumb');
    });

});


Auth::routes();
