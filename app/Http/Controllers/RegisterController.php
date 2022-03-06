<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function index(){
        return view('sessions.register');
    }

    public function store(){
        $attributes = \request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'username' => ['required',Rule::unique('users','username')],
            'password' => 'required',
            'email' => ['required','email']
        ]);

        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/admin/');
    }
}
