<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Http\Requests\CommentsRequest;


class AdminCommentsController extends Controller
{
    // Permet d'isoler le constructeur pour un middleware donné
    public function __construct(){
        $this->middleware('isModerator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
/*        var_dump($comments);
        die();*/

        return view("admin.comments.index", compact("comments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Comment = Comment::findOrFail($id);

        return view('admin.comments.edit', compact("Comment"));
    }

    public function update(CommentsRequest $request, $id)
    {
        //Cherche le comment à modifier
        $Comment = Comment::findOrFail($id);

        //On le met à jour avec les nouvelles données
        $Comment->update($request->all());

        // On redirige vers la page de notre choix
        return redirect()->route('comments.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::whereId($id)->delete();

        return redirect()->route('comments.index');
    }
}
