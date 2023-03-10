<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Room;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $room;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.testmail')
                    ->subject('Récapitulatif de commande')
                    ->with([
                        'room' => $this->room
        ]);
    }
}
