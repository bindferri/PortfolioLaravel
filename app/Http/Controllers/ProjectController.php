<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(){
        return view('admin.project.show',[
            'projects' => Project::all()->where('user_id',auth()->id())
        ]);
    }

    public function store(){
        $attributes = \request()->validate([
           'project_name' => 'required',
           'project_excerpt' => 'required',
           'project_content' => 'required',
           'project_main_photo' => ['required','image'],
           'project_second_photo' => ['required','image'],
           'project_third_photo' => ['required','image'],
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['project_main_photo'] = \request()->file('project_main_photo')->store('project_assets');
        $attributes['project_second_photo'] = \request()->file('project_second_photo')->store('project_assets');
        $attributes['project_third_photo'] = \request()->file('project_third_photo')->store('project_assets');

        Project::create($attributes);
        return back();
    }

    public function edit(Project $project){
        $this->authorize('checkOwner',$project);
            return view('admin.project.edit', [
                'project' => $project
            ]);

    }

    public function update(Project $project){
        $attributes = \request()->validate([
            'project_name' => 'required',
            'project_excerpt' => 'required',
            'project_content' => 'required',
            'project_main_photo' => ['image'],
            'project_second_photo' => ['image'],
            'project_third_photo' => ['image'],
        ]);

        if (isset($attributes['project_main_photo'])){
            $attributes['project_main_photo'] = \request()->file('project_main_photo')->store('project_assets');
        }

        if (isset($attributes['project_second_photo'])) {
            $attributes['project_second_photo'] = \request()->file('project_second_photo')->store('project_assets');
        }

        if (isset($attributes['project_third_photo'])) {
            $attributes['project_third_photo'] = \request()->file('project_third_photo')->store('project_assets');
        }

        $project->update($attributes);
        return back();
        }

        public function destroy(Project $project){
            $this->authorize('checkOwner',$project);
            $project->delete();
            return back();
        }
}
