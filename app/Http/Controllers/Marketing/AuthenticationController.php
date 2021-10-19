<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('marketing.login');
    }

    public function loginPost(Request $request)
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
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return response()->redirectTo('/');
    }
}
