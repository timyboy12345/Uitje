<?php

namespace App\Http\Controllers\Dashboard\Content;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(): Response
    {
        /** @var User $user */
        $user = Auth::user();
        $organization = $user->organization;
        return response()->view('dashboard.content.shop.index', [
            'organization' => $organization
        ]);
    }

    public function edit(): Response
    {
        return response()->view('dashboard.content.shop.edit');
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        return response()->redirectToRoute('dashboard.content.shop.index');
    }
}
