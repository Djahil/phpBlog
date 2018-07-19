<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminUsersController extends Controller
{
    // Permet d'isoler le constructeur pour un middleware donné
    public function __construct(){
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin/users/index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);

        $admin = false;
        $author = false;
        $moderator = false;

    foreach($user->roles as $role) {
        if ($role->id == 1) {
            $admin = true;
        }
        if ($role->id == 2) {
            $author = true;
        }
        if ($role->id == 3) {
            $moderator = true;
        }
    }
        return view('admin.users.edit', compact("user", "admin", "author", "moderator"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Cherche le user à modifier
        $User = User::findOrFail($id);

        //On le met à jour avec les nouvelles données
        $User->update($request->all());
        $User->roles()->sync($request->role);

        // On redirige vers la page de notre choix
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->roles()->detach($User->roles);

        User::whereId($id)->delete();

        return redirect()->route('users.index');
    }
}
