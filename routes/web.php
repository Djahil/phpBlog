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
 * Route vers la homepage
 */

Route::get('/', 'HomeController@home')->name("index");

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', 'AdminController@index')->name("admin.dashboard");
});

/*
* Route vers la section admin
*/

Route::group(['middleware' => 'isAdmin'], function() {

    /*
    * Route vers les catégories de la section admin
    */
    Route::resource('/admin/categories', 'AdminCategoriesController');

    /*
    * Route vers les users de la section admin
    */
    Route::resource('/admin/users', 'AdminUsersController');

});

Route::group(['middleware' => 'isModerator'], function() {
    /*
    * Route vers les comments de la section admin
    */
    Route::resource('/admin/comments', 'AdminCommentsController', ['only'=>[
        'index',
        'edit',
        'show',
        'update',
        'destroy'
    ]] );

});

Route::group(['middleware' => 'isAuthor'], function() {
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


Route::post('/posts/{post}', 'CommentsController@store')->name('comments.store');

