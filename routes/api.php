<?php

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
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\LockController;

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

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);


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
Route::get('/rooms/active', [RoomController::class, 'showActiveRooms']);



Route::middleware(['auth:sanctum', 'setLocale'])->group(function() {

    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('user/info', [UserController::class, 'info']);
    Route::post('user/updatepass', [UserController::class, 'updatePassword']);

    Route::apiResource('users', UserController::class);
    
    Route::apiResource("actualities", ActualityController::class);
    Route::apiResource("heroes", HeroController::class);
    Route::apiResource("services", ServiceController::class);
    Route::apiResource("links", LinkController::class);
    Route::apiResource("videos", VideoController::class);
    Route::apiResource("reviews", ReviewController::class);
    Route::apiResource("headers", HeaderController::class);
    Route::apiResource("footers", FooterController::class);
    Route::apiResource("mailinglists", MailingListController::class);
    Route::apiResource("reservations", ReservationController::class);
    
});
//TODO
//RANGER
Route::post("/isAvailable",[ReservationController::class,'showRoomAvailability']);
Route::post("/firstAccess", [AccessController::class, 'getFirstAccess']);
Route::apiResource("access", AccessController::class);
Route::apiResource("rooms", RoomController::class);
Route::apiResource("reservations", ReservationController::class);
Route::post("isresavalide", [ReservationController::class, 'isReservationValide']);
Route::post("validateresa", [ReservationController::class, 'validateReservation']);
Route::post("getRollingReservations", [ReservationController::class, 'getRollingReservations']);
Route::post("openNaaNoor", [LockController::class, 'openNaaNoor']);
Route::post("setNfc", [LockController::class, 'setNfcTag']);
Route::post("checkcard", [LockController::class, 'checkCardCounter']);
Route::apiResource("locks", LockController::class);


Route::get("/getReservationsOnDates", [ReservationController::class, 'getReservationsOnDates']);
Route::get("/opsDashBoard", [ReservationController::class, 'getOpsDashBoardData']);
Route::get("/getReservationsByMonths", [ReservationController::class, "getReservationsByMonths"]);