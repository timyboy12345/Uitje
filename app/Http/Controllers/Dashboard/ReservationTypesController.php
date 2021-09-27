<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReservationType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $reservationTypes = ReservationType::paginate();

        return response()->view('dashboard.reservation-types.index', compact(['reservationTypes']));
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
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response
    {
        $reservationType = ReservationType::findOrFail($id);

        return response()->view('dashboard.reservation-types.show', compact(['reservationType']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function edit(string $id): Response
    {
        $reservationType = ReservationType::findOrFail($id);

        return response()->view('dashboard.reservation-types.edit', compact(['reservationType']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $reservationType = ReservationType::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'has_participants' => 'boolean',
            'has_accompanists' => 'boolean'
        ]);

        $reservationType->update($request->only($reservationType->getFillable()));
        $reservationType->has_participants = $request->has('has_participants');
        $reservationType->has_accompanists = $request->has('has_accompanists');
        $reservationType->save();

        return response()->redirectToRoute('dashboard.reservation-types.show', [$reservationType->id]);
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
