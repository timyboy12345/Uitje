<?php

namespace App\Http\Controllers\Dashboard\Content;

use App\Http\Controllers\Controller;
use App\Models\Poi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PoisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $pois = Poi::paginate();

        return response()->view('dashboard.content.pois.index', ['pois' => $pois]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('dashboard.content.pois.create');
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
            'name' => 'required|string|max:255',
            'shortname' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string'
        ]);

        $poi = new Poi();
        $poi->id = Str::uuid()->toString();
        $poi->organization_id = Auth::user()->organization_id;
        $poi->fill($request->only($poi->getFillable()));
        $poi->save();

        return response()->redirectToRoute('dashboard.content.pois.show', $poi->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Poi $poi
     * @return Response
     */
    public function show(Poi $poi): Response
    {
        return response()->view('dashboard.content.pois.show', ['poi' => $poi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Poi $poi
     * @return Response
     */
    public function edit(Poi $poi): Response
    {
        return response()->view('dashboard.content.pois.edit', ['poi' => $poi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Poi $poi
     * @return RedirectResponse
     */
    public function update(Request $request, Poi $poi): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'shortname' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'entrance_lat' => 'nullable|numeric',
            'entrance_lng' => 'nullable|numeric',
            'is_enabled' => 'boolean',
        ]);

        $poi->update($request->only($poi->getFillable()));
        $poi->is_enabled = $request->boolean('is_enabled');

        $poi->save();

        return response()->redirectToRoute('dashboard.content.pois.show', $poi->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Poi $poi
     * @return Response
     */
    public function destroy(Poi $poi): Response
    {
        //
    }
}
