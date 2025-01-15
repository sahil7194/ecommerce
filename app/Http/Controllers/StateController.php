<?php

namespace App\Http\Controllers;

use App\Http\Requests\State\CreateStateRequest;
use App\Http\Requests\State\UpdateStateRequest;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->paginate) {

            $states = State::paginate(10);

            return StateResource::collection($states);
        }

        $states = State::all();

        return StateResource::collection($states);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStateRequest $request)
    {
        $state = State::create($request->validated());

        return StateResource::make($state);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $state = State::find($id);

        if (!$state) {
            return response()->json([
                "message" => "no record found"
            ]);
        }

        return StateResource::make($state);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, string $id)
    {
        $state = State::findOrFail($id);

        if ($state) {
            $state->update($request->validated());
        }

        return StateResource::make($state);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $state = State::find($id);

        if (!$state) {

            return response()->json([
                "message" => "no record found"
            ]);
        }

        $state->delete();

        return  response()->json([
            "message" => "state Deleted SuccessFully"
        ]);
    }
}
