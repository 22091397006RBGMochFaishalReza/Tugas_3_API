<?php

// UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6',
            'name' => 'required|min:6'
        ]);

        // Buat pengguna baru
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name
        ]);

        return response()->json([
            'data' => [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        // Lakukan otentikasi
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'data' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'token' => $token
                ]
            ], 200);
        } else {
            return response()->json([
                'errors' => 'Unauthorized'
            ], 401);
        }
    }

    public function getUpdate(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'data' => [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name
            ]
        ], 200);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $user->update($request->only('name', 'password'));
        return response()->json([
            'data' => [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'data' => true
        ], 200);
    }
}
