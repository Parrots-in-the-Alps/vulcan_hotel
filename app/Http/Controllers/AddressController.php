<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address; 

class AddressController extends Controller
{
    public function showAddresses()
    {
        return response()->json(['addresses' => Address::all(), 'description' => 'OK'], 200);
    }

    public function showAddress($id)
    {
        return response()->json(['adress' => Address::find($id), 'description' => 'OK'], 200);
    }

    public function updateAddress(Request $request, $id)
    {
        $address_input = $request->input();
        $address = Address::where('id', $id);
        $address->update($address_input);
        return response()->json(['description' => 'address updated'], 200);
    }

    public function deleteAddresses()
    {
        Address::truncate();
        return response()->json(['description' => 'addresses deleted'], 200);
    }

    public function deleteAddress($id)
    {
        $video = Address::where('id', $id);
        $video->delete();
        return response()->json(['description' => 'address deleted'], 200);
    }

    public function createAddress(Request $request)
    {
        $address = new Address;
        $address_input = $request->input();
        $address->create($address_input);
        return response()->json(['description' => 'Actuality created'], 200);
    }
}
