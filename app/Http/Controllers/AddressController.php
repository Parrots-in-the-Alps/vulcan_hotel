<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource; 

class AddressController extends Controller
{
    public function showAddresses()
    {
        return new AddressCollection(Address::all());
    }

    public function showAddress($id)
    {
        return new AddressResource(Address::find($id));
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
