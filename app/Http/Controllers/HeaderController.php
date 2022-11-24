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
        $header = Header::where(['id' => $id])
            ->firstOrFail();

        return new HeaderResource($header);
    }

    public function showActiveHeader()
    {
        return new HeaderCollection(Header::where('isActive',1)->get());
    }

    public function updateHeader(Request $request, $id)
    {
        $headers_input = $request->input();
        $header = Header::where(['id' => $id])
            ->firstOrFail();
        $header->updateOrFail($headers_input);
            
        return new HeaderResource($header);
    }

    public function deleteHeaders()
    {
        Header::truncate();

        return response()->json(['description' => 'Headers delete'], 200);
    }

    public function deleteHeader($id)
    {
        Header::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Header delete'], 200);
    }

    public function createHeader(Request $request)
    {
        $headers_input = $request->input();
        $header = new Header();
        $header->create($headers_input);

        return new HeaderResource($header);
    }
}
