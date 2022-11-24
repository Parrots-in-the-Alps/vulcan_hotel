<?php

namespace App\Http\Controllers;

use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Http\Resources\CallToActionCollection;
use App\Http\Resources\CallToActionResource;

class CallToActionController extends Controller
{
    public function showCallToActions()
    {
        return new CallToActionCollection(CallToAction::all());
    }

    public function showCallToAction($id)
    {
        $calltoaction = CallToAction::where(['id' => $id])
            ->firstOrFail();

        return new CallToActionResource($calltoaction);
    }

    public function showActiveCallToActions()
    {
        return new CallToActionCollection(CallToAction::where('isActive',1)->get());
    }

    public function updateCallToAction(Request $request, $id)
    {
        $calltoactions_input = $request->input();
        $calltoaction = CallToAction::where(['id' => $id])
            ->firstOrFail();
        $calltoaction
            ->setTranslations('title', $calltoactions_input['title'])
            ->setTranslations('modal_content', $calltoactions_input['modal_content'])
            ->setTranslations('modal_title', $calltoactions_input['modal_title'])
            ->save();
        $calltoaction->updateOrFail($calltoactions_input);
            
        return new CallToActionResource($calltoaction);
    }

    public function deleteCallToActions()
    {
        CallToAction::truncate();
        return response()->json(['description' => 'CallToActions delete'], 200);
    }

    public function deleteCallToAction($id)
    {
        $calltoaction = CallToAction::where('id', $id);
        $calltoaction->delete();
        return response()->json(['description' => 'CallToAction delete'], 200);
    }

    public function createCallToAction(Request $request)
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
