<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sample_room;
use App\Http\Resources\SampleRoomCollection;
use App\Http\Resources\SampleRoomResource;

class SampleRoomController extends Controller
{
    public function index()
    {
        return new SampleRoomCollection(Sample_room::all());
    }

    public function show($id)
    {
        $room = Sample_room::where(['id' => $id])
            ->firstOrFail();

        return new SampleRoomResource($room);
    }

    public function showActiveSampleRooms()
    {
        return new SampleRoomCollection(Sample_room::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        // $rooms_input = $request->input();
        // $room = Room::where(['id' => $id])
        //     ->firstOrFail();
        // $room
        //     ->setTranslations('name', $rooms_input['name'])
        //     ->setTranslations('description', $rooms_input['description'])
        //     ->setTranslations('type', $rooms_input['type'])
        //     ->setTranslations('status', $rooms_input['status'])
        //     ->save();
        // $room->updateOrFail($rooms_input);

        $input = $request->input();
        Sample_room::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'room updated successfully!'], 200);
    }

    public function deleteRooms()
    {
        Sample_room::truncate();

        return response()->json(['description' => 'Rooms delete'], 200);
    }

    public function destroy($id)
    {
        Sample_room::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Room delete'], 200);
    }

    public function store(Request $request)
    {
        $rooms_input = $request->input();

        $room = new Sample_room();
        $room->capacity = $rooms_input['capacity'];
        $room->price = $rooms_input['price'];
        $room->image = $rooms_input['image'];
        $room
        ->setTranslations('name', $rooms_input['name'])
        ->setTranslations('description', $rooms_input['description'])
        ->setTranslations('type', $rooms_input['type'])
            ->save();

        return new SampleRoomResource($room);
    }
}
