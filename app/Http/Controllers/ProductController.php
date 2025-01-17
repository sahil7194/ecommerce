<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\SearchProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->paginate) {
            $products = Product::paginate(10);

            return ProductResource::collection($products);
        }

        $products = Product::all();

        return ProductResource::collection($products);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated());

        return ProductResource::make($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "message" => "no record found"
            ]);
        }

        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);

        if ($product) {
            $product->update($request->validated());
        }

        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {

            return response()->json([
                "message" => "no record found"
            ]);
        }

        $product->delete();

        return  response()->json([
            "message" => "product Deleted SuccessFully"
        ]);
    }

    public function search(SearchProductRequest $request)
    {
        $products = Product::where('name', 'LIKE', $request->query)
                            ->where('description', 'LIKE', $request->query)
                            ->get();
        dd($products);
       return ProductResource::collection($products);
    }
}
