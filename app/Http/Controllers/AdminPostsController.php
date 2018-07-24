<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\User;
use App\Comment;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    // Permet d'isoler le constructeur pour un middleware donné
    public function __construct(){
        $this->middleware('isAuthor');
    }

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
        $Categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view('admin.posts.create', compact("Categories"));
    }

    public function store(PostsRequest $request)
    {
        $AuthUser = Auth::user()->id;
        $User = User::findorfail($AuthUser);

        // On récupère l'id de la catégorie sélectionnée dans le select
        $inputCatId = $request->input('Categories');

        $Post = $User->posts()->save(
            new Post($request->all())
        );


        // Si le champ file n'est pas vide
        if(!empty($request->file('image'))) {
            // On récupère le nom de l'image
            $name = date('Y-m-d_H-i-s')."_".$request->file('image')->getClientOriginalName();

            // On copie l'image dans le dossier '/public/img' en modifiant le nom
            $request->file('image')->move('img', $name);

            // On sauve le nom de la photo dans la BDD en passant par Post
            $Post->photos()->save(
                new Photo(['file'=>$name])
            );
        }

        // On redirige vers la page index
        return redirect()->route("posts.index")->with('success', 'Votre post a bien été créé');
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
        $Categories = Category::all()->pluck('name', 'id');

        return view('admin.posts.show', compact("Post", "Categories"));
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

        $Categories = Category::pluck('name', 'id');

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


        // Si le champ file n'est pas vide
        if(!empty($request->file('image'))) {

            // On récupère le nom de l'image
            $name = date('Y-m-d_H-i-s')."_".$request->file('image')->getClientOriginalName();

            // On copie l'image dans le dossier '/public/img' en modifiant le nom
            $request->file('image')->move('img', $name);

            if(empty($Post->photos()->first())) {
                // On sauve le nom de la photo dans la BDD en passant par Post
                $Post->photos()->save(
                    new Photo(['file'=>$name])
                );
            } else {
                // On update le nom de la photo dans la BDD en passant par Post
                $Post->photos()->update(['file'=>$name]);
            }
        }

        // On redirige vers la page de notre choix
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::findOrFail($id);
        Post::whereId($id)->delete();
        Comment::wherePostId($id)->delete();
        if($Post->photos()->first()) {
            $Post->photos()->delete();
        }

        return redirect()->route('posts.index');
    }
}
