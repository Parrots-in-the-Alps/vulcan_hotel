<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Resources\LinkCollection;
use App\Http\Resources\LinkResource;

class LinkController extends Controller
{
    public function index()
    {
        return new LinkCollection(Link::all());
    }

    public function show($id)
    {
        $link = Link::where(['id' => $id])
            ->firstOrFail();

        return new LinkResource($link);
    }

    public function showActiveLinks()
    {
        return new LinkCollection(Link::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $ye = Link::where('id', $id)->update(
            $input
        );
        return response()->json(['message' => 'room updated successfully!'], 200);
    }

    public function deleteLinks()
    {
        Link::truncate();

        return response()->json(['description' => 'Links delete'], 200);
    }

    public function destroy($id)
    {
        Link::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Link delete'], 200);
    }

    public function store(Request $request)
    {
        $links_input = $request->input();

        $link = new Link();
        $link->url = $links_input['url'];
        $link->footer_id = $links_input['footer_id'];
        $link
            ->setTranslations('name', $links_input['name'])
            ->save();

        return new LinkResource($link);
    }
}
