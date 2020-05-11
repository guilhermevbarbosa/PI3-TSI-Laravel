<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(EditProfileRequest $request){
        $user = auth()->user();
        $user->name = $request->name;

        if ($user->email != $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        session()->flash('success', 'Perfil editado com sucesso!');
        return redirect()->back();
    }
}
