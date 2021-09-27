<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account() {
        $orders = Auth::user()->orders;

        return view('account.account', compact(['orders']));
    }
}
