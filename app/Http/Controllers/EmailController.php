<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Room;

class EmailController extends Controller
{
    public function mail()
    {
        $room = Room::findOrFail(1);

        Mail::to('theocolombel@gmail.com')->send(new TestMail($room));
        return 'Email was sent';
    }
}
