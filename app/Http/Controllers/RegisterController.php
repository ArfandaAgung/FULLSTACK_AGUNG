<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index () {
        return view ('Register.Register');
    }

    public function store(Request $request) 
    {
        $validateData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'alamat' => 'required|max:255',
            'password' => 'required|min:3'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        
        User::create($validateData);
        return redirect('/login')->with('loginSucces', 'Register Berhasil, Silahkan Login');
    }
}
