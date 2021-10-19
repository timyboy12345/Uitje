<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('shop.auth.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginPost(Request $request): RedirectResponse
    {
        // TODO: Only log in users in the correct organization

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
