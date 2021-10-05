<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($request->only(['email', 'password']), true)) {
            return redirect()->intended(route('home'));
        } else {
            return redirect()->back()->withErrors(['login' => 'Not Found'])->withInput($request->only(['email']));
        }
    }

    /**
     * Log out the current user
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return response()->redirectToRoute('home');
    }
}
