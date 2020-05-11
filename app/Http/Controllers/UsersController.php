<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('name','asc')->get();

        return view('users.index')->with('users', $users);
    }

    public function changeAdmin(User $user){
        if($user->isAdmin()){
            $user->role = 'client';
        }else{
            $user->role = 'admin';
        }

        $user->save();
        session()->flash('success', 'Permissão alterada de '.$user->name);
        return redirect()->back();
    }
}
