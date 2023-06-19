<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

// disables register
// Auth::routes(['register' => false]);

// // redirect requests to register to login
// Route::get('/register', function () {
//   return view('auth.login')->with('error', 'Registration is not possible.');
// });

// Route::get('/about', function () {
//   return view('about');
// });

// Route::get('/settings', 'SettingsController@index')->middleware('auth');
// Route::get('/settings/edit', 'SettingsController@edit')->middleware('auth');
// Route::post('/settings/edit', 'SettingsController@update')->middleware('auth');

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('items', 'ItemsController')->middleware('auth');
// Route::resource('item-categories', 'ItemCategoriesController')->middleware('auth');
// Route::resource('suppliers', 'SuppliersController')->middleware('auth');
// Route::resource('office-locations', 'OfficeLocationsController')->middleware('auth');
// Route::resource('staff', 'StaffController')->middleware('auth');
// Route::resource('orders', 'OrdersController')->middleware('auth');

// Route::get('/stock/add', 'ItemStocksController@addView')->middleware('auth');
// Route::post('/stock/add', 'ItemStocksController@addStock')->middleware('auth');

// Route::get('/stock/remove', 'ItemStocksController@removeView')->middleware('auth');
// Route::post('/stock/remove', 'ItemStocksController@removeStock')->middleware('auth');

// Route::get('/stock/move', 'ItemStocksController@moveView')->middleware('auth');
// Route::post('/stock/move', 'ItemStocksController@moveStock')->middleware('auth');

// Route::get('/users/create', 'UsersController@create')->middleware('auth');
// Route::post('/users/create', 'UsersController@store')->middleware('auth');
// Route::get('/users', 'UsersController@index')->middleware('auth');
// Route::get('/users/{id}/edit', 'UsersController@edit')->middleware('auth');
// Route::put('/users/{id}', 'UsersController@update')->middleware('auth');
// Route::delete('/users/{id}', 'UsersController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // Items

	Route::resource('item-categories', 'App\Http\Controllers\ItemCategoriesController');
    Route::resource('items', 'App\Http\Controllers\ItemsController');


    Route::resource('item-stocks', 'App\Http\Controllers\ItemStocksController')->middleware('auth');
    Route::get('item/stock/{item}', [ 'as' => 'item.stocks.create', 'uses' => 'App\Http\Controllers\ItemStocksController@createStock' ]);

    Route::get('item-stocks/issue/{item}', [ 'as' => 'itemstock.issuance.create', 'uses' => 'App\Http\Controllers\ItemStocksController@issue' ]);
    Route::post('item-stocks/issue/', ['as' => 'itemstock.issuance', 'uses' => 'App\Http\Controllers\ItemStocksController@saveIssue']);

    Route::post('item-stocks/return/{itemstock}', ['as' => 'itemstock.return', 'uses' => 'App\Http\Controllers\ItemStocksController@returnStock']);

    Route::get('item-stocks/move/{item}', [ 'as' => 'itemstock.move', 'uses' => 'App\Http\Controllers\ItemStocksController@move' ]);
    Route::post('item-stocks/move/', ['as' => 'itemstock.save.move', 'uses' => 'App\Http\Controllers\ItemStocksController@saveMove']);


	Route::resource('suppliers', 'App\Http\Controllers\SuppliersController');
	Route::resource('office-locations', 'App\Http\Controllers\OfficeLocationsController');
	Route::resource('staff', 'App\Http\Controllers\StaffController');
	Route::resource('orders', 'App\Http\Controllers\OrdersController');


    Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);

});

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
// });

