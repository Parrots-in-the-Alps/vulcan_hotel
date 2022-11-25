<?php

namespace App\Http\Controllers;

use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Http\Resources\CallToActionCollection;
use App\Http\Resources\CallToActionResource;

class CallToActionController extends Controller
{
    public function index()
    {
        return new CallToActionCollection(CallToAction::all());
    }

    public function show($id)
    {
        $calltoaction = CallToAction::where(['id' => $id])
            ->firstOrFail();

        return new CallToActionResource($calltoaction);
    }

    public function showActiveCallToActions()
    {
        return new CallToActionCollection(CallToAction::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $ye = CallToAction::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'CTA updated successfully!'], 200);
    }

    public function deleteCallToActions()
    {
        CallToAction::truncate();
        return response()->json(['description' => 'CallToActions delete'], 200);
    }

    public function destroy($id)
    {
        $calltoaction = CallToAction::where('id', $id);
        $calltoaction->delete();
        return response()->json(['description' => 'CallToAction delete'], 200);
    }

    public function store(Request $request)
    {
        $calltoactions_input = $request->input();

        $calltoaction = new CallToAction();
        $calltoaction->hero_id = $calltoactions_input['hero_id'];
        $calltoaction
            ->setTranslations('title', $calltoactions_input['title'])
            ->setTranslations('modal_content', $calltoactions_input['modal_content'])
            ->setTranslations('modal_title', $calltoactions_input['modal_title'])
            ->save();

        return new CallToActionResource($calltoaction);
    }
}
