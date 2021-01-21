<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\LocaleController;
use \App\Http\Controllers\Admin\ParserController;
use \App\Http\Controllers\SocialController;

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
})->name('home');

/**
 * Новости
 */

Route::group([
    'prefix' => 'news',
    'as' => 'news::',
], function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('categories');

    Route::get('/card/{id}', [NewsController::class, 'newsCard'])
        ->name('card')
        ->where('id', '[0-9]+');

    Route::get('/{categoryId}', [NewsController::class, 'list'])
        ->name('list')
        ->where('categoryId', '[0-9]+');
});

Route::match(['get', 'post'], '/news/upload', [NewsController::class, 'upload'])
    ->name('upload');

/**
 * Админка новостей
 */
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
    'namespace' => '\App\Http\Controllers\Admin',
    //   'middleware' => ['auth']
], function () {
    Route::get('/', 'NewsController@index')
        ->name('index');

    Route::match(['get', 'post'], '/create', 'NewsController@create')
        ->name('create');

    Route::match(['post'], '/save', 'NewsController@save')
        ->name('save');

    Route::get('/update/{id}', 'NewsController@update')
        ->name('update');

    Route::get('/delete/{id}', 'NewsController@delete')
        ->name('delete');
});

/**
 * Админка новостей
 */
$adminNewsRoutes = function () {
    Route::group([
        'prefix' => '/news',
        'as' => 'news::',
    ], function () {
        Route::get('/', 'NewsController@index')
            ->name('index');

        Route::match(['get'], '/create', 'NewsController@create')
            ->name('create');

        Route::match(['post'], '/save', 'NewsController@save')
            ->name('save');

        Route::get('/update/{id}', 'NewsController@update')
            ->name('update');

        Route::get('/delete/{id}', 'NewsController@delete')
            ->name('delete');
    });
};

Route::group([
    'prefix' => 'admin/',
    'namespace' => '\App\Http\Controllers\Admin',
    'as' => 'admin::',
    'middleware' => ['auth', 'check_admin']
], function () use ($adminNewsRoutes) {
    $adminNewsRoutes();
    //Профиль
    Route::group([
        'prefix' => 'profile',
        'as' => 'profile::',
    ], function () {
        Route::post('update', 'ProfileController@update',
        )->name('update');

        Route::get('show', 'ProfileController@show',
        )->name('show');
    });

    Route::get("parser", [ParserController::class, 'index'])
        ->name('parser');
});

Route::group([
    'prefix' => 'social',
    'as' => 'social::',
], function () {
    Route::get('/login', [SocialController::class, 'loginVk'])
        ->name('login-vk');
    Route::get('/response', [SocialController::class, 'responseVk'])
        ->name('response-vk');
});


Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('/locale/{lang}', [LocaleController::class, 'index'])
    ->where('lang', '\w+')
    ->name('locale');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
