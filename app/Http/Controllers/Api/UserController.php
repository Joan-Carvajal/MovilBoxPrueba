<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, User $user)
    {

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->profile_id = $request->input('profile_id');
        $user->state = 1;

        $respuesta = $user->save();

        if ($respuesta) {
            return response()->json([
                'status' => true,
                'message' => 'User create succesfully',
                'respuesta' => $respuesta
            ], 201);
        }
        $this->setStatusCode(500);
    return $this->responseWithError("Store failed.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $respuesta= $user->update($request->all());

        if ($respuesta) {
            return response()->json([
                'status' => true,
                'message' => 'User updated succesfully',
                'respuesta' => $respuesta
            ], 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

}
