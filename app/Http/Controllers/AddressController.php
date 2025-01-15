<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\CreateAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->paginate) {
            $addresses = Address::paginate(10);

            return AddressResource::collection($addresses);
        }

        $addresses = Address::all();

        return AddressResource::collection($addresses);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAddressRequest $request)
    {
        $address = Address::create($request->validated());

        return AddressResource::make( $address);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address = Address::find($id);

        if (!$address) {
            return response()->json([
                "message" => "no record found"
            ]);
        }

        return AddressResource::make($address);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, string $id)
    {
        $address = Address::findOrFail($id);

        if ($address) {
            $address->update($request->validated());
        }

        return AddressResource::make( $address);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::find($id);

        if (!$address) {

            return response()->json([
                "message" => "no record found"
            ]);
        }

        $address->delete();

        return  response()->json([
            "message" => "address Deleted SuccessFully"
        ]);
    }
}
