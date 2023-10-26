<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:admins,email',
            'password' => 'required|string'
        ]);

        $user = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('urbanCubeToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    } // End Method

    public function logout()
    {

        // Auth::guard('admin')->user()->tokens->delete();


        Auth::guard('admin')->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response([
            'message' => 'Logged out successfully'
        ]);
    }



    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string'
        ]);

        $user = Admin::where('email', $data['email'])
            ->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {

            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        } else {
            $token = $user->createToken('UrbanCubeTokenLogin')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 200);
        }
    }
}


