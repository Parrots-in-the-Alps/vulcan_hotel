<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActualityCollection;
use App\Http\Resources\ActualityResource;
use App\Models\Actuality;
use Illuminate\Http\Request;

class ActualityController extends Controller
{
    public function showActualities()
    {
        return new ActualityCollection(Actuality::all());
    }

    public function showActuality($id)
    {
        return response()->json(['actuality' => Actuality::find($id), 'description' => 'OK'], 200);
    }

    public function updateActuality(Request $request, $id)
    {
        $actualities_input = $request->input();
        $actuality = Actuality::where('id', $id);
        $actuality->update($actualities_input);
        return response()->json(['description' => 'actuality update'], 200);
    }

    public function deleteActualities()
    {
        Actuality::truncate();
        return response()->json(['description' => 'Actualities delete'], 200);
    }

    public function deleteActuality($id)
    {
        $actuality = Actuality::where('id', $id);
        $actuality->delete();
        return response()->json(['description' => 'Actuality delete'], 200);
    }

    public function createActuality(Request $request)
    {
        $actuality = new Actuality;
        $actualities_input = $request->input();
        $actuality->create($actualities_input);
        return response()->json(['description' => 'Actuality created'], 200);
    }
}
