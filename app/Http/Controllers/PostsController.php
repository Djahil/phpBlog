<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les Posts de notre BDD et on stock dans $posts
        $posts = Post::all();

        // On retrourne la vue posts/index.blade.php et on lui envoie la variable $posts
        return view('index', compact("posts"));
    }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function show($id)
    {
        $Post = Post::findOrFail($id);
        $Comments = $Post->comments()->whereIsActive(1)->get();

        return view('show', compact("Post", "Comments"));
    }
}
