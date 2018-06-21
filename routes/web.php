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



/*
 * Route vers la homepage
 */
Route::get('/', 'HomeController@home');

/*
 * Route vers la liste des posts
 */
Route::get('/posts', 'PostsController@index');

/*
 * Route vers un post
 */
Route::get('/posts/show', 'PostsController@show');

/*
 * Route vers la liste des catégories
 */
Route::get('/categories', 'CategoriesController@index');

/*
 * Route vers une catégorie de posts
 */
Route::get('/categories/show', 'CategoriesController@show');
