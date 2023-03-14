<?php

namespace App\Mail;

use GuzzleHttp\Client;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecapMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $client = new Client();
        $weather = $client->get('https://api.open-meteo.com/v1/forecast?latitude=45.91&longitude=6.13&current_weather=true');
        $response = json_decode($weather->getBody());

        $files = Storage::disk('s3')->allFiles('weather-icons');
        $urls = [];
        foreach ($files as $file) {
            $path = Storage::disk('s3')->path($file);
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $url = Storage::disk('s3')->temporaryUrl($path, now()->addHour(72));
            $urls[$filename] = $url;
        }


        return $this->view('email.recapmail')
                    ->subject('séjour dans 1 semaine')
                    ->with([
                        'reservation' => $this->reservation,
                        'temperature' => $response,
                        'urls' => $urls,
                        
        ]);
    }
}
