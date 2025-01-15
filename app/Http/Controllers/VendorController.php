<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendor\CreateVendorRequest;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Http\Resources\VendorResource;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->paginate) {
            $categories = Vendor::paginate(10);

            return VendorResource::collection($categories);
        }

        $categories = Vendor::all();

        return VendorResource::collection($categories);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVendorRequest $request)
    {
        $category = Vendor::create($request->validated());

        return VendorResource::make( $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Vendor::find($id);

        if (!$category) {
            return response()->json([
                "message" => "no record found"
            ]);
        }

        return VendorResource::make($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, string $id)
    {
        $category = Vendor::findOrFail($id);

        if ($category) {
            $category->update($request->validated());
        }

        return VendorResource::make( $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Vendor::find($id);

        if (!$category) {

            return response()->json([
                "message" => "no record found"
            ]);
        }

        $category->delete();

        return  response()->json([
            "message" => "category Deleted SuccessFully"
        ]);
    }
}
