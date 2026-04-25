<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle the login authentication attempt.
     */
    public function loginUser(Request $request)
    {
        // 1. Validate the input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt to log the user in
        // Laravel automatically hashes the 'password' input to compare with the DB
        if (Auth::attempt($credentials, $request->remember)) {

            // 3. Regenerate session to prevent Session Fixation attacks
            $request->session()->regenerate();

            // 4. Redirect to the intended dashboard or home
            return redirect()->intended('dashboard')
                ->with('success', 'Welcome back, ' . Auth::user()->name);
        }

        // 5. If login fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle the logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
