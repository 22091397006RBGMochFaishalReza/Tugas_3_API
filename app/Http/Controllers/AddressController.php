<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    public function store(AddressRequest $request, $idContact)
    {
        $address = Address::create(array_merge($request->validated(), ['contact_id' => $idContact]));
        return response()->json(['data' => $address], 201);
    }

    public function index($idContact)
    {
        $addresses = Address::where('contact_id', $idContact)->get();
        return response()->json(['data' => $addresses], 200);
    }

    public function show($idContact, $idAddress)
    {
        $address = Address::where('contact_id', $idContact)->findOrFail($idAddress);
        return response()->json(['data' => $address], 200);
    }

    public function update(AddressRequest $request, $idContact, $idAddress)
    {
        $address = Address::where('contact_id', $idContact)->findOrFail($idAddress);
        $address->update($request->validated());
        return response()->json(['data' => $address], 200);
    }

    public function destroy($idContact, $idAddress)
    {
        Address::where('contact_id', $idContact)->findOrFail($idAddress)->delete();
        return response()->json(['data' => true], 200);
    }
}
