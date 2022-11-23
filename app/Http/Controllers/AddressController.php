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
        $address = Address::where(['id' => $id])
            ->firstOrFail();
        return new AddressResource($address);
    }

    public function updateAddress(Request $request, $id)
    {
        $address_input = $request->input();
        $address = Address::where(['id' => $id])
            ->firstOrFail();
        $address->updateOrFail($address_input);

        return new AddressResource($address);
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
        $address_input = $request->input();
        $address = new Address;
        $address->create($address_input);
        return new AddressResource($address);
    }
}
