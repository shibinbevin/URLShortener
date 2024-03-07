<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);
        return redirect('/login')->with('success', 'Registration successful!');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();
            return redirect('/urls');
        }
        return redirect()->route('login')->with('error', 'Invalid credentials');

    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/');
    }
}