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
        return new CallToActionResource(CallToAction::find($id));
        //return response()->json(['calltoaction' => CallToAction::find($id), 'description' => 'OK'], 200);
    }

    public function updateCallToAction(Request $request, $id)
    {
        $calltoaction_input = $request->input();
        $calltoaction = CallToAction::where('id', $id);
        $calltoaction->update($calltoaction_input);
        return response()->json(['description' => 'CallToAction update'], 200);
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
        $calltoaction->action=$calltoaction_input['action'];
        $calltoaction->setTranslations('title',$calltoaction_input['title'])
                     ->save();
        return response()->json(['description' => 'CallToAction created'], 200);
    }
}
