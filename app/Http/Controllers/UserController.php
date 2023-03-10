<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function info()
    {
        $user = Auth::user();
        return response()->json($user);
    }
}
