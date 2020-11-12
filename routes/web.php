<?php

//use App\User;
//use Illuminate\Support\Facades\Input;
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
// Landing page
Route::get('/index','PagesController@index')->name('indexpages');
//Pages
Route::get('/about','PagesController@about')->name('aboutpages');
Route::get('/contact','PagesController@contact')->name('contactpages');
Route::post('/dosend','PagesController@dosend')->name('dosendmessage');
//Posts
//Route::resource('/posts','PostsController');
Route::get('/posts', 'PostsController@index')->name('Posts.index');
Route::get('posts/{show}','PostsController@show' )->name('Posts.show');
Route::get('createPost','PostsController@create' )->name('Posts.create');
Route::post('storePost','PostsController@store' )->name('Posts.store');
Route::get('posts/{post}/edit','PostsController@edit')->name('Posts.edit');
Route::put('posts/{post}/update','PostsController@update')->name('Posts.update');
Route::delete('posts/{post}/destroy','PostsController@destroy' )->name('Posts.destroy');
// Search
Route::post('posts/search','PostsController@search')->name('posts.search');
//Comments
Route::post('/comments/{slug}','CommentsController@store')->name('comments.store');
//Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

