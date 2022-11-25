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

    public function showActiveFooters()
    {
        return new FooterCollection(Footer::where('isActive',true)->get());
    }

    public function updateFooter(Request $request, $id)
    {
        $footers_input = $request->input();
        $footer = Footer::where(['id' => $id])
            ->firstOrFail();
        $footer->updateOrFail($footers_input);
            
        return new FooterResource($footer);
    }

    public function deleteFooters()
    {
        Footer::truncHeaderate();

        return response()->json(['description' => 'Footers delete'], 200);
    }

    public function deleteFooter($id)
    {
        Footer::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Footer delete'], 200);
    }

    public function createFooter(Request $request)
    {
        $footers_input = $request->input();
        $footer = new Footer();
        $footer->create($footers_input);

        return new FooterResource($footer);
    }
}
