<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Room;
use App\Http\Resources\AccessCollection;
use App\Http\Resources\AccessResource;
//use App\Http\Resources\RoomCollection;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AccessCollection(Access::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $access_input = $request->input;

        $access = new Access();
        $access->create($access_input);

        return new AccessResource($access);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reservation_id)
    {
        return AccessCollection(Access::where('reservation_id', $reservation_id));
    }

    public function getFirstAccess($reservation_id){


        $access = Access::where(['reservation_id' => $reservation_id])
                            ->oldest();
        $reservation = $access -> reservation_id;
        $room = $access->room_id;
        $accessedAt = $access->created_at
        

        return response()-> json('reservation_id'=> );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //anallowed
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //unallowed
    // }

    public function deleteAccesses(){
        Access::truncate();
        return response()->json(['description' => 'All accesses cleared'], 200);
    }
}
