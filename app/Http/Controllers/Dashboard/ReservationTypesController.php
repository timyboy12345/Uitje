<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReservationType;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReservationTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $reservationTypes = Auth::user()->organization->reservationTypes()->paginate();

        return response()->view('dashboard.reservation-types.index', compact(['reservationTypes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('dashboard.reservation-types.create');
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:reservation_types,slug',
            'description' => 'required|string',
            'has_participants' => 'boolean',
            'has_accompanists' => 'boolean',
            'date_type' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0'
        ]);

        /** @var User $user */
        $user = Auth::user();

        $reservationType = new ReservationType();
        $reservationType->id = Str::uuid()->toString();
        $reservationType->fill($request->only($reservationType->getFillable()));
        $reservationType->organization_id = $user->organization_id;
        $reservationType->save();

        return response()->redirectToRoute('dashboard.reservation-types.show', $reservationType->id);
    }

    public function postFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);
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
        $dateTypes = $this->getDateTypes();

        return response()->view('dashboard.reservation-types.edit', compact(['reservationType', 'dateTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $reservationType = ReservationType::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'has_participants' => 'boolean',
            'has_accompanists' => 'boolean',
            'price' => 'nullable|numeric|min:0'
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
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $reservationType = ReservationType::findOrFail($id);
        $reservationType->delete();
        return response()->redirectToRoute('dashboard.reservation-types.index');
    }

    /**
     * @return string[][]
     */
    private function getDateTypes(): array
    {
        return [[
            'value' => 'date',
            'title' => 'Datum'
        ], [
            'value' => 'datetime',
            'title' => 'Datum en Tijd'
        ], [
            'value' => 'time',
            'title' => 'Tijd'
        ]];
    }
}
