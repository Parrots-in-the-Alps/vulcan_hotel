<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use App\Http\Resources\FooterCollection;
use App\Http\Resources\FooterResource;


class FooterController extends Controller
{
    public function showFooters()
    {
        return new FooterCollection(Footer::all());
    }

    public function showFooter($id)
    {
        $footer = Footer::where(['id' => $id])
            ->firstOrFail();

        return new FooterResource($footer);
    }

    public function updateFooter(Request $request, $id)
    {
        $footer_input = $request->input();
        $footer = Footer::where('id', $id)
            ->firstOrFail();
        $footer->update($footer_input);

        return new FooterResource($footer);
    }

    public function deleteFooters()
    {
        Footer::truncate();
        return response()->json(['description' => 'footers deleted'], 200);
    }

    public function deleteFooter($id)
    {
        $footer = Footer::where('id', $id);
        $footer->delete();
        return response()->json(['description' => 'footer deleted'], 200);
    }

    public function createFooter(Request $request)
    {
        $footer = new Footer;
        $footer_input = $request->input();
        $footer->create($footer_input);
        return new FooterResource($footer);
    }
}
