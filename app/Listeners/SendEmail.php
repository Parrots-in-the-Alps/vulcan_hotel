<?php

namespace App\Listeners;

use App\Event\UserCreated;
use App\Mail\InscriptionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail
{

    public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $user;
       
        
        $user = $event->user;
        Mail::to($user->email)->send(new InscriptionMail($user));
    }
}
