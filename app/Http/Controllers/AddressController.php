<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $address = $user->address;

        if($address == null){
            return view('admin/users.addAddress');
        }else{
            return view('admin/users.editAddress')->with('address', $address);
        }
    }

    public function store(AddressRequest $request)
    {
        $user = auth()->user();

        Address::create([
            'cep'=>$request->cep,
            'h_address'=>$request->h_address,
            'h_number'=>$request->h_number,
            'neighborhood'=>$request->neighborhood,
            'city'=>$request->city,
            'state'=>$request->state,
            'user_id'=>$user->id
        ]);

        session()->flash('success', 'Dados atualizados com sucesso!');
        return redirect('home-store');
    }

    public function update(AddressRequest $request)
    {
        $user = auth()->user();
        $address = $user->address;

        $address->update([
            'cep'=>$request->cep,
            'h_address'=>$request->h_address,
            'h_number'=>$request->h_number,
            'neighborhood'=>$request->neighborhood,
            'city'=>$request->city,
            'state'=>$request->state,
        ]);

        session()->flash('success', 'Dados atualizados com sucesso!');
        return redirect('home-store');
    }

}
