<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource; 

class AddressController extends Controller
{
    public function index()
    {
        return new AddressCollection(Address::all());
    }

    public function show($id)
    {
        $address = Address::where(['id' => $id])
            ->firstOrFail();

        return new AddressResource($address);
    }

    public function showActiveAddresses()
    {
        return new AddressCollection(Address::where('isActive',true)->get());
    }

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        Address::where(['id' => $id])
            ->delete();

        return response()->json(['description' => 'Address delete'], 200);
    }

    public function store(Request $request)
    {
        $addresses_input = $request->input();
        $address = new Address();
        $address->create($addresses_input);

        return new AddressResource($address);
    }
}
