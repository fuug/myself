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
    Route::group(['namespace' => 'Performer', 'prefix' => 'performers'], function () {
        Route::get('/', 'IndexController')->name('performers.list');
        Route::post('/', 'IndexController@filtered')->name('performers.list.filters');
        Route::get('/urgency', 'UrgencyController')->name('performers.urgency');
        Route::get('/{performer}', 'ShowController')->name('performer.about');
        Route::get('/{currentPerformer}/checkout', 'CheckoutController')->name('performer.checkout');
        Route::post('/{currentPerformer}/checkout/payment', ['middleware' => 'auth'], 'CheckoutController@payment')->name('performer.checkout.payment');
        Route::post('/{customer}/checkout/payment/{subscription}', 'CheckoutController@done')->name('performer.checkout.done');
        Route::group(['namespace' => 'Review', 'prefix' => 'reviews'], function () {
            Route::post('/{performer}/store-review', 'StoreController')->name('review.store');
        });

    });
});

Route::group(['namespace' => 'User', 'prefix' => 'profile', 'middleware' => ['auth', 'verified']], function () {
    Route::get('{user}', 'IndexController')->name('user.profile.index');
    Route::get('{user}/video-room', 'IndexController@videoRoom')->name('user.profile.videoroom');
    Route::get('{user}/subscriptions', 'SubscriptionController')->name('user.profile.subscription');
    Route::get('{user}/subscriptions/{subscription}', 'SubscriptionController@sessions')->name('user.profile.sessionUpdate');
    Route::post('{customer}/confirm', 'SubscriptionController@confirmSession')->name('user.profile.confirmSession');
    Route::post('{user}/event', 'IndexController@storeSession')->name('user.profile.addSession');
    Route::delete('{user}/event/delete', 'IndexController@deleteEvent')->name('user.profile.deleteSession');
});

Route::group(['middleware' => 'guest'], function () {
    Route::group(['namespace' => 'Facebook', 'prefix' => 'facebook'], function () {
        Route::get('/auth', 'SocialController@index')->name('fb.auth');
        Route::get('/auth/callback', 'SocialController@callback');
    });

    Route::group(['namespace' => 'Telegram', 'prefix' => 'telegram'], function () {
        Route::get('/auth', 'SocialController@index')->name('tg.auth');
        Route::get('/auth/callback', 'SocialController@callback');
        Route::post('/auth/email', 'SocialController@continueWithEmail')->name('tg.email');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
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
        Route::post('/{user}/subscription-add', 'SubscriptionAddController')->name('admin.user.subscription.add');
        Route::patch('/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/edit-performer', 'EditController@performerEdit')->name('admin.performer.edit');
        Route::delete('/delete/{user}', 'DeleteController')->name('admin.user.delete');
        Route::delete('/delete/thumb/{user}', 'DeleteThumbController')->name('admin.user.deleteThumb');
    });

    Route::group(['namespace' => 'Statistic', 'prefix' => 'statistic'], function () {
        Route::get('/', 'IndexController')->name('admin.statistic.index');
        Route::get('/format', 'IndexController@formatByDate')->name('admin.statistic.format');
    });

    Route::group(['namespace' => 'Review', 'prefix' => 'review'], function () {
        Route::get('/', 'IndexController')->name('admin.review.index');
        Route::get('/{review}', 'ShowController')->name('admin.review.show');
        Route::patch('/{review}/edit', 'EditController')->name('admin.review.edit');
    });

});


Auth::routes(['verify' => true]);
