<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:agents,email',
            'password' => 'required|max:191'
        ]);

        $user = Agent::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        $token = $user->createToken('UrbanCubeAgent')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 200);
    } // End Method

    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|max:191'
        ]);

        $user = Agent::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {

            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        } else {

            $token = $user->createToken('UrbanCubeLogin')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 200);
        }
    }
}
