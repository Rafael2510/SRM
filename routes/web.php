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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});
Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'auth'], function()
{
    
    // User
    Route::get('/user/procurar', ['as' => 'user.search', 'uses' => 'UserController@search']);
    Route::resource('user','UserController');

	//Categories
    Route::get('/categories/search',['as' =>'categories.search', 'uses' => 'CategoriesController@search']);
    Route::resource('categories', 'CategoriesController');

	//Products
    Route::get('/product/search',['as' => 'products.search', 'uses' => 'ProductsController@search']);
    Route::resource('products', 'ProductsController');
    Route::get('/product/sell/{id}', ['as' => 'products.sell', 'uses' => 'ProductsController@sell']);
    Route::post('/product/sell/store', ['as' => 'products.sell.store', 'uses' => 'ProductsController@storeSell']);
    Route::post('/product/promo/delet/{id}', ['as' => 'products.destroy.promo', 'uses' => 'ProductsController@deletePromo']);

    // Perfil
    Route::group(['as' => 'profile.', 'prefix' => 'perfil'], function()
	{
		Route::get('/', ['as' => 'edit', 'uses' => 'ProfileController@edit']);
		Route::put('perfil/atualizar', ['as' => 'update', 'uses' => 'ProfileController@update']);
		Route::put('perfil/password', ['as' => 'password', 'uses' => 'ProfileController@password']);
	});

    //Service
	Route::get('/service/search',['as' => 'services.search', 'uses' => 'serviceController@search']);
    Route::resource('services', 'serviceController');

	//History
	Route::get('/history/search',['as' => 'history.search', 'uses' => 'historyController@search']);
    Route::resource('history', 'historyController');
});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

