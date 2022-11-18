<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;

class RoomController extends Controller
{
    public function showRooms() { 
        return response()->json(['room' => Room::all(), 'description' => 'OK'], 200);
    }

    public function showRoom($id){
         return response()->json(['room' => Room::find($id), 'description' => 'OK'], 200);
    }

    public function createRoom(Request $request){
    $input = $request->input();
    $room = Room::create(
        $input
    );
    return response()->json(['message' => 'Room created successfully!'], 200);
}

public function updateRoom(Request $request, $room){
    $input = $request->input();
        $room = Room::where('id', $room)->update(
            $input
        );
    return response()->json(['message' => 'Room updated successfully!'], 200);
}


public function deleteRoom(Room $room){
    $room->delete();
    return response()->json(['description' => 'Room delete'], 200);
}

public function deleteRooms(){
    Room::truncate();
    return response()->json(['description' => 'Rooms delete'], 200);
}
}
