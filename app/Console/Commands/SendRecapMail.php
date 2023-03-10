<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\RecapMail;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRecapMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {
        $reservations = Reservation::all();
        echo("coucou");
        foreach($reservations as $reservation){
            if(Carbon::parse($reservation->entryDate)->diffInDays(Carbon::now()->format('m/d/Y')) == 7){ //Or however your date field on user is called
                Mail::to($reservation->user->email)->send(new RecapMail($reservation));
            }
    }
}
}
