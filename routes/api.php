<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ActualityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MailingListController;
use App\Http\Controllers\SampleRoomController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;


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

Route::middleware('setLocale')->group(function() {
    Route::get('/rooms/active', [RoomController::class, 'showActiveRooms']);
    Route::get('/reviews/active', [ReviewController::class, 'showActiveReviews']);
    Route::get('/mailinglists/active', [MailingListController::class, 'showActiveMailingList']);
    Route::get('/links/active', [LinkController::class, 'showActiveLinks']);
    Route::get('/headers/active', [HeaderController::class, 'showActiveHeaders']);
    Route::get('/sampleroom/active', [SampleRoomController::class, 'showActiveSampleRooms']);
    Route::get('/services/active', [ServiceController::class, 'showActiveServices']);
    Route::get('/actualities/active', [ActualityController::class, 'showActiveActualities']);
    Route::get('/footers/active', [FooterController::class, 'showActiveFooters']);
    Route::get('/addresses/active', [AddressController::class, 'showActiveAddresses']);
    Route::get('/heroes/active', [HeroController::class, 'showActiveHeroes']);
    Route::get('/videos/active', [VideoController::class, 'showActiveVideos']);
    Route::apiResource("rooms", RoomController::class);
    Route::apiResource("actualities", ActualityController::class);
    Route::apiResource("heroes", HeroController::class);
    Route::apiResource("services", ServiceController::class);
    Route::apiResource("links", LinkController::class);
    Route::apiResource("videos", VideoController::class);
    Route::apiResource("reviews", ReviewController::class);
    Route::apiResource("headers", HeaderController::class);
    Route::apiResource("footers", FooterController::class);
    Route::apiResource("mailinglists", MailingListController::class);
});