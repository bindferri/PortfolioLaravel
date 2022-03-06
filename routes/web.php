<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SkillController;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Hero;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[MainController::class,'show']);
Route::get('/project/{project}',function (Project $project){
    return view('single',[
       'project' => $project
    ]);
});

Route::get('register', [RegisterController::class,'index'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');
Route::get('login', [SessionController::class,'index'])->middleware('guest');
Route::post('login', [SessionController::class,'store'])->middleware('guest');
Route::post('logout', [SessionController::class,'destroy']);

Route::middleware('auth')->group(function (){
    Route::get('admin',function (){
        return view('admin.index',[
            'hero' => Hero::all()->where('user_id',auth()->id()),
            'project' => Project::all()->where('user_id',auth()->id()),
            'footer' => Footer::all()->where('user_id',auth()->id()),
            'skill' => Skill::all()->where('user_id',auth()->id()),
            'contact' => Contact::all()->where('user_id',auth()->id()),
        ]);
    });

    Route::get('admin/hero',[HeroController::class,'index']);
    Route::post('admin/hero',[HeroController::class,'store']);
    Route::get('admin/hero/{hero}',[HeroController::class,'edit']);
    Route::patch('admin/hero/{hero}',[HeroController::class,'update']);
    Route::delete('admin/hero/{hero}',[HeroController::class,'destroy']);

    Route::get('admin/projects',[ProjectController::class,'index']);
    Route::post('admin/projects',[ProjectController::class,'store']);
    Route::get('admin/projects/{project}',[ProjectController::class,'edit']);
    Route::patch('admin/projects/{project}',[ProjectController::class,'update']);
    Route::delete('admin/projects/{project}',[ProjectController::class,'destroy']);

    Route::get('admin/contact',[ContactController::class,'show']);
    Route::post('admin/contact',[ContactController::class,'store']);
    Route::get('admin/contact/{contact}',[ContactController::class,'edit']);
    Route::patch('admin/contact/{contact}',[ContactController::class,'update']);
    Route::delete('admin/contact/{contact}',[ContactController::class,'destroy']);

    Route::get('admin/footer',[FooterController::class,'show']);
    Route::post('admin/footer',[FooterController::class,'store']);
    Route::get('admin/footer/{footer}',[FooterController::class,'edit']);
    Route::patch('admin/footer/{footer}',[FooterController::class,'update']);
    Route::delete('admin/footer/{footer}',[FooterController::class,'destroy']);

    Route::get('admin/skills',[SkillController::class,'show']);
    Route::post('admin/skills',[SkillController::class,'store']);
    Route::get('admin/skills/{skill}',[SkillController::class,'edit']);
    Route::patch('admin/skills/{skill}',[SkillController::class,'update']);
    Route::delete('admin/skills/{skill}',[SkillController::class,'destroy']);
});

