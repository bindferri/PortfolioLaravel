<?php

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/skills',function (){
    return Skill::all();
});

Route::post('/skills',function (){
    Skill::create([
        'user_id' => 2,
        'name' => \request('name'),
        'image' => \request('image')
    ]);
});

Route::patch('/skills/{skill}',function (Skill $skill){
    $skill->update([
        'name' => \request('name'),
        'image' => \request('image')
    ]);
});

Route::delete('/skills/{skill}',function (Skill $skill){
    $skill->delete();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
