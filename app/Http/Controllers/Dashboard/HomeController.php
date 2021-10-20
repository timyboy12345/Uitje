<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * @return Response
     */
    public function home(): Response
    {
        return response()->view('dashboard.home');
    }
}
