<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderLineLine;
use App\Models\ReservationType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $slug
     * @return View
     */
    public function index(string $slug): View
    {
        $reservationType = ReservationType::where('slug', $slug)->firstOrFail();

        return view('reserve.reserve', compact(['reservationType']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $slug
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(string $slug, Request $request): RedirectResponse
    {
        $reservationType = ReservationType::where('slug', $slug)->firstOrFail();
        $rules = [];

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

        $request->validate($rules);

        $order = new Order();
        $order->id = Str::uuid()->toString();
        $order->confirmation_code = Str::random(10);
        $order->user_id = Auth::id();
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

        return redirect()->route('reserve.thanks', $order->id);
    }

    /**
     * @param string $id
     * @return Response
     */
    public function thanks(string $id): Response
    {
        $order = Order::findOrFail($id);

        return response()->view('reserve.thanks', compact(['order']));
    }
}
