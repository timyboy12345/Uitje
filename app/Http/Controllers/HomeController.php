<?php

namespace App\Http\Controllers;

use App\Models\ReservationType;

class HomeController extends Controller
{
    public function home( ){
        $reservationTypes = ReservationType::where('type', 'reservation')->get();

        return view('welcome', compact(['reservationTypes']));
    }
}
