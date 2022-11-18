<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function showFooters()
    {
        return response()->json(['footers' => Footer::all(), 'description' => 'OK'], 200);
    }

    public function showFooter($id)
    {
        return response()->json(['footer' => Footer::find($id), 'description' => 'OK'], 200);
    }

    public function updateFooter(Request $request, $id)
    {
        $footer_input = $request->input();
        $footer = Footer::where('id', $id);
        $footer->update($footer_input);
        return response()->json(['description' => 'footer updated'], 200);
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
        return response()->json(['description' => 'footer created'], 200);
    }
}
