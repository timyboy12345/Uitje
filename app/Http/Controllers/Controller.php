<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return array[]
     */
    public static function getDashboardMenuItems(): array
    {
        return [
            [
                'title' => 'Home',
                'icon' => 'home',
                'route' => route('dashboard.home'),
                'routeName' => null,
            ], [
                'title' => 'Klanten',
                'icon' => 'users',
                'route' => route('dashboard.customers.index'),
                'routeName' => 'customers',
            ], [
                'title' => 'Reserveringen',
                'icon' => 'bookmark',
                'route' => route('dashboard.orders.index'),
                'routeName' => 'orders',
            ], [
                'title' => 'Reserveringstypes',
                'icon' => 'book',
                'route' => route('dashboard.reservation-types.index'),
                'routeName' => 'reservation-types',
            ], [
                'title' => 'FAQ\'s',
                'icon' => 'help-circle',
                'route' => route('dashboard.frequently-asked-questions.index'),
                'routeName' => 'frequently-asked-questions',
            ],
        ];
    }
}
