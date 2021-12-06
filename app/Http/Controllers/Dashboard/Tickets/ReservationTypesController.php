<?php

namespace App\Http\Controllers\Dashboard\Tickets;

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

        return response()->view('dashboard.tickets.reservation-types.index', compact(['reservationTypes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('dashboard.tickets.reservation-types.create');
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

        return response()->redirectToRoute('dashboard.tickets.reservation-types.show', $reservationType->id);
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

        return response()->view('dashboard.tickets.reservation-types.show', compact(['reservationType']));
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

        return response()->view('dashboard.tickets.reservation-types.edit', compact(['reservationType', 'dateTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return false|RedirectResponse|string
     */
    public function update(Request $request, string $id)
    {
        $reservationType = ReservationType::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'has_participants' => 'boolean|required_with:min_participants',
            'has_accompanists' => 'boolean|required_with:min_accompanists',
            'min_participants' => 'required_with:max_participants|numeric|min:0',
            'max_participants' => 'nullable|numeric|min:0|gte:min_participants',
            'min_accompanists' => 'required_with:max_accompanists|numeric|min:0',
            'max_accompanists' => 'nullable|numeric|min:0|gte:min_accompanists',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|file'
        ]);

        $reservationType->update($request->only($reservationType->getFillable()));
        $reservationType->has_participants = $request->has('has_participants');
        $reservationType->has_accompanists = $request->has('has_accompanists');
        $reservationType->save();

        if ($request->has('image')) {
            $file = $request->file('image');
            $location = $file->store('reservation-types');
            $reservationType->image = $location;
            $reservationType->save();
        }

        return response()->redirectToRoute('dashboard.tickets.reservation-types.show', [$reservationType->id]);
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
        return response()->redirectToRoute('dashboard.tickets.reservation-types.index');
    }

    /**
     * @return string[][]
     */
    private function getDateTypes(): array
    {
        return [
            [
                'value' => 'date',
                'title' => 'Datum',
            ], [
                'value' => 'datetime',
                'title' => 'Datum en Tijd',
            ], [
                'value' => 'time',
                'title' => 'Tijd',
            ],
        ];
    }
}
