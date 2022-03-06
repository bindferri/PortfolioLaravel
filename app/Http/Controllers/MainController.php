<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Footer;
use App\Models\Hero;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(){
        $data = [];
        if (User::all()->count() > 0) {
            $data = [
                'hero' => Hero::first(),
                'projects' => Project::all()->where('user_id', User::first()->id),
                'skills' => Skill::all()->where('user_id', User::first()->id),
                'contact' => Contact::first(),
                'footer' => Footer::first()
            ];
        }
        return view('index',$data);
    }
}
