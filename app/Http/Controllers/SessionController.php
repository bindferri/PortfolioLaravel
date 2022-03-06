<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function index(){
        return view('sessions.login');
    }

    public function store(){
        $attributes = request()->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/admin/');
        }

        throw ValidationException::withMessages([
            'email' => 'You provided credentials could not be verified'
        ]);
    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
}
