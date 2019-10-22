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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Admin routes
Route::get('/admin', 'admin\AdminPagesController@index')->name('admin');
Route::get('/admin/about', 'admin\AdminPagesController@about')->name('admin-about');
Route::get('/admin/portfolio', 'admin\AdminPagesController@portfolio')->name('admin-portfolio');
Route::get('/admin/clients', 'admin\AdminPagesController@clients')->name('admin-clients');
Route::get('/admin/pricing', 'admin\AdminPagesController@pricing')->name('admin-pricing');
Route::get('/admin/contact', 'admin\AdminPagesController@contact')->name('admin-contact');

//Blog admin routes
Route::resource('/admin/blog', 'admin\PostController', ['as' => 'admin-blog']);
Route::resource('/admin/blog-categories', 'admin\CategoryController', ['as' => 'admin-blog-categories', 'except' => ['create']]);
Route::resource('/admin/blog-tags', 'admin\TagController', ['as' => 'admin-blog-tags', 'except' => ['create']]);

//Front End Routes
Route::get('/blog', 'frontend\PagesController@blog')->name('blog');