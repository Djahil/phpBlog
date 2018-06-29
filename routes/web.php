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

Route::resource('/admin/categories', 'AdminCategoriesController'); 

/*
 * Route vers la homepage de la section utilisateur
 */
Route::get('/', 'HomeController@home');

/*
 * Route vers la homepage de la section utilisateur
 */
Route::get('/admin', 'AdminController@index');

/*
 * Route vers la liste des posts de la section utilisateur
 */
Route::get('posts', 'PostsController@index');

/*
 * Route vers un post de la section utilisateur
 */
Route::get('posts/show', 'PostsController@show');

/*
 * Route vers le dashboard admin
 */
Route::get('admin/posts', 'AdminPostsController@index')->name("index");

/*
 * Route vers les comments de la section admin
 */
Route::resource('admin/comments', 'AdminCommentsController', ['only'=>[
    'index',
    'edit',
    'update',
    'destroy'
]] );

/*
 * Route vers les users de la section admin
 */
Route::resource('admin/users', 'AdminUsersController');

/*
 * Route vers les posts de la section admin
 */
Route::resource('admin/posts', 'AdminPostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
