<?php

namespace App\Http\Controllers;

use App\Models\ReservationType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return array[]
     */
    public static function getMenuItems(): array
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

        if (Auth::guest()) {
            $menuItems[] =
                [
                    'title' => 'Inloggen',
                    'route' => route('login'),
                    'icon' => 'user',
                    'class' => 'ml-auto'
                ];
        } else {
            $menuItems[] =
                [
                    'title' => 'Account',
                    'route' => route('account'),
                    'icon' => 'users',
                    'class' => 'ml-auto'
                ];

            $menuItems[] =
                [
                    'title' => 'Dashboard',
                    'route' => route('dashboard.home'),
                    'icon' => 'settings'
                ];
        }

        return $menuItems;
    }

    public static function getDashboardMenuItems() {
        return [
            [
                'title' => 'Home',
                'icon' => 'home',
                'route' => route('dashboard.home'),
                'routeName' => 'dashboard.home'
            ], [
                'title' => 'Klanten',
                'icon' => 'users',
                'route' => route('dashboard.customers.index'),
                'routeName' => 'dashboard.customers.index'
            ], [
                'title' => 'Reserveringen',
                'icon' => 'bookmark',
                'route' => route('dashboard.orders.index'),
                'routeName' => 'dashboard.orders.index'
            ], [
                'title' => 'Reserveringstypes',
                'icon' => 'book',
                'route' => route('dashboard.reservationTypes.index'),
                'routeName' => 'dashboard.reservationTypes.index'
            ]
        ];
    }
}
