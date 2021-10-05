<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
                'route' => route('dashboard.reservation-types.index'),
                'routeName' => 'dashboard.reservation-types.index'
            ], [
                'title' => 'FAQ\'s',
                'icon' => 'help-circle',
                'route' => route('dashboard.frequently-asked-questions.index'),
                'routeName' => 'dashboard.frequently-asked-questions.index'
            ]
        ];
    }
}
