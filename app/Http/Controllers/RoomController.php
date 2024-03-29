<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use App\Models\Lock;

class RoomController extends Controller
{
    public function index()
    {
        return new RoomCollection(Room::all());
    }

    public function show($id)
    {
        $room = Room::where(['id' => $id])
            ->firstOrFail();

        return new RoomResource($room);
    }

    public function showActiveRooms()
    {
        return new RoomCollection(Room::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        Room::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'room updated successfully!'], 200);
    }

    public function deleteRooms()
    {
        Room::truncate();

        return response()->json(['description' => 'Rooms delete'], 200);
    }

    public function destroy($id)
    {
        Room::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Room delete'], 200);
    }

    public function store(Request $request)
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
            ->save();

        $roomId = ['room_id'=> $room->id];

        $lock = new Lock();
        $lock->create($roomId);

        return new RoomResource($room);
    }
}
