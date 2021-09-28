<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->paginate(10);

        return response()->view('dashboard.orders.index', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $users = User::all()->map(function ($user) {
            return [
                'value' => $user->id,
                'title' => $user->email
            ];
        });

        return response()->view('dashboard.orders.create', compact(['users']));
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
            'user_id' => 'required|string|exists:users,id',
        ]);

        $order = new Order();
        $order->id = Str::uuid()->toString();
        $order->confirmation_code = Str::random(10);

        $order->save();
        return response()->redirectToRoute('dashboard.orders.show', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response
    {
        $order = Order::findOrFail($id);

        return response()->view('dashboard.orders.show', compact(['order']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
