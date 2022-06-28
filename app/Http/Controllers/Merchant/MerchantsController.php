<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Merchant\Merchants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant\MerchantType;

class MerchantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex(MerchantType $merchant_types)
    {
        //
        return view('pages.admin.merchants', ['merchant_types' => $merchant_types->all()]);
    }

    public function merchantIndex()
    {
        //
        return view('pages.merchant.merchant-transaction');
    }

    public function merchantReport()
    {
        //
        return view('pages.merchant.merchant-report');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function show(Merchants $merchants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchants $merchants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchants $merchants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchants $merchants)
    {
        //
    }
}