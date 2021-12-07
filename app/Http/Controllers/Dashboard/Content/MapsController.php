<?php

namespace App\Http\Controllers\Dashboard\Content;

use App\Http\Controllers\Controller;
use App\Models\Map;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $maps = Map::all();

        return response()->view('dashboard.content.maps.index', [
            'maps' => $maps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('dashboard.content.maps.create');
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
            'file' => 'required|file',
        ]);

        $map = new Map();
        $map->id = Str::uuid()->toString();
        $map->organization_id = Auth::user()->organization_id;
        $map->name = $request->input('name');
        $map->image = $request->file('file')->store('maps');
        $map->save();

        return response()->redirectToRoute('dashboard.content.maps.show', $map->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Map $map
     * @return Response
     */
    public function show(Map $map)
    {
        return response()->view('dashboard.content.maps.show', [
            'map' => $map,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Map $map
     * @return Response
     */
    public function edit(Map $map): Response
    {
        return response()->view('dashboard.content.maps.edit', [
            'map' => $map,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Map $map
     * @return RedirectResponse
     */
    public function update(Request $request, Map $map): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $map->name = $request->input('name');
        $map->save();

        return response()->redirectToRoute('dashboard.content.maps.show', $map->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Map $map
     * @return RedirectResponse
     */
    public function destroy(Map $map): RedirectResponse
    {
        Storage::delete($map->image);
        $map->delete();

        return response()->redirectToRoute('dashboard.content.maps.index');
    }
}
