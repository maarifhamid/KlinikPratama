<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' =>'register'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:50','unique:users'],
            'email' => ['required', 'email:dns'],
            'password' => ['required','min:5','max:50']
        ]);
        //$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        //$request->session()->flash('success', 'Pendaftaran Berhasil, Silakan Login');
        return redirect('/login')->with('success', 'Pendaftaran Berhasil, Silakan Login');

    }
}
