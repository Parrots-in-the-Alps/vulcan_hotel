<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lock;
use App\Models\Access;
use App\Models\Reservation;
use App\Http\Resources\LockCollection;
use Illuminate\Support\Facades\Validator;

class LockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LockCollection(Lock::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lock_input = $request->input();
        // dd($lock_input);

        $lock = new Lock();
        
        $lock->create($lock_input);
        

        return response()->json(['description' => 'lock created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkCardCounter(Request $request){
        $validator = Validator::make($request->all(),[
            'room_id' => 'required'
        ]);
        $validatedAttributes = $validator->validated();

        $validated = $validator->validated();

        $roomId = $validated['room_id'];

        $lock = Lock::where('room_id', $roomId)->first();

        if(!$lock->card_counter < 2){
            return response()->json(['staus'=>'Nombre maximun de cartes atteint'], 403);
        }

        return response()->json(['status'=>'ok'], 203);

    }

    public function setNfcTag(Request $request){
        $validator = Validator::make($request->all(),[
            'nfc_tag' => 'required',
            'room_id' => 'required'
        ]);
        $validatedAttributes = $validator->validated();

        $nfcTag = $validatedAttributes['nfc_tag'];
        $roomId = $validatedAttributes['room_id'];

        $lock = Lock::where('room_id',$roomId)->first();

        if($lock == null){
            return response()->json(['status'=>'serrure inexistante'], 403);
        }
        
        $update = $lock->update(['nfc_tag'=>$nfcTag, 'card_counter'=> 1]);

        if(!$update){
            return response()->json(['status' => 'erreur lors de l\'enregistrement'], 403);
        }

        return response()->json(['status' => 'serrure ok !'], 203);
    }

    public function openNaaNoor(Request $request){
        $validator = Validator::make($request->all(),[
            'nfc_tag' => 'required',
            'reservation_id' => 'required'
        ]);

        $validated = $validator->validated();

        $roomId = $roomId = Reservation::where('id', $validated['reservation_id'])->first()->room_id;
        $nfcTag = $validated['nfc_tag'];
        $reservationId = $validated['reservation_id'];
        
        $lock = Lock::where('room_id', $roomId)->first();
        
        if($lock == null){
            return response()->json(['status'=> 'serrure inexistante'],403);
        }

        $tagVerified = $nfcTag == $lock->nfc_tag;

        if(!$tagVerified){
            return response()->json(['status'=> 'erreur'], 403);
        }

        Access::create(['room_id'=>$roomId, 'reservation_id'=>$reservationId]);

        return response()->json(['status'=> 'open naa noor !'], 203);
    }
}
