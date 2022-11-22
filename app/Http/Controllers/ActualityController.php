<?php

namespace App\Http\Controllers;

use App\Models\Actuality;
use Illuminate\Http\Request;
use App\Http\Resources\ActualityResource;
use App\Http\Resources\ActualityCollection;
use App\Http\Requests\Actuality\UpdateRequest;

class ActualityController extends Controller
{
    public function showActualities()
    {
        return new ActualityCollection(Actuality::all());
    }

    public function showActuality($id)
    {
        return new ActualityResource(Actuality::find($id));
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
        $actualities_input = $request->input();

        $actuality = new Actuality();
        $actuality->image = $actualities_input['image'];
        $actuality->start_date = $actualities_input['start_date'];
        $actuality->end_date = $actualities_input['end_date'];
        $actuality
            ->setTranslations('title', $actualities_input['title'])
            ->setTranslations('description', $actualities_input['description'])
            ->save();

        return response()->json(['description' => 'Actuality created'], 200);
    }
}
