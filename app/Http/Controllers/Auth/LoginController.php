<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    /**
     * Show user login form.
     */
    public function index()
    {
        if (View::exists('auth.login')) {
            return view('auth.login');
        }

        if (View::exists('login')) {
            return view('login');
        }

        return redirect()->route('home');
    }

    /**
     * Show admin login form.
     */
    public function adminLogin()
    {
        if (View::exists('auth.admin-login')) {
            return view('auth.admin-login');
        }

        return redirect()->route('login');
    }

    /**
     * Handle user login.
     */
    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle admin login.
     */
    public function adminSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided admin credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logout the user and invalidate the session.
     */
    public function logout(Request $request)
    {
        // Auth::logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        // return redirect()->route('login');
         Auth::guard('web')->logout(); // or 'admin' guard if you use a custom guard

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to login page
        return redirect()->route('home')->with('success', 'You have been logged out.');
    }
}
