<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            if ($request->expectsJson()) {
                $token = $request->user()->createToken('user_token')->plainTextToken;
                return response()->json(['success' => true, 'message' => 'Logged in successfully.', 'token' => $token]);
            }

            return redirect()->route('tasks.index');
        }

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Invalid credentials.']);
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {

        if ($request->expectsJson()) {
            $request->user()->tokens()->delete();
            return response()->json(['success' => true, 'message' => 'Logged out successfully.']);
        }

        auth()->logout();
        return redirect()->route('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        auth()->login($user);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'User created successfully.']);
        }

        return redirect()->route('tasks.index');
    }
}
