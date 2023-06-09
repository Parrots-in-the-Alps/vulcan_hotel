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
use Carbon\Carbon;

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
            //ckeck entry/exitdates not in booked intervals
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
        
        $bookedReservations = Reservation::all();
        //dd($bookedReservations);

        $validatedEntryDate = $validated_details['entryDate'];
        $validatedExitDate = $validated_details['exitDate'];
        //$bookedReservations = $bookedReservations->whereBetween('entryDate',[$validated_details['entryDate'],$validated_details['exitDate']]);
        $bookedReservations = $bookedReservations->filter(function ($item) use ($validatedEntryDate,$validatedExitDate) {
            return (
                (
                    $item->entryDate >= $validatedEntryDate
                    && $item->entryDate <= $validatedExitDate
                )
                ||
                (
                    $item->exitDate >= $validatedEntryDate
                    && $item->exitDate <= $validatedExitDate
                )
                ||
                (
                    $validatedEntryDate >= $item->entryDate
                    && $validatedEntryDate <= $item->exitDate

                )
                ||
                (
                    $validatedExitDate >= $item->entryDate
                    && $validatedExitDate <= $item->exitDate
                )
            );
        });
    //    $bookedReservations = Reservation::whereBetween('entryDate',[$validated_details['entryDate'],$validated_details['exitDate']])
    //    ->orWhereBetween('exitDate',[$validated_details['entryDate'],$validated_details['exitDate']]);
        
        $bookedRooms = array();
        //dd($bookedReservations);

        foreach($bookedReservations as $reservation){
            //dd($reservation['room_id']);
            array_push($bookedRooms, $reservation['room_id']);
        }

        //dd($bookedRooms);
        
        $availableRooms= Room::all()->whereNotIn('id',$bookedRooms);

        //dd($availableRooms);
        
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
        //dd($availableRequestedRoomType);

        return response()->json(["type" => $availableRequestedRoomType,"suggested" => $availableSuggestedRoomType]);
    }

    public function isReservationValide(Request $request){ 
        $validator = Validator::make($request->all(),[
            'reservation_id' => 'required',
        ]);

        $validatedInfo = $validator -> validated();

        $reservationId = $validatedInfo['reservation_id'];

        $reservation = Reservation::where('id', $reservationId)->first();
        // dd($reservation);

        if($reservation == null){
            return response()->json(['status'=> 'N° de reservation invalide', 'reservation'=> ""], 403);
        }

        $presentDate = Carbon::today()->format('m/d/Y');
        // dd($presentDate);

        $dateIn = $reservation->entryDate;
        // dd($dateIn);

        $dateOut = $reservation->exitDate;
        // dd($dateOut);

        $checkinTodayOk = $presentDate >= $dateIn;
        // dd($todayEntryOk);

        $todayBeforeCheckOut = $presentDate < $dateOut;
        // dd($todayBeforeCheckin);

        if(!$presentDate || !$todayBeforeCheckOut){
            return response()->json(['status'=> 'Les dates de la reservation sont invalides', 'reservation'=> ""], 403);
        }
        // dd($reservation->checked_in);
        $checkedInNotNull = $reservation->checked_in == null ;
        // dd($checkedInNotNull);

        if(!$checkedInNotNull){
            return response()->json(['status'=> 'La réservation à déjà été validée', 'reservation'=> ""], 403);
        }
        
        return response()->json(['status'=> 'La réservation est valide', 'reservation'=>$reservation], 203);
    }

    public function validateReservation(Request $request){ 
        $validator = Validator::make($request->all(),[
            'reservation_id' => 'required',
            'room_id' => 'required'
        ]);

        $validated = $validator->validated();

        $reservationId = $validated['reservation_id'];
        $roomId = $validated['room_id'];

        $checkedInAt = Carbon::now();

        Reservation::where('id', $reservationId)
                        ->update(['checked_in'=> $checkedInAt]);

        $nfc_tag = bin2hex(random_bytes(22));
        
        return response()->json(['staus'=> 'Réservation validée', 'nfc_tag'=>$nfc_tag], 203);
    }

}
