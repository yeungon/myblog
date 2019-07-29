<?php

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

// Normally, it is a post request.
Route::get('/logout', 'Auth\LoginController@logout')->name('logoutsystem');

Route::get('/home', 'HomeController@index')->name('home');

//The Front-End routes
Route::get('/', 'Frontend\HomeController@index')->name("homepage");
Route::get('/about', 'Frontend\HomeController@about')->name('about');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');
Route::get('/article', 'Frontend\HomeController@index')->name("homepagearticle");
Route::get('/article/{id}.secured', 'Frontend\HomeController@article')->name('article')->where(['id' => '[0-9]+']);

// Display blogpost/article according to user and category
Route::get('/user-article/{userid}.secured', 'Frontend\HomeArticleListing@byUser')->name("home.article.user");
Route::get('/category-article/{categoryid}.secured', 'Frontend\HomeArticleListing@byCategory')->name("home.article.category");


// The Back-end ruotes
Route::prefix('admin')->group(function () {
    Route::get('/', 'Backend\AdminController@index')->name('admin.index');
    
    //User 
    Route::get('user', 'Backend\UserController@index')->name('admin.user.index');
    Route::get('user/create', 'Backend\UserController@create')->name('admin.user.create');
    Route::post('user/create', 'Backend\UserController@store')->name('admin.user.store');
    Route::get('user/{id}', 'Backend\UserController@show')->name('admin.user.show');
    Route::get('user/edit/{id}', 'Backend\UserController@edit')->name('admin.user.edit');
    Route::put('user/edit/{id}', 'Backend\UserController@update')->name('admin.user.update');
    Route::delete('user/delete/{id}', 'Backend\UserController@destroy')->name('admin.user.destroy');

    // Category
    Route::get('category', 'Backend\CategoryController@index')->name('admin.category.index');
    Route::get('category/create', 'Backend\CategoryController@create')->name('admin.category.create');
    Route::post('category/create', 'Backend\CategoryController@store')->name('admin.category.store');
    Route::get('category/{id}', 'Backend\CategoryController@show')->name('admin.category.show');
    Route::get('category/edit/{id}', 'Backend\CategoryController@edit')->name('admin.category.edit');
    Route::put('category/edit/{id}', 'Backend\CategoryController@update')->name('admin.category.update');
    Route::delete('category/delete/{id}', 'Backend\CategoryController@destroy')->name('admin.category.destroy');

    // Article
    Route::get('article', 'Backend\ArticleController@index')->name('admin.article.index');
    Route::get('article/create', 'Backend\ArticleController@create')->name('admin.article.create');
    Route::post('article/create', 'Backend\ArticleController@store')->name('admin.article.store');
    Route::get('article/{id}', 'Backend\ArticleController@show')->name('admin.article.show');
    Route::get('article/edit/{id}', 'Backend\ArticleController@edit')->name('admin.article.edit');
    Route::put('article/edit/{id}', 'Backend\ArticleController@update')->name('admin.article.update');
    Route::delete('article/delete/{id}', 'Backend\ArticleController@destroy')->name('admin.article.destroy');

    
});