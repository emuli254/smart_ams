<?php

// use Symfony\Component\Routing\Route;
// use Illuminate\Support\Facades\Auth;


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

// Route::resource('products', 'ProductsController')->middleware('auth');
// Route::resource('product-categories', 'ProductCategoriesController')->middleware('auth');
// Route::resource('suppliers', 'SuppliersController')->middleware('auth');
// Route::resource('office-locations', 'OfficeLocationsController')->middleware('auth');
// Route::resource('staff', 'StaffController')->middleware('auth');
// Route::resource('orders', 'OrdersController')->middleware('auth');

// Route::get('/stock/add', 'ProductStocksController@addView')->middleware('auth');
// Route::post('/stock/add', 'ProductStocksController@addStock')->middleware('auth');

// Route::get('/stock/remove', 'ProductStocksController@removeView')->middleware('auth');
// Route::post('/stock/remove', 'ProductStocksController@removeStock')->middleware('auth');

// Route::get('/stock/move', 'ProductStocksController@moveView')->middleware('auth');
// Route::post('/stock/move', 'ProductStocksController@moveStock')->middleware('auth');

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

	Route::resource('products', 'App\Http\Controllers\ProductsController')->middleware('auth');

    Route::get('product/issue/{product}', [ 'as' => 'product.issuance.create', 'uses' => 'App\Http\Controllers\ProductsController@issue' ]);

    Route::post('product/issue/', ['as' => 'product.issuance', 'uses' => 'App\Http\Controllers\ProductsController@saveIssue']);

	Route::resource('product-categories', 'App\Http\Controllers\ProductCategoriesController')->middleware('auth');
	Route::resource('suppliers', 'App\Http\Controllers\SuppliersController')->middleware('auth');
	Route::resource('office-locations', 'App\Http\Controllers\OfficeLocationsController')->middleware('auth');
	Route::resource('staff', 'App\Http\Controllers\StaffController')->middleware('auth');
	Route::resource('orders', 'App\Http\Controllers\OrdersController')->middleware('auth');


    // Route::resource('product-issuance', 'App\Http\Controllers\ProductIssuanceController');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

