<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderLineLine;
use App\Models\Organization;
use App\Models\ReservationType;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $park
     * @param string $slug
     * @return View
     */
    public function index(string $park, string $slug): View
    {
        $reservationType = ReservationType::where('slug', $slug)->firstOrFail();

        return view('shop.reserve.reserve', compact(['reservationType']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $park
     * @param string $slug
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(string $park, string $slug, Request $request): RedirectResponse
    {
        $reservationType = ReservationType::where('slug', $slug)->firstOrFail();
        $rules = [];

        $organisation = Organization::where('subdomain', $request->route('park'))->first();

        foreach ($reservationType->reservationTypeLines as $line) {
            switch ($line->type) {
                case 'address':
                    if ($line->is_required) {
                        $rules["{$line->id}postalcode"] = 'required|string';
                        $rules["{$line->id}number"] = 'required|string';
                        $rules["{$line->id}streetname"] = 'required|string';
                        $rules["{$line->id}city"] = 'required|string';
                    }
                    break;
                default:
                    if ($line->is_required) {
                        $rules[$line->id] = 'required|string|max:255';
                    }
                    break;
            }
        }

        if ($reservationType->has_participants) {
            $rules['participants'] = 'required|numeric';
        }

        if ($reservationType->has_accompanists) {
            $rules['accompanists'] = 'required|numeric';
        }

        if ($reservationType->date_type === 'date') {
            $rules['date'] = 'required|string';
        }

        $user_id = '';
        if (Auth::guest()) {
            $rules['name'] = 'required|string|min:3';
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|string|min:8';
        } else {
            $user_id = Auth::id();
        }

        $request->validate($rules);

        if (Auth::guest()) {
            $user = new User();
            $user->id = Str::uuid()->toString();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->save();

            $user_id = $user->id;
        }

        $order = new Order();
        $order->id = Str::uuid()->toString();
        $order->confirmation_code = Str::random(10);
        $order->user_id = $user_id;
        $order->organization_id = $organisation->id;
        $order->save();

        $orderLine = new OrderLine();
        $orderLine->id = Str::uuid()->toString();
        $orderLine->order_id = $order->id;
        $orderLine->reservation_type_id = $reservationType->id;

        $orderLine->participants = $request->get('participants');
        $orderLine->accompanists = $request->get('accompanists');
        $orderLine->date = $request->get('date');

        $orderLine->save();

        foreach ($reservationType->reservationTypeLines as $line) {
            $orderLineLine = new OrderLineLine();
            $orderLineLine->id = Str::uuid()->toString();
            $orderLineLine->reservation_type_line_id = $line->id;
            $orderLineLine->order_line_id = $orderLine->id;

            switch ($line->type) {
                case "address":
                    $orderLineLine->data = [
                        'postalcode' => $request->input("{$line->id}postalcode"),
                        'housenumber' => $request->input("{$line->id}housenumber"),
                        'streetname' => $request->input("{$line->id}streetname"),
                        'city' => $request->input("{$line->id}city")
                    ];
                    break;
                default:
                    $orderLineLine->value = $request->input($line->id);
                    break;
            }

            $orderLineLine->save();
        }

        return redirect()->route('reserve.thanks', [$request->route('park'), $order->id]);
    }

    /**
     * @param string $park
     * @param string $id
     * @return Response
     */
    public function thanks(string $park, string $id): Response
    {
        $order = Order::findOrFail($id);

        return response()->view('shop.reserve.thanks', compact(['order']));
    }
}
