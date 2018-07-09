<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    // Permet d'isoler le constructeur pour un middleware donné
    public function __construct(){
        $this->middleware('isAdmin');
    }

    public function index(){
        return view('admin.index');
    }
}
