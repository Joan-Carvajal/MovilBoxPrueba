<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

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

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_id = $request->profile_id;
        $user->state = 1;

        $respuesta = $user->save();

        if ($respuesta) {
            return response()->json([
                'status' => true,
                'error'=>'',
                'message' => 'User create succesfully',
                'respuesta' => $respuesta
            ], 201);
        }
        return response()->json([
            'status' => false,
            'error' => 'Error to created User',

        ], 500);

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
    public function update(UpdateUserRequest $request, User $user)
    {


       $user->update($request->all());


 return response()->json([
                'status' => true,
                'error'=>'',
                'message' => 'User updated succesfully',
                'user' => $user
            ], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

}
