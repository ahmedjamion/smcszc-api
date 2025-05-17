<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\LogoutUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SetUserActiveRoleRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register a new user
    public function register(RegisterUserRequest $request)
    {
        // get userData except role
        $userData = Arr::except($request->validated(), ['roles']);

        // get the role id from the request
        $roles = $request->validated()['roles'];

        // create the user
        $user = User::create($userData);

        // attach the role
        $user->roles()->attach($roles);

        // create a token for the user
        //$token = $user->createToken($request->email);

        // return  the user and token and a message
        // return [
        //     'user' => new UserResource($user),
        //     'token' => $token->plainTextToken,
        //     'message' => 'User registered successfully',
        // ];
        return response()->json([
            'message' => 'User created',
        ], 200);
    }


    // login a user
    public function login(LoginUserRequest $request)
    {
        // find the user by email
        $user = User::where('email', $request->email)->first();

        // check if the user exists and the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        if ($user->roles()->count() === 1) {
            $role = $user->roles()->first();
            $user->activateRole($role->id);
            $user->refresh();
        }

        // create a token for the user
        $token = $user->createToken($request->email);

        // return the user and token and a message
        return response()->json([
            'user' => new UserResource($user),
            'token' => $token->plainTextToken,
            'message' => 'Login successful',
        ], 200);
    }


    // activate a role
    public function setActiveRole(SetUserActiveRoleRequest $request)
    {
        // todo: pls improve this later
        $roleId = $request->validated()['role_id'];

        $user = $request->user();

        $user->activateRole($roleId);

        $user->refresh();

        return ['user' => new UserResource($user)];
    }


    // logout a user
    public function logout(LogoutUserRequest $request)
    {
        // get the user making the request
        $user = $request->user();

        // set all deactivate roles for the user
        $user->deactivateRole();

        // delete tokens for the user
        $request->user()->currentAccessToken()->delete(); // * this will delete the currently used token

        // return a message
        return [
            'message' => 'Logged out successfully',
        ];
    }
}
