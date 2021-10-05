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
            return redirect()->intended(route('home', [$request->route('park')]));
        } else {
            return redirect()->back()->withErrors(['login' => 'Not Found'])->withInput($request->only(['email']));
        }
    }

    public function loginBasic()
    {
        return view('landing.login');
    }

    public function loginBasicPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($request->only(['email', 'password']), true)) {
            return redirect()->intended(route('dashboard.home'));
        } else {
            return redirect()->back()->withErrors(['login' => 'Not Found'])->withInput($request->only(['email']));
        }
    }

    /**
     * Log out the current user
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        return response()->redirectToRoute('home', [$request->route('park')]);
    }
}
