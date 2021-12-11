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
                'title' => trans_choice('general.terms.home', 1),
                'icon' => 'home',
                'route' => route('dashboard.home'),
                'routeName' => 'dashboard',
            ],
            [
                'title' => trans_choice('general.terms.crm', 1),
                'icon' => 'users',
                'route' => route('dashboard.crm.customers.index'),
                'routeName' => 'crm',
                'subMenus' => [
                    [
                        'title' => trans_choice('general.terms.customers', 2),
                        'icon' => 'users',
                        'route' => route('dashboard.crm.customers.index'),
                        'routeName' => 'customers',
                    ],
                ]
            ],
            [
                'title' => trans_choice('general.terms.tickets', 2),
                'icon' => 'dollar-sign',
                'route' => route('dashboard.tickets.orders.index'),
                'routeName' => 'tickets',
                'subMenus' => [
                    [
                        'title' => trans_choice('general.terms.orders', 2),
                        'icon' => 'users',
                        'route' => route('dashboard.tickets.orders.index'),
                        'routeName' => 'orders',
                    ],
                    [
                        'title' => trans_choice('general.terms.ticket-types', 2),
                        'icon' => 'users',
                        'route' => route('dashboard.tickets.reservation-types.index'),
                        'routeName' => 'reservation-types',
                    ],
                ]
            ],
            [
                'title' => trans_choice('general.terms.content', 2),
                'icon' => 'edit',
                'route' => route('dashboard.content.frequently-asked-questions.index'),
                'routeName' => 'content',
                'subMenus' => [
                    [
                        'title' => trans_choice('general.terms.frequently-asked-questions', 2),
                        'icon' => 'users',
                        'route' => route('dashboard.content.frequently-asked-questions.index'),
                        'routeName' => 'frequently-asked-questions',
                    ],
                    [
                        'title' => trans_choice('general.terms.pois', 2),
                        'icon' => 'arrow-down-right',
                        'route' => route('dashboard.content.pois.index'),
                        'routeName' => 'pois',
                    ],
                    [
                        'title' => trans_choice('general.terms.maps', 2),
                        'icon' => 'map',
                        'route' => route('dashboard.content.maps.index'),
                        'routeName' => 'maps',
                    ],
                    [
                        'title' => __('general.terms.shop'),
                        'icon' => 'cart',
                        'route' => route('dashboard.content.shop.index'),
                        'routeName' => 'shop',
                    ],
                ]
            ],
        ];
    }
}
