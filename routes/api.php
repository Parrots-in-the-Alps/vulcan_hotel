<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\VideoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'show'], function(){

    Route::get('/videos', [VideoController::class, 'showVideos']);
    Route::get('/video/{id}', [VideoController::class, 'showVideo']);
    Route::get('/heroes', [HeroController::class, 'showHeroes']);
    Route::get('/hero/{id}', [HeroController::class, 'showHero']);

});

Route::group(['prefix' => 'update'], function(){

    Route::patch('/video/{id}', [VideoController::class, 'updateVideo']);
    Route::patch('/hero/{id}', [HeroController::class, 'updateHero']);

});

Route::group(['prefix' => 'delete'], function(){

    Route::delete('/allvideos', [VideoController::class, 'deleteVideos']);
    Route::delete('/allheroes', [HeroController::class, 'deleteHeroes']);
    Route::delete('/video/{id}', [VideoController::class, 'deleteVideo']);
    Route::delete('/hero/{hero}', [HeroController::class, 'deleteHero']);
    

});

Route::group(['prefix' => 'create'], function(){

    Route::post('/video', [VideoController::class, 'createVideo']);
    Route::post('/hero', [HeroController::class, 'createHero']);

});