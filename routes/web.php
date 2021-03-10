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
Route::redirect('/login', '/en/home');
Route::redirect('/home', '/en/home');
Route::redirect('/index', '/en/home/page')->name('index');

Route::group(['prefix' => '{language}'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/home/page', 'PagesController');
    Route::resource('/write', 'WriteWithUsController');
    Route::resource('/blog', 'BlogController',['except'=> ['create','store','update','destroy']]);
    Route::get('/post/{post}', 'PostsController@show')->name('post.show');


    Auth::routes();

    Route::middleware('auth')->group(function () {
        Route::get('/post', 'PostsController@index')->name('post.index')->middleware('can:posts-management');
        Route::post('/post', 'PostsController@create')->name('post.store')->middleware('can:posts-management');
        Route::get('/post/create', 'PostsController@create')->name('post.create')->middleware('can:posts-management');
        Route::delete('/post/{post}', 'PostsController@destroy')->name('post.destroy')->middleware('can:posts-management');
        Route::put('/post/{post}', 'PostsController@update')->name('post.update')->middleware('can:posts-management');

        Route::get('/post/{post}/edit', 'PostsController@edit')->name('post.edit')->middleware('can:posts-management');
        Route::resource('field', 'FieldsController')->middleware('can:posts-management');
        Route::resource('notification', 'NotificationsController')->middleware('can:posts-management');
        Route::resource('category', 'CategoriesController')->middleware('can:manage-categories');
        Route::resource('writer', 'WritersController',['except'=> ['show','create','store','update','index']])->middleware('can:manage-users');
        Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){ //the middleware here runs the gate 'manage-users'in ech of any route in the group
            Route::resource('users', 'UsersController',['except'=> ['show','create','store']]);
        });

    });
});




