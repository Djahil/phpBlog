<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\PostsRequest;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les Posts de notre BDD et on stock dans $posts
        $Posts = Post::all();

        // On retrourne la vue posts/index.blade.php et on lui envoie la variable $posts
        return view('admin.posts.index', compact("Posts"));
    }

    public function create()
    {
        $Categories = Category::pluck('name');

        return view('admin.posts.create', compact("Categories"));
    }

    public function store(PostsRequest $request)
    {
        $User = User::findOrFail(1);

      // On récupère l'id de la catégorie sélectionnée dans le select
        $inputCatId = $request->input('Categories');


        $User->posts()->save(
            new Post($request->all())
        );

        // On redirige vers la page index
        return redirect()->route("posts.index");
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

        return view('admin.posts.show', compact("Post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Post = Post::findOrfail($id);

        $Categories = Category::pluck('name');

        return view('admin.posts.edit', compact("Post", "Categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        //Cherche le post à modifier
        $Post = Post::findOrFail($id);

        //On le met à jour avec les nouvelles données
        $Post->update($request->all());

        // On redirige vers la page de notre choix
        return redirect()->route('posts.index');

        // var_dump($request->all());
        // die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::whereId($id)->delete();

        return redirect()->route('posts.index');
    }
}
