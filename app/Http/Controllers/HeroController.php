<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function PHPUnit\Framework\throwException;

class HeroController extends Controller
{
    //
    public function index(){
        $hero = Hero::all()->where('user_id',auth()->id());
        return view('admin.hero.show',[
            'heros' => $hero
        ]);
    }

    public function store(){
        $attributes = \request()->validate([
           'hero_text' => 'required',
           'hero_button_text' => 'required',
           'hero_cv' => 'required|mimes:pdf',
           'hero_photo' => ['required','image'],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['hero_photo'] = \request()->file('hero_photo')->store('hero_assets');
        $attributes['hero_cv'] = \request()->file('hero_cv')->store('hero_assets');


        if (Hero::all()->where('user_id',auth()->id())->count() === 0){
            Hero::create($attributes);
            return back();
        }
        return back()->with('success','You cannot create more than 1 hero');
    }

    public function edit(Hero $hero){
        $this->authorize('checkOwner',$hero);
            return view('admin.hero.edit', [
                'hero' => $hero
            ]);
    }

    public function update(Hero $hero){
        $attributes = \request()->validate([
            'hero_text' => 'required',
            'hero_button_text' => 'required',
            'hero_cv' => 'mimes:pdf',
            'hero_photo' => ['image']
        ]);

        if (isset($attributes['hero_cv'])){
            $attributes['hero_cv'] = \request()->file('hero_cv')->store('hero_assets');
        }

        if (isset($attributes['hero_photo'])){
            $attributes['hero_photo'] = \request()->file('hero_photo')->store('hero_assets');
        }

        $hero->update($attributes);
        return back();
    }

    public function destroy(Hero $hero){
        $this->authorize('checkOwner',$hero);
        $hero->delete();
        return redirect('admin/hero');
    }

}
