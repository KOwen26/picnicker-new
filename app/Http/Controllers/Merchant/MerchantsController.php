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
    public function index(Merchants $merchants)
    {
        //
    }

    public function apiIndex(Merchants $merchants)
    {
        $merchants = $merchants::all()->map(function ($value, $key) {
            $merchant_pictures = collect(json_decode($value->merchant_pictures, true))->map(function ($value, $key) {
                return asset(str_replace('public', 'storage', $value['picture_location']) . '\\' . $value['picture_filename']);
            });
            $merchant_facilities = $value?->MerchantFacilities?->map(function ($value, $key) {
                return ['facility_id' => $value->facility_id, 'facility_name' => $value?->Facilities?->facility_name];
            });
            $merchant_products = [['ticket_id' => null, 'ticket_name' => null, 'review_price' => null]];
            $merchant_review = [['review_id' => null, 'review_name' => null, 'review_rating' => null, 'review_comment' => null]];
            return [
                'merchant_id' => $value->merchant_owner_id,
                'merchant_name' => $value->MerchantOwner->merchant_owner_name,
                'merchant_image_url' => $merchant_pictures,
                'attraction_id' => $value->merchant_id,
                'attraction_name' => $value->merchant_name,
                'attraction_location' => null, #$value->city_id?->Cities?->city_name,
                'attraction_description' => $value->merchant_description,
                'attraction_facility' => $merchant_facilities,
                'attraction_ticket' => $merchant_products,
                'attraction_review' => $merchant_review,
            ];
        });

        return response()->json($merchants, 200);
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
