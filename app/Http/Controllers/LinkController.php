<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Resources\LinkCollection;
use App\Http\Resources\LinkResource;

class LinkController extends Controller
{
    public function showLinks()
    {
        return new LinkCollection(Link::all());
    }

    public function showLink($id)
    {
        $link= Link::where(['id' => $id])
            ->firstOrFail();
        return new LinkResource($link);
    }

    public function updateLink(Request $request, $id)
    {
        $links_input = $request->input();
        $link = Link::where('id', $id)
            ->firstOrFail();
        $link->updateOrFail($links_input);

        return new linkresource($link);
    }

    public function deleteLinks()
    {
        Link::truncate();
        return response()->json(['description' => 'Links delete'], 200);
    }

    public function deleteLink($id)
    {
        $link = Link::where('id', $id);
        $link->delete();
        return response()->json(['description' => 'Link delete'], 200);
    }

    public function createLink(Request $request)
    {
        $links_input = $request->input();
        $link = new Link;
        $link->url=$links_input['url'];
        $link->footer_id=$links_input['footer_id'];
        $link->setTranslations('name',$links_input['name'])
             ->save();
        return new LinkResource($link);
    }
}
