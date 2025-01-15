<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->paginate) {
            $countries = Country::paginate(10);

            return CountryResource::collection($countries);
        }

        $countries = Country::all();

        return CountryResource::collection($countries);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCountryRequest $request)
    {
        $country = Country::create($request->validated());

        return CountryResource::make($country);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::find($id);

        if (!$country) {
            return response()->json([
                "message" => "no record found"
            ]);
        }

        return CountryResource::make($country);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, string $id)
    {
        $country = Country::findOrFail($id);

        if ($country) {
            $country->update($request->validated());
        }

        return CountryResource::make($country);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::find($id);

        if (!$country) {

            return response()->json([
                "message" => "no record found"
            ]);
        }

        $country->delete();

        return  response()->json([
            "message" => "country Deleted SuccessFully"
        ]);
    }
}
