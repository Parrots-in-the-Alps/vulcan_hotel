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

    public function showActiveAddresses()
    {
        return new AddressCollection(Address::where('isActive',1)->get());
    }

    public function updateAddress(Request $request, $id)
    {
        $addresses_input = $request->input();
        $address = Address::where(['id' => $id])
            ->firstOrFail();
        $address->updateOrFail($addresses_input);
            
        return new AddressResource($address);
    }

    public function deleteAddresses()
    {
        Address::truncate();

        return response()->json(['description' => 'Addresses delete'], 200);
    }

    public function deleteAddress($id)
    {
        Address::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Address delete'], 200);
    }

    public function createAddress(Request $request)
    {
        $addresses_input = $request->input();
        $address = new Address();
        $address->create($addresses_input);

        return new AddressResource($address);
    }
}
