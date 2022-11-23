<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    public function showRooms()
    {
        return new RoomCollection(Room::all());
    }

    public function showRoom($id)
    {
        $room = Room::where(['id' => $id])
            ->firstOrFail();
        return new RoomResource($room);
    }

    public function createRoom(Request $request)
    {
        $input = $request->input();
        $room = new Room();
        $room->number = $input['number'];
        $room->capacity = $input['capacity'];
        $room->price = $input['price'];
        $room->image = $input['image'];
        $room->setTranslations('name', $input['name'])
            ->setTranslations('type', $input['type'])
            ->setTranslations('status', $input['status'])
            ->setTranslations('description', $input['description'])
            ->save();

        return new RoomResource($room);
    }

    public function updateRoom(Request $request, $room)
    {
        $input = $request->input();
        $room = Room::where(['id' => $room])
            ->firstOrFail();
        $room->updateOrFail(
            $input
        );
        return new RoomResource($room);
    }


    public function deleteRoom(Room $room)
    {
        $room->delete();
        return response()->json(['description' => 'Room delete'], 200);
    }

    public function deleteRooms()
    {
        Room::truncate();
        return response()->json(['description' => 'Rooms delete'], 200);
    }
}
