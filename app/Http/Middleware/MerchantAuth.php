<?php

namespace App\Http\Middleware;

use App\Models\Merchant\Merchants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(auth()->user('merchant'));
        // dd(auth()->guard('merchant')->guest());
        if (Auth::guard('merchant')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect(route('merchant.login'));
            }
        }
        // $merchant_owner = auth()->guard('merchant')->user();
        // $merchant = Merchants::where('merchant_owner_id', $merchant_owner->merchant_owner_id)->first();
        // // dd($merchant, $merchant?->merchant_status !== 'ACTIVE');
        // if (!$merchant || $merchant?->merchant_status !== 'ACTIVE') {
        //     return redirect(route('merchant.finalize'));
        // } else {
        // }
        return $next($request);
    }
}