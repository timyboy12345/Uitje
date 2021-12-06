<?php

namespace App\Http\Controllers\Dashboard\Tickets;

use App\Http\Controllers\Controller;
use App\Models\ReservationTypeLine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReservationTypeLinesController extends Controller
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
        $reservationTypes = Auth::user()->organization->reservationTypes->map(function ($reservationType) {
            return [
                'value' => $reservationType->id,
                'title' => $reservationType->title,
            ];
        });

        $types = [
            ['value' => 'text', 'title' => 'Tekst'],
            ['value' => 'number', 'title' => 'Nummer'],
            ['value' => 'date', 'title' => 'Datum'],
            ['value' => 'password', 'title' => 'Wachtwoord'],
            ['value' => 'email', 'title' => 'Email'],
            ['value' => 'textarea', 'title' => 'Lange tekst'],
            ['value' => 'boolean', 'title' => 'Ja/Nee'],
            ['value' => 'select', 'title' => 'Opties'],
            ['value' => 'address', 'title' => 'Adres'],
        ];

        return response()->view('dashboard.tickets.reservation-type-lines.create', compact(['reservationTypes', 'types']));
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
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'placeholder' => 'nullable|string|max:255',
            'is_required' => 'nullable|boolean',
            'type' => 'required|string|in:text,number,date,password,email,textarea,boolean,select,address',
            'reservation_type_id' => 'required|exists:reservation_types,id',
        ]);

        $reservationTypeLine = new ReservationTypeLine();
        $reservationTypeLine->id = Str::uuid()->toString();
        $reservationTypeLine->reservation_type_id = $request->get('reservation_type_id');
        $reservationTypeLine->type = $request->get('type');
        $reservationTypeLine->fill($request->only($reservationTypeLine->getFillable()));
        $reservationTypeLine->is_required = $request->has('is_required');
        $reservationTypeLine->save();

        return response()->redirectToRoute('dashboard.tickets.reservation-type-lines.show', [$reservationTypeLine->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response
    {
        $reservationTypeLine = ReservationTypeLine::findOrFail($id);

        return response()->view('dashboard.tickets.reservation-type-lines.show', compact(['reservationTypeLine']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function edit(string $id): Response
    {
        $reservationTypeLine = ReservationTypeLine::findOrFail($id);

        return response()->view('dashboard.tickets.reservation-type-lines.edit', compact(['reservationTypeLine']));
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
        $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'placeholder' => 'nullable|string|max:255',
            'is_required' => 'nullable|boolean',
        ]);

        $reservationTypeLine = ReservationTypeLine::findOrFail($id);

        $reservationTypeLine->update($request->only($reservationTypeLine->getFillable()));
        $reservationTypeLine->is_required = $request->has('is_required');
        $reservationTypeLine->save();

        return response()->redirectToRoute('dashboard.tickets.reservation-type-lines.show', [$reservationTypeLine->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Response
     */
    public function destroy(string $id): Response
    {
        //
    }
}
