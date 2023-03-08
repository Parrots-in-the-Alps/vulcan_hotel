<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Room;
use App\Http\Resources\ReservationCollection;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\RoomCollection;
use Illuminate\Support\Facades\Validator;

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

    public function showRoomAvailability(Request $request){
        //validators--validate data : https://laravel.com/docs/8.x/validation#manually-creating-validators
        //implement validator
        //extract data from request
        //implement availability algo
            //ckeck entry/exitdates not in reservated intervals
            //return array of  reservedroomIds
            //return roomid in roomtable not in reserved roomIds array
            //compare roomType requested by customer vs available roomIds (room objects)
            //fill arrays
        //response : 2 arrays 1-customer request: 2 -available other products (json)

        $validator = Validator::make($request->all(),[
            'entryDate' => 'required',
            'exitDate' => 'required',
            'roomType' => 'required'
        ]);

        $validated_details = $validator->validated();

       $bookedReservations = Reservation::whereBetween('entryDate',[$validated_details['entryDate'],$validated_details['exitDate']])
       ->orWhereBetween('exitDate',[$validated_details['entryDate'],$validated_details['exitDate']]);
        
        $bookedRooms = array();

        foreach($bookedReservations as $reservation){
            $bookedRooms[$reservation['roomId']];
        }
        
        $availableRooms= new RoomCollection(Room::whereNotIn('id',$bookedRooms));
            
        $availableRequestedRoomType = array();
        $availableSuggestedRoomType = array();
        
        foreach($availableRooms as $room){
            if($room['roomType'] === $validated_details['roomType']){
                $availableRequestedRoomType($room['id']);
            }
            if(!array_search($room['roomType'], $availableSuggestedRoomType,true)){
                $availableSuggestedRoomType($room['roomType']);
            }
        }

        return response()->json($availableRequestedRoomType, $availableSuggestedRoomType);
    }




}
