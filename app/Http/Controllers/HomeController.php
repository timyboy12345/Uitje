<?php

namespace App\Http\Controllers;

use App\Models\ReservationType;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * @param $park
     * @return Response
     */
    public function home($park): Response
    {
        $reservationTypes = ReservationType::where('type', 'reservation')->get();

        return response()->view('welcome', compact(['reservationTypes']));
    }
}
