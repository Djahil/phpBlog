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
        return view('posts.index', compact("posts"));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostsRequest $request, $id)
    {
        $User = User::findOrFail($id);
        //$input = $request->all();

        // On instancie un objet post qui contient les informations du nouveau post
        $Post = new Post();
        $Post->title = input["title"];
        $Post->content = input["content"];
        $Post->photo = input["is_active"];

        // On crée le post
        $User->posts()->save($Post);

        // On redirige vers la page index
        return redirect(admin.posts);
    }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function show($id)
    {

    }
}
