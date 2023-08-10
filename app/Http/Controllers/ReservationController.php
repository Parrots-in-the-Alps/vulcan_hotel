<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Room;
use App\Models\User;
use App\Models\Lock;
use App\Http\Resources\ReservationCollection;
use App\Http\Resources\LockCollection;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ItemNotFoundException;
use Carbon\Carbon;
use App\Mail\RecapMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Access;

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
    
    // Récupérer l'utilisateur associé à la réservation
    $user = Auth::user();

    $resa = new Reservation();
    $resa->user()->associate($user); // Associer l'utilisateur à la réservation
    $resa->fill($reservation_input);
    $resa->save();

    // Envoi de l'e-mail de confirmation
    //Mail::to($user->email)->send(new RecapMail($resa));

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

        $userId = $reservation->user_id;
        $user = User::where('id', $userId)->first();

        $roomId = $reservation->room_id;
        $room = Room::where('id', $roomId)->first();

        $presentDate = Carbon::today()->format('Y-m-d');
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

        $resaId = $reservation->id;
        $resaDateIn = $reservation->entryDate;
        $resaDateOut = $reservation->exitDate;
        $resaRoomType = $room->type;
        $resaRoomNumber = $room->number;
        $resaRoomId = $room->id;
        $resaUserName = $user->name;
        $resaNfcTag = "";
        $resaCheckedIn = $reservation->checked_in;
        $resaCardCounter = "";

        $formatedReservation['id'] =$resaId;
        $formatedReservation['dateIn'] = $resaDateIn;
        $formatedReservation['dateOut'] = $resaDateOut;
        $formatedReservation['userName']= $resaUserName;
        $formatedReservation['nfcTag'] = $resaNfcTag;
        $formatedReservation['checkedIn'] = $resaCheckedIn;
        $formatedReservation['room']['type'] = $resaRoomType;
        $formatedReservation['room']['number'] = $resaRoomNumber;
        $formatedReservation['room']['ActiveCards'] = $resaCardCounter;
        $formatedReservation['room']['roomId'] = $resaRoomId;

        $reservations = array();
        array_push($reservations, $formatedReservation);
        
        return response()->json(['status'=> 'La réservation est valide', 'reservations'=>$reservations], 203);
    }

    public function validateReservation(Request $request){ 
        $validator = Validator::make($request->all(),[
            'reservation_id' => 'required'
        ]);

        $validated = $validator->validated();

        $reservationId = $validated['reservation_id'];

        $checkedInAt = Carbon::now();

        Reservation::where('id', $reservationId)
                        ->update(['checked_in'=> $checkedInAt]);

        $nfc_tag = bin2hex(random_bytes(22));
        
        return response()->json(['status'=> 'Réservation validée', 'nfc_tag'=>$nfc_tag], 203);
    }

    public function getRollingReservations(Request $request){
        $validator = Validator::make($request->all(),[
            'checkedIn_resa' => 'required'
        ]);

        $validated = $validator->validated();

        $checkedInResa = $validated['checkedIn_resa'];

        $presentDate = Carbon::today()->format('Y-m-d');
        

        $bookedReservations = Reservation::all();

        if($checkedInResa == "true"){
            $bookedReservations = $bookedReservations->filter(function ($item) use ($presentDate) {
   
                return (
                    (
                        $item->entryDate <= $presentDate
                        && $item->exitDate >= $presentDate
                    )
                    &&
                    (
                        $item->checked_in != null
                    )
                   
                );
            });
        }else{
            $bookedReservations = $bookedReservations->filter(function ($item) use ($presentDate) {
   
                return (
                    (
                        $item->entryDate <= $presentDate
                        && $item->exitDate >= $presentDate
                    )
                   
                );
            });
        }

        

        $rollingReservations = array();
        //  dd($bookedReservations);

        foreach($bookedReservations as $reservation){
            // dd($reservation);
            $roomId = $reservation->room_id;
            $userId = $reservation->user_id;
            // dd($reservation->id);

            $user = User::where('id', $userId)->first();

            $room = Room::where('id',$roomId)->first();

            $lock = Lock::where('room_id',$roomId)->first();
            // dd($lock);

            $resaId = $reservation->id;
            // dd({s})
            $resaDateIn = $reservation->entryDate;
            $resaDateOut = $reservation->exitDate;
            $resaRoomType = $room->type;
            $resaRoomNumber = $room->number;
            $resaRoomId = $room->id;
            $resaUserName = $user->name;
            $resaNfcTag = $lock->nfc_tag;
            $resaCheckedIn = $reservation->checked_in;
            $resaCardCounter = $lock->card_counter;

            $formatedReservation['id'] =$resaId;
            $formatedReservation['dateIn'] = $resaDateIn;
            $formatedReservation['dateOut'] = $resaDateOut;
            $formatedReservation['userName']= $resaUserName;
            $formatedReservation['nfcTag'] = $resaNfcTag;
            $formatedReservation['checkedIn'] = $resaCheckedIn;
            $formatedReservation['room']['type'] = $resaRoomType;
            $formatedReservation['room']['number'] = $resaRoomNumber;
            $formatedReservation['room']['ActiveCards'] = $resaCardCounter;
            $formatedReservation['room']['roomId'] = $resaRoomId;

            array_push($rollingReservations, $formatedReservation);
        }
        
        if(empty($rollingReservations)){
            return response()->json(['status'=>'Aucune réservations'], 403);
        }

        return response()->json(['status'=> 'ok','reservations'=>$rollingReservations], 203);
    }


    public function getReservationsOnDates(Request $request) {
        $startDate = $request->input('entryDate');
        $endDate = $request->input('exitDate');
        

        if (!$startDate || !$endDate || !strtotime($startDate) || !strtotime($endDate)) {
            return response()->json(['message' => 'Bad Request invalid date range format'], 400);
        }


        $reservations = Reservation::where(function ($query) use ($startDate, $endDate) {
            $query->whereBetween('entryDate', [$startDate, $endDate])
                ->orWhereBetween('exitDate', [$startDate, $endDate]);
        })
        ->with(['room', 'access'])
        ->get();
        

        if ($reservations->isEmpty()) {
            return response()->json(['message' => 'Not Found. No reservations found for the given date range.'], 404);
        }

        $transformedReservations = $reservations->map(function ($reservation) {
            $serviceIds = $reservation->service_id;
            $services = Service::whereIn('id', $serviceIds)->get();

           
        
            $transformedServices = $services->map(function ($service) {
                return [
                    'id' => $service->id,
                    'serviceName' => $service->title, 
                    'servicePrice' => $service->price,
                    'billingType' => $service->billing_type
                ];
            });

            $ping = Carbon::parse($reservation->entryDate);
            $pong = Carbon::parse($reservation->exitDate);
            $reservationDuration = $ping->diffInDays($pong);
        
            return [
                'id' => $reservation->id,
                'entryDate' => $reservation->entryDate,
                'exitDate' => $reservation->exitDate,
                'user_id' => $reservation->user_id,
                'isDue' => $reservation->isDue,
                'duration' => $reservationDuration,
                'created_at' => $reservation->created_at,
                'updated_at' => $reservation->updated_at,
                'checked_in' => $reservation->checked_in,
                'room' => [
                    'id' => $reservation->room_id,
                    'roomNumber' => $reservation->room->number,
                    'roomType' => $reservation->room->type,
                    'roomPrice' => $reservation->room->price,

                ],
                'access' =>[
                    'premiere_ouverture' => $reservation->access->isEmpty() ? null : $reservation->access[0]->created_at,

                ],
                'services' => $transformedServices,
            ];
            
        });
            
        return response()->json(['message' => $transformedReservations], 200);
        }

        //TODO
        //Refacto->eclater
        public function getOpsDashBoardData(){
            //date du jour
            $todayDate = Carbon::today()->format('Y-m-d');

            //récupérer les cartes
            $accessCards = new LockCollection(Lock::all());
            $totalAccessCards = count($accessCards)*2;
            $distributedCards = 0;
            //boucler -> cartes en circulation
            foreach($accessCards as $accessCard){
                    $distributedCards += $accessCard->card_counter;
                }

            //récuper les chambres
            $rooms = new RoomCollection(Room::all());
                //boucler et sommer capacity->capacité d'accueil.
            $hotelCapacity = 0;
            $roomIds = [];
            foreach($rooms as $room){
                $hotelCapacity += $room->capacity;
                array_push($roomIds, $room->id);
            }

            //récupérer les reservations dont les dates entree sortie englobe date du jour
            $reservations = Reservation::where('entryDate', '<=', $todayDate)
            ->where('exitDate', '>=', $todayDate)
            ->with(['room','access','user'])
            ->get();

            //clients présents dans l'hotel
            $clientInHotel = 0;
            foreach($reservations as $reservation){
                $clientInHotel += $reservation['guest_number'];
            }
            
                //recuperer les reservations commançant ce jour même
            $todayReservations = $reservations->filter(function ($item) use ($todayDate) {
                return ($item->entryDate === $todayDate);
            });
            
            //nombre de check-in prevus
            $todayCheckins = count($todayReservations);
            // nombre de checkins réalisés + formattage pour calculs temps accueil + checkin/heure
            $todayCheckedins = 0 ;
            $checkinAnalysis = [];
            foreach($todayReservations as $reservation){
                if($reservation->checked_in != null){
                    $todayCheckedins ++;
                    
                    $reservationCheckedInAt = $reservation['checked_in'];

                    $reservationFirstAccess = count($reservation->access) > 0 ?
                       strval($reservation->access[0]['created_at']) :
                        "";
                        
                    $reservationNumber = $reservation['id'];

                    $titi['checkedinAt'] = $reservationCheckedInAt;
                    $titi['FirstAccess'] = $reservationFirstAccess;
                    $titi['reservationId'] = $reservationNumber;

                    array_push($checkinAnalysis, $titi);
                }
               
            }
             //recupérer les chambres occupées ce jour->exit date => libérée le
            $checkedInReservations = $reservations->filter(function ($item){
                return ($item->checked_in != null);
            });
                    //récupérer les room ids
            $occupiedRoomsIds = [];
            foreach($checkedInReservations as $reservation){
                array_push($occupiedRoomsIds, $reservation->room_id);
            }
                //comparer avec la table room
                //récupérer les id ne figurant pas dans les résa
            $availableRoomIds = array_diff($roomIds, $occupiedRoomsIds);
            //récupérer les chambres correspondantes->chambres disponibles

            //récupérer les prochaines réservations pour ces chambres->prochaine occupation
            $futureReservations =  Reservation::where('entryDate', '>', $todayDate)
            ->whereIn('room_id',$availableRoomIds)
            ->with(['room'])
            ->orderBy('entryDate')
            ->get();
            
            $totoRooms = [];
            foreach($availableRoomIds as $id){
                try{

                    $resa = $futureReservations->where('room_id', $id)
                        ->firstOrfail();
                    
                    $roomNumber = $resa->room['number'];
                    $roomType = $resa->room['type'];
                    $roomOccupied = $resa['entryDate'];
                    
                    $toto['number'] = $roomNumber;
                    $toto['type'] = $roomType;
                    $toto['occupiedOn'] = $roomOccupied;


                    array_push($totoRooms, $toto);
                    
                }catch(ItemNotFoundException $e){
                    $moor = $rooms->where('id', $id)
                        ->first();

                    $roomNumber = $moor['number'];
                    $roomType = $moor['type'];
                    $roomOccupied = "";
                    
                    $toto['number'] = $roomNumber;
                    $toto['type'] = $roomType;
                    $toto['occupiedOn'] = $roomOccupied;

                    array_push($totoRooms, $toto);
                }
            }
            usort($totoRooms, function($a, $b){
                return $a['number'] > $b['number'];
            });

            //chambres occupées
            $tutuRooms = [];
            foreach($checkedInReservations as $reservation){
                $client = $reservation->user['name'];
                $roomNumber = $reservation->room['number'];
                $roomType = $reservation->room['type'];
                $freeOn = $reservation['exitDate'];

                $tutu['number'] = $roomNumber;
                $tutu['type'] = $roomType;
                $tutu['freeOn'] = $freeOn;
                $tutu['client'] = $client;

                
                array_push($tutuRooms, $tutu);
            }

            usort($tutuRooms, function($a, $b){
                return $a['number'] > $b['number'];
            });

            //reservation to check-in this day
            $toChekinReservations = $todayReservations->filter(function ($item){
                return $item->checked_in === null;
            });
            //format  
            $tata = [];
            foreach($toChekinReservations as $reservation){
                $resaId = $reservation['id'];
                $resaClient = $reservation->user['name'];
                $resaRoomNumber = $reservation->room['number'];
                $resaRoomType = $reservation->room['type'];

                $aser['id'] = $resaId;
                $aser['client'] = $resaClient;
                $aser['roomNumber'] = $resaRoomNumber;
                $aser['roomType'] = $resaRoomType;

                array_push($tata, $aser);
            }

            usort($tata, function($a, $b){
                return $a['id'] > $b['id'];
            }); 

            $opsData['resaToCheckin'] = $tata;
            $opsData['occupiedRooms'] = $tutuRooms;
            $opsData['availableRooms'] = $totoRooms;
            $opsData['checkinStats'] = $checkinAnalysis;
            $opsData['todayCheckins'] = $todayCheckins;
            $opsData['todayCheckedins'] = $todayCheckedins;
            $opsData['totalAccessCards'] = $totalAccessCards;
            $opsData['distributedCards'] = $distributedCards;
            $opsData['customerCapacity'] = $hotelCapacity;
            $opsData['clientInHotel'] = $clientInHotel;

            return response()->json(['message' => $opsData], 200);
        }


        public function getReservationsByMonths(Request $request) {
            $precedently_month = $request->input('precedently_month');
            $currently_month = $request->input('currently_month');
    
            $precedingMonth = Carbon::createFromFormat('m/d/Y', $precedently_month);
            $currentMonth = Carbon::createFromFormat('m/d/Y', $currently_month);
            
            $reservations = [
                'precedently_month' => Reservation::whereBetween('entryDate', [
                    $precedingMonth->copy()->startOfMonth(),
                    $precedingMonth->copy()->endOfMonth(),
                ])->with(['room', 'access'])->get(),
                'currently_month' => Reservation::whereBetween('entryDate', [
                    $currentMonth->copy()->startOfMonth(),
                    $currentMonth->copy()->endOfMonth(),
                ])->with(['room', 'access'])->get(),
            ];
    
            if ($reservations['precedently_month']->isEmpty() && $reservations['currently_month']) {
                return response()->json(['message' => 'Not Found. No reservations found for the given date range.'], 404);
            }
    
            for($i = 0; $i < count($reservations['precedently_month']); $i++) {
                $serviceIds = $reservations['precedently_month'][$i]->service_id;
                $services = Service::whereIn('id', $serviceIds)->get();
    
                $transformedServices = $services->map(function ($service) {
                    return [
                        'id' => $service->id,
                        'serviceName' => $service->title, 
                        'servicePrice' => $service->price,
                    ];
                });
    
                $reservations['precedently_month'][$i]->services = $transformedServices;
            }
    
            for($i = 0; $i < count($reservations['currently_month']); $i++) {
                $serviceIds = $reservations['currently_month'][$i]->service_id;
                $services = Service::whereIn('id', $serviceIds)->get();
    
                $transformedServices = $services->map(function ($service) {
                    return [
                        'id' => $service->id,
                        'serviceName' => $service->title, 
                        'servicePrice' => $service->price,
                    ];
                });
    
                $reservations['precedently_month'][$i]->services = $transformedServices;
            }
    
            // ATTENTION ici il fallait utiliser ->copy() car sinon il remplace la valeur fourni (->startOfMonth()), donc la suite de la plage n'est plus bonne
    
            return response()->json(['reservations' => $reservations]);
        }
}