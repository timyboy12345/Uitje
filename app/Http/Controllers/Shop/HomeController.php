<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * @param $park
     * @return Response
     */
    public function home($park): Response
    {
        $organization = Organization::where('subdomain', $park)->firstOrFail();
        $reservationTypes = $organization->reservationTypes()->where('type', 'reservation')->get();

        return response()->view('welcome', compact(['organization', 'reservationTypes']));
    }
}
