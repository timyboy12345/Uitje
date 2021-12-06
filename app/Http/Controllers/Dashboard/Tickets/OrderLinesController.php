<?php

namespace App\Http\Controllers\Dashboard\Tickets;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\ReservationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $reservationTypes = ReservationType::all()->map(function ($type) {
            return [
                'value' => $type->id,
                'title' => "{$type->title} / {$type->type}",
            ];
        });

        $orders = Order::all()->map(function ($order) {
            return [
                'value' => $order->id,
                'title' => $order->id,
            ];
        });

        return response()->view('dashboard.tickets.orderlines.create', compact(['reservationTypes', 'orders']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'order_id' => 'required|string|exists:orders,id',
            'reservation_type_id' => 'required|string|exists:reservation_types,id',
        ]);

        $orderLine = new OrderLine();
        $orderLine->id = Str::uuid()->toString();
        $orderLine->order_id = $request->get('order_id');
        $orderLine->reservation_type_id = $request->get('reservation_type_id');
        $orderLine->organization_id = Auth::user()->organization_id;
        $orderLine->fill($request->only($orderLine->getFillable()));
        $orderLine->save();

        return response()->redirectToRoute('dashboard.tickets.orderLines.show', $orderLine->id);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response
    {
        $orderLine = OrderLine::findOrFail($id);

        return response()->view('dashboard.tickets.orderlines.show', compact(['orderLine']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function edit(string $id): Response
    {
        $orderLine = OrderLine::findOrFail($id);

        return response()->view('dashboard.tickets.orderlines.edit', compact(['orderLine']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $orderLine = OrderLine::findOrFail($id);

        $values = $request->only($orderLine->getFillable());
        $orderLine->update($values);
        $orderLine->save();

        return response()->redirectToRoute('dashboard.tickets.orderLines.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
