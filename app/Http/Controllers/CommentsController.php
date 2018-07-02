<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuestCommentsRequest;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GuestCommentsRequest $request, $id)
    {
        $Post = Post::findOrFail($id);

        $Post->comments()->save(
            new Comment($request->all())
        );

        // On redirige vers la page index
        return redirect()->route("show", $Post->id);
    }
}
