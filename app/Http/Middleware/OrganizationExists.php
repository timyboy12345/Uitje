<?php

namespace App\Http\Middleware;

use App\Models\Organization;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrganizationExists
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $subdomain = $request->route('park');
        $organization = Organization::where('subdomain', $subdomain)->first();

        if (!isset($organization)) {
            return response()->json(['o' => $organization, 's' => $subdomain]);
        }

        Session::push('verified_organization_id', $organization->id);

        return $next($request);
    }
}
