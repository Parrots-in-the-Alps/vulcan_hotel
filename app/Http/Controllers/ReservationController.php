<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Room;
use App\Http\Resources\ReservationCollection;
use App\Http\Resources\ReservationResource;

class ReservationController extends Controller
{
    public function index()
    {
        return new ReservationCollection(Reservation::all());
    }

    public function show($id)
    {
        $reservation = Reservation::where(['id' => $id])
            ->firstOrFail();

        return new ReservationResource($reservation);
    }

    public function store(Request $request)
    {
        // $reservation_input = $request->input();

        // $reservation = new Reservation();
        // $reservation->number = $reservation_input['number'];
        // $reservation->capacity = $reservation_input['capacity'];
        // $reservation->price = $reservation_input['price'];
        // $reservation->image = $reservation_input['image'];
        // return new ReservationResource($reservation);
    }




}
