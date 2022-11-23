<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Resources\HeaderCollection;
use App\Http\Resources\HeaderResource;

class HeaderController extends Controller
{
    public function showHeaders()
    {
        return new HeaderCollection(Header::all());
    }

    public function showHeader($id)
    {
        return new HeaderResource(Header::find($id));
    }

    public function updateHeader(Request $request, $id)
    {
        $headers_input = $request->input();
        $header = Header::where('id', $id);
        $header->update($headers_input);
        return response()->json(['description' => 'Header update'], 200);
    }

    public function deleteHeaders()
    {
        Header::truncate();
        return response()->json(['description' => 'Headers delete'], 200);
    }

    public function deleteHeader($id)
    {
        $header = Header::where('id', $id);
        $header->delete();
        return response()->json(['description' => 'Header delete'], 200);
    }

    public function createHeader(Request $request)
    {
        $header = new Header;
        $headers_input = $request->input();
        $header->create($headers_input);
        return response()->json(['description' => 'Header created'], 200);
    }
}
