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
use Illuminate\Support\Facades\DB;

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
        $access_input = $request->input();
        //dd($access_input);

        $access = new Access();
        
        $access->create($access_input);
        

        return response()->json(['description' => 'access created'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reservation_id)
    {
        //dd($reservation_id);
        return new AccessCollection(Access::where('reservation_id', $reservation_id)->get());
    }

    public function getFirstAccess(Request $request){
        //dd($request->all());
        $reservation_id = $request['reservation_id'];
        //dd($reservation_id);
        //dd($reservation_id);Access::where('reservation_id', $reservation_id)
        //->oldest();
        $access = DB::table('accesses')
            ->where('reservation_id','=',$reservation_id)
            ->orderBy('created_at','asc')
            ->first();
        return response()->json(['reservation'=> $access->reservation_id, 'room'=> $access->room_id, 'accessed_at'=>$access->created_at], 200);
        //dd($access);
        
        // $reservation = $access -> reservation_id;
        // $room = $access->room_id;
        // $accessedAt = $access->created_at;        

        // return response()-> json(['reservation_id'=> $reservation, 'room' => $room, 'first access' => accessedAt],200);

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
    public function destroy($id)
    {
        Access::where(['id'=>$id])
            ->delete();
        
            return response()->json(['description' => 'access deleted'], 200);
    }

    public function deleteAccesses(){
        Access::truncate();
        return response()->json(['description' => 'All accesses cleared'], 200);
    }
}
