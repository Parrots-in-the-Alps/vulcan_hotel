<?php


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Mail\HelloEmail;
use App\Http\Controllers\EmailController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hew/{test}', function ($test = null) {
    return $test;
});

Route::get('send/email', [EmailController::class, 'mail']);

