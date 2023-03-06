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
        $reservation_input = $request->input();

        $reservation = new Reservation();
        $reservation->user = $reservation_input['user_id'];
        $reservation->isDue = $reservation_input['isDue'];
        $reservation->room = $reservation_input['room_id'];
        $reservation->services = $reservation_input['services'];
        $reservation->entryDate = $reservation_input['entry_date'];
        $reservation->exitDate = $reservation_input['exit_date'];
        return new ReservationResource($reservation);
    }

    public function update(Request $request, $id)
    {
    
        $input = $request->input();
        Reservation::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'reservation updated successfully!'], 200);
    }

    public function deleteReservations()
    {
        Reservation::truncate();

        return response()->json(['description' => 'Reservations deleted'], 200);
    }

    public function destroy($id)
    {
        Reservation::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Reservation delete'], 200);
    }




}
