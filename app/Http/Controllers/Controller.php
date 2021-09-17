<?php

namespace App\Http\Controllers;

use App\Models\ReservationType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $menuItems = [
            [
                'title' => 'Home',
                'icon' => 'home',
                'route' => route('home')
            ]
        ];

        $reservationTypes = ReservationType::where('type', 'reservation')->get();
        foreach ($reservationTypes as $reservationType) {
            $menuItems[] = [
                'title' => $reservationType->title,
                'route' => route('reserve.index', [$reservationType->slug])
            ];
        }

        $menuItems[] =
            [
                'title' => 'Inloggen',
                'route' => route('home'),
                'icon' => 'user',
                'class' => 'ml-auto'
            ];

        View::share('menuItems', $menuItems);
    }
}
