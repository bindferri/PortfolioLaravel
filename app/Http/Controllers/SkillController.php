<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function show(){
        return view('admin.skills.show',[
            'skills' => Skill::all()->where('user_id',auth()->id())
        ]);
    }

    public function store(){
        $attributes = \request()->validate([
            'name' => 'required',
            'image' => ['required','image']
        ]);

        $attributes['image'] = \request()->file('image')->store('skills_assets');
        $attributes['user_id'] = auth()->id();
        Skill::create($attributes);
        return back();
    }

    public function edit(Skill $skill){
        $this->authorize('checkOwner',$skill);
            return view('admin.skills.edit', [
                'skill' => $skill
            ]);
    }

    public function update(Skill $skill){
        $attributes = \request()->validate([
            'name' => 'required',
            'image' => ['image']
        ]);

        if (isset($attributes['image'])){
            $attributes['image'] = \request()->file('image')->store('skills_assets');
        }

        $skill->update($attributes);
        return back();
    }

    public function destroy(Skill $skill){
        $this->authorize('checkOwner',$skill);
        $skill->delete();
        return back();
    }

}
