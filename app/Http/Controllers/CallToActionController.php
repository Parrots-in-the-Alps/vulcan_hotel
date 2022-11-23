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
        $callToAction = CallToAction::where(['id' => $id])
            ->firstOrFail();

        return new CallToActionResource($callToAction);
        //return response()->json(['calltoaction' => CallToAction::find($id), 'description' => 'OK'], 200);
    }

    public function updateCallToAction(Request $request, $id)
    {
        $callToAction_input = $request->input();
        $callToAction = CallToAction::where('id', $id)
            ->firstOrFail();
        $callToAction->updateOrFail($callToAction_input);

        return new CallToActionResource($callToAction);
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
        $calltoaction_input = $request->input();
        $calltoaction = new CallToAction;
        $calltoaction->hero_id=$calltoaction_input['hero_id'];
        $calltoaction->setTranslations('title',$calltoaction_input['title'])
                    ->setTranslations('modal_title',$calltoaction_input['modal_title'])
                    ->setTranslations('modal_content',$calltoaction_input['modal_content'])
                     ->save();
                     
        return new CallToActionResource($calltoaction);
    }
}
