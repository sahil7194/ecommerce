<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->paginate) {
            $categories = Category::paginate(10);

            return CategoryResource::collection($categories);
        }

        $categories = Category::all();

        return CategoryResource::collection($categories);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return CategoryResource::make( $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                "message" => "no record found"
            ]);
        }

        return CategoryResource::make($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);

        if ($category) {
            $category->update($request->validated());
        }

        return CategoryResource::make( $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

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
