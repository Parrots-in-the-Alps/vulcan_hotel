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

    public function showActiveRooms()
    {
        return new RoomCollection(Room::where('isActive',1)->get());
    }

    public function updateRoom(Request $request, $id)
    {
        $rooms_input = $request->input();
        $room = Room::where(['id' => $id])
            ->firstOrFail();
        $room
            ->setTranslations('name', $rooms_input['name'])
            ->setTranslations('description', $rooms_input['description'])
            ->setTranslations('type', $rooms_input['type'])
            ->setTranslations('status', $rooms_input['status'])
            ->save();
        $room->updateOrFail($rooms_input);
            
        return new RoomResource($room);
    }

    public function deleteRooms()
    {
        Room::truncate();

        return response()->json(['description' => 'Rooms delete'], 200);
    }

    public function deleteRoom($id)
    {
        Room::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Room delete'], 200);
    }

    public function createRoom(Request $request)
    {
        $rooms_input = $request->input();

        $room = new Room();
        $room->number = $rooms_input['number'];
        $room->capacity = $rooms_input['capacity'];
        $room->price = $rooms_input['price'];
        $room->image = $rooms_input['image'];
        $room
        ->setTranslations('name', $rooms_input['name'])
        ->setTranslations('description', $rooms_input['description'])
        ->setTranslations('type', $rooms_input['type'])
        ->setTranslations('status', $rooms_input['status'])
            ->save();

        return new RoomResource($room);
    }
}
