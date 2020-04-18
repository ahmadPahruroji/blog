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

Route::get('/', 'BlogController@index');
// Route::get('/isi-post', function() {
//     //
//     return view('blog.isipost');
// });

Route::get('/content/{slug}', 'BlogController@content')->name('blog.content');
Route::get('/list-post', 'BlogController@listblog')->name('blog.list');
Route::get('/list-category/{category}', 'BlogController@listcategory')->name('blog.category');
Route::get('/cari', 'BlogController@cari')->name('blog.cari');

Route::group(['middleware' => 'auth'], function() {
    //
    Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('category', 'CategoryController');
	Route::resource('tag', 'TagController');

	Route::get('/post/restore', 'PostController@tampilhapus')->name('post.restores');
	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post/hapus/{id}', 'PostController@hapus')->name('post.hapus');
	Route::resource('post', 'PostController');
	Route::resource('user', 'UserController');
});






