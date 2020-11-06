<?php

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

Auth::routes();
Route::get('/system', 'Auth\LoginController@showLoginForm');

// Система
Route::group([
    'prefix' => 'system',
    'namespace' => 'System',
], function () {
    Route::resource('/quests', 'QuestController')
        ->names('system.quests')
        ->except([
            'show',
            'edit',
            'update'
        ]);

    Route::resource('/bookings', 'BookingController')
        ->names('system.bookings')
        ->only([
            'index',
            'update',
        ]);
});

// Сайт
Route::group([
    'namespace' => 'Site',
], function () {

    Route::get('/', 'QuestController@index')
    ->name('site.index');

    Route::resource('/quests', 'QuestController')
        ->names('site.quests')
        ->only([
            'index',
            'show',
        ]);

    Route::resource('/bookings', 'BookingController')
        ->names('site.bookings')
        ->only([
            'store',
        ]);
});
