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
                'routeName' => 'dashboard',
            ],
            [
                'title' => 'Klanten',
                'icon' => 'users',
                'route' => route('dashboard.crm.customers.index'),
                'routeName' => 'crm',
                'subMenus' => [
                    [
                        'title' => 'Klanten',
                        'icon' => 'users',
                        'route' => route('dashboard.crm.customers.index'),
                        'routeName' => 'customers',
                    ],
                ]
            ],
            [
                'title' => 'Tickets',
                'icon' => 'dollar-sign',
                'route' => route('dashboard.tickets.orders.index'),
                'routeName' => 'tickets',
                'subMenus' => [
                    [
                        'title' => 'Bestellingen',
                        'icon' => 'users',
                        'route' => route('dashboard.tickets.orders.index'),
                        'routeName' => 'orders',
                    ],
                    [
                        'title' => 'Ticket Types',
                        'icon' => 'users',
                        'route' => route('dashboard.tickets.reservation-types.index'),
                        'routeName' => 'reservation-types',
                    ],
                ]
            ],
            [
                'title' => 'Content',
                'icon' => 'edit',
                'route' => route('dashboard.content.frequently-asked-questions.index'),
                'routeName' => 'content',
                'subMenus' => [
                    [
                        'title' => 'Veelgestelde Vragen',
                        'icon' => 'users',
                        'route' => route('dashboard.content.frequently-asked-questions.index'),
                        'routeName' => 'frequently-asked-questions',
                    ],
                    [
                        'title' => 'Pois',
                        'icon' => 'arrow-down-right',
                        'route' => route('dashboard.content.pois.index'),
                        'routeName' => 'pois',
                    ],
                ]
            ],
        ];
    }
}
