<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ActualityController;
use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\CallToActionController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MailingListController;
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

// Route::middleware('setLocale')->prefix('show')->group(function() {

//     Route::get('/videos', [VideoController::class, 'showVideos']);
//     Route::get('/video/{id}', [VideoController::class, 'showVideo']);
//     Route::get('/activevideos', [VideoController::class, 'showActiveVideos']);
//     Route::get('/heroes', [HeroController::class, 'showHeroes']);
//     Route::get('/hero/{id}', [HeroController::class, 'showHero']);
//     Route::get('/activeheroes', [HeroController::class, 'showActiveHeroes']);
//     Route::get('/addresses', [AddressController::class, 'showAddresses']);
//     Route::get('/address/{id}', [AddressController::class, 'showAddress']);
//     Route::get('/activeaddresses', [AddressController::class, 'showActiveAddresses']);
//     Route::get('/footers', [FooterController::class, 'showFooters']);
//     Route::get('/footer/{id}', [FooterController::class, 'showFooter']);
//     Route::get('/activefooters', [FooterController::class, 'showActiveFooters']);
//     Route::get('/actualities', [ActualityController::class, 'showActualities']);
//     Route::get('/actuality/{id}', [ActualityController::class, 'showActuality']);
//     Route::get('/activeactualities', [ActualityController::class, 'showActiveActualities']);
//     Route::get('/advantages', [AdvantageController::class, 'showAdvantages']);
//     Route::get('/advantage/{id}', [AdvantageController::class, 'showAdvantage']);
//     Route::get('/activeadvantages', [AdvantageController::class, 'showActiveAdvantages']);
//     Route::get('/calltoactions', [CallToActionController::class, 'showCallToActions']);
//     Route::get('/calltoaction/{id}', [CallToActionController::class, 'showCallToAction']);
//     Route::get('/activecalltoactions', [CallToActionController::class, 'showActiveCallToActions']);
//     Route::get('/headers', [HeaderController::class, 'showHeaders']);
//     Route::get('/header/{id}', [HeaderController::class, 'showHeader']);
//     Route::get('/activeheaders', [HeaderController::class, 'showActiveHeaders']);
//     Route::get('/links', [LinkController::class, 'showLinks']);
//     Route::get('/link/{id}', [LinkController::class, 'showLink']);
//     Route::get('/activelinks', [LinkController::class, 'showActiveLinks']);
//     Route::get('/mailinglist', [MailingListController::class, 'showMailingList']);
//     Route::get('/email/{id}', [MailingListController::class, 'showEmail']);
//     Route::get('/activemailinglist', [MailingListController::class, 'showActiveMailingList']);
//     Route::get('/reviews', [ReviewController::class, 'showReviews']);
//     Route::get('/review/{id}', [ReviewController::class, 'showReview']);
//     Route::get('/activereviews', [ReviewController::class, 'showActiveReviews']);
//     Route::get('/rooms', [RoomController::class, 'showRooms']);
//     Route::get('/room/{id}', [RoomController::class, 'showRoom']);
//     Route::get('/activerooms', [RoomController::class, 'showActiveRooms']);

// });

// Route::group(['prefix' => 'update'], function(){

//     Route::patch('/video/{id}', [VideoController::class, 'updateVideo']);
//     Route::patch('/hero/{id}', [HeroController::class, 'updateHero']);
//     Route::patch('/address/{id}', [AddressController::class, 'updateAddress']);
//     Route::patch('/footer/{id}', [FooterController::class, 'updateFooter']);
//     Route::patch('/actuality/{id}', [ActualityController::class, 'updateActuality']);
//     Route::patch('/advantage/{id}', [AdvantageController::class, 'updateAdvantage']);
//     Route::patch('/calltoaction/{id}', [CallToActionController::class, 'updateCallToAction']);
//     Route::patch('/header/{id}', [HeaderController::class, 'updateHeader']);
//     Route::patch('/link/{id}', [LinkController::class, 'updateLink']);
//     Route::patch('/email/{id}', [MailingListController::class, 'updateEmail']);
//     Route::patch('/review/{id}', [ReviewController::class, 'updateReview']);
//     Route::patch('/room/{id}', [RoomController::class, 'updateRoom']);

// });

// Route::group(['prefix' => 'delete'], function(){

//     Route::delete('/allvideos', [VideoController::class, 'deleteVideos']);
//     Route::delete('/video/{id}', [VideoController::class, 'deleteVideo']);
//     Route::delete('/allheroes', [HeroController::class, 'deleteHeroes']);
//     Route::delete('/hero/{hero}', [HeroController::class, 'deleteHero']);
//     Route::delete('/alladdresses', [AddressController::class, 'deleteAddresses']);
//     Route::delete('/address/{id}', [AddressController::class, 'deleteAddress']);
//     Route::delete('/allfooters', [FooterController::class, 'deleteFooters']);
//     Route::delete('/footer/{id}', [FooterController::class, 'deleteFooter']);
//     Route::delete('/allactualities', [ActualityController::class, 'deleteActualities']);
//     Route::delete('/actuality/{id}', [ActualityController::class, 'deleteActuality']);
//     Route::delete('/alladvantages', [AdvantageController::class, 'deleteAdvantages']);
//     Route::delete('/advantage/{id}', [AdvantageController::class, 'deleteAdvantage']);
//     Route::delete('/allcalltoactions', [CallToActionController::class, 'deleteCallToActions']);
//     Route::delete('/calltoaction/{id}', [CallToActionController::class, 'deleteCallToAction']);Route::get('/activecalltoactions', [CallToActionController::class, 'showActiveCallToActions']);
//     Route::delete('/link/{id}', [LinkController::class, 'deleteLink']);
//     Route::delete('/mailinglist', [MailingListController::class, 'deleteMailingList']);
//     Route::delete('/email/{id}', [usersMailingListControllerRoute::get('/activeactualities', [ActualityController::class, 'showActiveActualities']);::class, 'deleteEmail']);
//     Route::delete('/allreviews', [ReviewController::class, 'deleteReviews']);
//     Route::delete('/review/{id}', [ReviewController::class, 'deleteReview']);
//     Route::delete('/allrooms', [RoomController::class, 'deleteRooms']);
//     Route::delete('/room/{id}', [RoomController::class, 'deleteRoom']);
    
// });

// Route::group(['prefix' => 'create'], function(){

//     Route::post('/video', [VideoController::class, 'createVideo']);
//     Route::post('/hero', [HeroController::class, 'createHero']);
//     Route::post('/address', [AddressController::class, 'createAddress']);
//     Route::post('/footer', [FooterController::class, 'createFooter']);
//     Route::post('/actuality', [ActualityController::class, 'createActuality']);
//     Route::post('/advantage', [AdvantageController::class, 'createAdvantage']);
//     Route::post('/calltoaction', [CallToActionController::class, 'createCallToAction']);
//     Route::post('/header', [HeaderController::class, 'createHeader']);
//     Route::post('/link', [LinkController::class, 'createLink']);
//     Route::post('/email', [MailingListController::class, 'createEmail']);
//     Route::post('/review', [ReviewController::class, 'createReview']);
//     Route::post('/room', [RoomController::class, 'createRoom']);

// });


Route::middleware('setLocale')->group(function() {
    Route::get('/rooms/active', [RoomController::class, 'showActiveRooms']);
    Route::get('/reviews/active', [ReviewController::class, 'showActiveReviews']);
    Route::get('/mailinglists/active', [MailingListController::class, 'showActiveMailingList']);
    Route::get('/links/active', [LinkController::class, 'showActiveLinks']);
    Route::get('/headers/active', [HeaderController::class, 'showActiveHeaders']);
    Route::get('/advantages/active', [AdvantageController::class, 'showActiveAdvantages']);
    Route::get('/actualities/active', [ActualityController::class, 'showActiveActualities']);
    Route::get('/footers/active', [FooterController::class, 'showActiveFooters']);
    Route::get('/addresses/active', [AddressController::class, 'showActiveAddresses']);
    Route::get('/heroes/active', [HeroController::class, 'showActiveHeroes']);
    Route::get('/videos/active', [VideoController::class, 'showActiveVideos']);
    Route::apiResource("rooms", RoomController::class);
    Route::apiResource("actualities", ActualityController::class);
    Route::apiResource("heroes", HeroController::class);
    Route::apiResource("advantages", AdvantageController::class);
    Route::apiResource("calltoactions", CallToActionController::class);
    Route::apiResource("links", LinkController::class);
    Route::apiResource("videos", VideoController::class);
    Route::apiResource("reviews", ReviewController::class);
    Route::apiResource("headers", HeaderController::class);
    Route::apiResource("footers", FooterController::class);
    Route::apiResource("mailinglists", MailingListController::class);
});