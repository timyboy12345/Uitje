<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * @param $park
     * @return Response
     */
    public function account($park): Response
    {
        $orders = Auth::user()->orders;

        return response()->view('account.account', compact(['orders']));
    }
}
