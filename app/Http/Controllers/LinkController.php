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
        return new LinkResource(Link::find($id));
    }

    public function updateLink(Request $request, $id)
    {
        $links_input = $request->input();
        $link = Link::where('id', $id);
        $link->update($links_input);
        return response()->json(['description' => 'Link update'], 200);
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
        $link->setTranslations('name',$links_input['name'])
             ->save();
        return response()->json(['description' => 'Link created'], 200);
    }
}
