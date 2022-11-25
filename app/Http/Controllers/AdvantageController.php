<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Http\Resources\AdvantageCollection;
use App\Http\Resources\AdvantageResource;

class AdvantageController extends Controller
{
    public function showAdvantages()
    {
        return new AdvantageCollection(Advantage::all());
    }

    public function showAdvantage($id)
    {
        $advantage = Advantage::where(['id' => $id])
            ->firstOrFail();

        return new AdvantageResource($advantage);
    }

    public function showActiveAdvantages()
    {
        return new AdvantageCollection(Advantage::where('isActive',true)->get());
    }

    public function updateAdvantage(Request $request, $id)
    {
        $advantages_input = $request->input();
        $advantage = Advantage::where(['id' => $id])
            ->firstOrFail();
        $advantage
            ->setTranslations('title', $advantages_input['title'])
            ->setTranslations('description', $advantages_input['description'])
            ->save();
        $advantage->updateOrFail($advantages_input);
            
        return new AdvantageResource($advantage);
    }

    public function deleteAdvantages()
    {
        Advantage::truncate();

        return response()->json(['description' => 'Advantages delete'], 200);
    }

    public function deleteAdvantage($id)
    {
        Advantage::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Advantage delete'], 200);
    }

    public function createAdvantage(Request $request)
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
