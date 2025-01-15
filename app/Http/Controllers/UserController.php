<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->paginate){
            $users = User::paginate(10);

            return UserResource::collection($users);
        }

        $users = User::all();

        return UserResource::collection($users);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
         $user = User::create($request->validated());

         return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        if($user){
            $user->update($request->validated());
        }

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if($user){
            $user->delete();
        }

        return $user;
    }
}
