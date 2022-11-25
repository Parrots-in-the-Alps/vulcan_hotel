<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Http\Resources\AdvantageCollection;
use App\Http\Resources\AdvantageResource;

class AdvantageController extends Controller
{
    public function index()
    {
        return new AdvantageCollection(Advantage::all());
    }

    public function show($id)
    {
        $advantage = Advantage::where(['id' => $id])
            ->firstOrFail();

        return new AdvantageResource($advantage);
    }

    public function showActiveAdvantages()
    {
        return new AdvantageCollection(Advantage::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $ye = Advantage::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'advantage updated successfully!'], 200);
    }

    public function deleteAdvantages()
    {
        Advantage::truncate();

        return response()->json(['description' => 'Advantages delete'], 200);
    }

    public function destroy($id)
    {
        Advantage::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Advantage delete'], 200);
    }

    public function store(Request $request)
    {
        $advantages_input = $request->input();
        $advantage = new Advantage();
        $advantage->image_icon = $advantages_input['image_icon'];
        $advantage->price = $advantages_input['price'];
        $advantage->setTranslations('title', $advantages_input['title'])
                  ->setTranslations('description', $advantages_input['description'])
                  ->save();

        return new AdvantageResource($advantage);
    }
}
