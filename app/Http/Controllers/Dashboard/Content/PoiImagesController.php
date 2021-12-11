<?php

namespace App\Http\Controllers\Dashboard\Content;

use App\Http\Controllers\Controller;
use App\Models\Poi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;

class PoiImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Poi $poi
     * @return Response
     */
    public function index(Poi $poi): Response
    {
        return response()->view('dashboard.content.pois.images.index', [
            'poi' => $poi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Poi $poi
     * @return Response
     */
    public function create(Poi $poi): Response
    {
        return response()->view('dashboard.content.pois.images.create', [
            'poi' => $poi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Poi $poi
     * @param Request $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(Poi $poi, Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $poi->addMediaFromRequest('file')->toMediaCollection();

        return response()->redirectToRoute('dashboard.content.pois.images.index', $poi->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Poi $poi
     * @param string $mediaId
     * @return RedirectResponse
     * @throws MediaCannotBeDeleted
     */
    public function destroy(Poi $poi, string $mediaId): RedirectResponse
    {
        $poi->deleteMedia($mediaId);

        return response()->redirectToRoute('dashboard.content.pois.images.index', $poi->id);
    }
}
