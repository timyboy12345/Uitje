<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ReservationType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExtraReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $park
     * @param string $order_id
     * @param string $extra_id
     * @return Response
     */
    public function index(string $park, string $order_id, string $extra_id): Response
    {
        $order = Order::findOrFail($order_id);
        $extra = ReservationType::findOrFail($extra_id);

        return response()->make('Not ready yet...', 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
