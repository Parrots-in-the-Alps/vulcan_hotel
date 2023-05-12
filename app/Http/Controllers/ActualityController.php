<?php

namespace App\Http\Controllers;

use App\Models\Actuality;
use Illuminate\Http\Request;
use App\Http\Resources\ActualityResource;
use App\Http\Resources\ActualityCollection;

class ActualityController extends Controller
{
    public function index()
    {
        return new ActualityCollection(Actuality::all());
    }

    public function show($id)
    {
        $actuality = Actuality::where(['id' => $id])
            ->firstOrFail();

        return new ActualityResource($actuality);
    }

    public function showActiveActualities()
    {
        return new ActualityCollection(Actuality::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $ye = Actuality::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'Actuality updated successfully!'], 200);
    }

    public function deleteActualities()
    {
        Actuality::truncate();

        return response()->json(['description' => 'Actualities delete'], 200);
    }

    public function destroy($id)
    {
        Actuality::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Actuality delete'], 200);
    }

    public function store(Request $request)
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

        return new ActualityResource($actuality);
    }
}
