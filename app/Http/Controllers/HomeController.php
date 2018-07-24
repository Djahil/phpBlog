<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Homepage of blog
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $posts = Post::all();
        return view('index', compact("posts"));
    }
}
