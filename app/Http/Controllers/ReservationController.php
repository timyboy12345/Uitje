<?php

namespace App\Http\Controllers;

use App\Models\ReservationType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $slug
     * @return View
     */
    public function index(string $slug): View
    {
        $reservationType = ReservationType::where('slug', $slug)->firstOrFail();

        return view('reserve', compact(['reservationType']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $slug
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(string $slug, Request $request): RedirectResponse
    {
        $reservationType = ReservationType::where('slug', $slug)->firstOrFail();
        $rules = [];

        foreach ($reservationType->reservationTypeLines as $line) {
            switch ($line->type) {
                case 'address':
                    $rules["{$line->id}postalcode"] = 'required';
                    $rules["{$line->id}number"] = 'required';
                    $rules["{$line->id}streetname"] = 'required';
                    $rules["{$line->id}city"] = 'required';
                    break;
                default:
                    $rules[$line->id] = 'required';
                    break;
            }
        }

        $request->validate($rules);

        return redirect()->route('home');
    }
}
