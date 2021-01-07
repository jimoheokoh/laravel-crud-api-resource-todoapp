<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResourceCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserResourceCollection
     */
    public function index(): UserResourceCollection
    {
        return new UserResourceCollection(User::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        //validate the requests
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users',
            'password' => 'min:8',
        ]);
        //create the new user
        $user = User::create([
            'name' => $request->name,           
            'email' => $request->email,           
            'password' => Hash::make($request->password),           
        ]);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User  $user
     * @return UserResource
     */
    public function update(Request $request, User $user): UserResource
    {
        //validate the requests
        $request->validate([
            'name' => 'required',
            'email' => 'unique:users',
        ]);
        //update a user
        $user->update($request->all());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json();
    }
}
