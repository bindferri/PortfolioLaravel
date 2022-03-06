<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function show(){
        $footers = Footer::all()->where('user_id',auth()->id());
        return view('admin.footer.show',[
            'footers' => $footers
        ]);
    }

    public function store(){
        $attributes = \request()->validate([
            'text' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'github' => 'required',
        ]);
        $attributes['user_id'] = auth()->id();
        if (Footer::all()->where('user_id',auth()->id())->count() === 0){
            Footer::create($attributes);
            return back();
        }
        return back()->with('success','You cannot add more than 1 footer');
    }

    public function edit(Footer $footer){
        $this->authorize('checkOwner',$footer);
            return view('admin.footer.edit', [
                'footer' => $footer
            ]);
    }

    public function update(Footer $footer){
        $attributes = \request()->validate([
            'text' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'github' => 'required',
        ]);

        $footer->update($attributes);
        return back();
    }

    public function destroy(Footer $footer){
        $this->authorize('checkOwner',$footer);
        $footer->delete();
            return back();
    }
}
