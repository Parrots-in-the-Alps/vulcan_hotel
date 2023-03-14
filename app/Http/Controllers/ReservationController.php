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

        $resa = new Reservation();
        $resa->create($reservation_input);

        return new ReservationResource($resa);
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
            'type' => 'required'
        ]);

        $validated_details = $validator->validated();

       $bookedReservations = Reservation::whereBetween('entryDate',[$validated_details['entryDate'],$validated_details['exitDate']])
       ->orWhereBetween('exitDate',[$validated_details['entryDate'],$validated_details['exitDate']]);
        
        $bookedRooms = array();

        foreach($bookedReservations as $reservation){
            $bookedRooms[$reservation['room_id']];
        }
        
        $availableRooms= Room::all()->whereNotIn('id',$bookedRooms);
        
        $availableRequestedRoomType = array();
        $availableSuggestedRoomType = array();
        
        foreach($availableRooms as $room){
           
            if($room['type'] === $validated_details['type']){
                array_push($availableRequestedRoomType,$room);
            }else{
                $count = 0;
               foreach($availableSuggestedRoomType as $suggested){
                if($room['type'] === $suggested['type']){
                    $count++;
                }
               }
               if($count == 0){
                array_push($availableSuggestedRoomType,$room);
               }    
            }
        }

        return response()->json(["type" => $availableRequestedRoomType,"suggested" => $availableSuggestedRoomType]);
    }

}
