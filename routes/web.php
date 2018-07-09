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



/*
 * Route vers la homepage de la section utilisateur
 */

Route::group(['middleware' => 'auth'], function() {

    /*
    * Route vers la homepage de la section utilisateur
    */

    Route::get('/', 'HomeController@home');

    Route::get('/admin', 'AdminController@index')->name("admin.dashboard");

    Route::resource('/admin/categories', 'AdminCategoriesController');

    /*
    * Route vers le dashboard admin
    */
    Route::get('/admin/posts', 'AdminPostsController@index')->name("index");

    /*
    * Route vers les comments de la section admin
    */
    Route::resource('/admin/comments', 'AdminCommentsController', ['only'=>[
        'index',
        'edit',
        'update',
        'destroy'
    ]] );

    /*
    * Route vers les users de la section admin
    */
    Route::resource('/admin/users', 'AdminUsersController');

    /*
    * Route vers les posts de la section admin
    */
    Route::resource('/admin/posts', 'AdminPostsController');

});


/*
 * Route vers la liste des posts de la section utilisateur
 */
Route::get('/posts', 'PostsController@index')->name("guest.index");

/*
 * Route vers un post de la section utilisateur
 */
Route::get('/posts/{post}', 'PostsController@show')->name("show");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts/{post}', 'CommentsController@store')->name('comments.store');

