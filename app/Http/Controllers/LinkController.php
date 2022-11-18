<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function showLinks()
    {
        return response()->json(['links' => Link::all(), 'description' => 'OK'], 200);
    }

    public function showLink($id)
    {
        return response()->json(['link' => Link::find($id), 'description' => 'OK'], 200);
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
        $link = new Link;
        $links_input = $request->input();
        $link->create($links_input);
        return response()->json(['description' => 'Link created'], 200);
    }
}
