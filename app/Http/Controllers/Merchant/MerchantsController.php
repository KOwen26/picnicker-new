<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Merchant\Merchants;
use App\Http\Controllers\Controller;
use App\Models\Merchant\MerchantType;
use Illuminate\Support\Facades\Storage;

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

    public function customerIndex(Merchants $merchants)
    {
        return view('pages.customer.merchants-list', ['merchants' => $merchants->Restaurant()->status('ACTIVE')->get()]);
    }

    public function apiIndex(Merchants $merchants)
    {
        $merchants = $merchants::TourismVillage()->Status('ACTIVE')->get()->map(function ($value, $key) {
            $merchant_pictures = collect(json_decode($value->merchant_pictures, true))[0];
            $merchant_pictures = asset(str_replace('public', 'storage',  $merchant_pictures['picture_location']) . '\\' .  $merchant_pictures['picture_filename']);
            return [
                'attraction_id' => $value->merchant_id,
                'attraction_name' => $value->merchant_name,
                'attraction_location' => Str::title($value->Cities?->city_name . ', ' . $value->Cities?->Provinces->province_name),
                'attraction_image' => $merchant_pictures,
                'attraction_rating' => 0,
                'attraction_review' => 0,
            ];
        });

        return response()->json($merchants, 200);
    }

    public function search(Request $request, Merchants $merchants)
    {
        $merchants = $merchants::Restaurant()->Status('ACTIVE')->get();
        $merchant_distance = $merchants->map(function ($item) use ($request) {
            $latitude = $request->latitude ?? -7.2820496;
            $longitude = $request->longitude ?? 112.7722238;
            $item['merchant_distance'] = haversine($latitude, $longitude, $item->merchant_location_latitude, $item->merchant_location_longitude);
            return $item;
        })->sortBy(['merchant_distance', 'asc']);
        return response()->json($merchant_distance, 200);
    }

    public function searchIndex($params = null)
    {
        return view('pages.customer.search-result', ['params' => $params]);
    }

    public function apiSearch($params, Merchants $merchants)
    {
        $merchants = $merchants::TourismVillage()->Status('ACTIVE')->join('merchant_owner', 'merchants.merchant_owner_id', '=', 'merchant_owner.merchant_owner_id')->join('cities', 'merchants.city_id', '=', 'cities.city_id')->join('provinces', 'cities.province_id', '=', 'provinces.province_id')->where(function ($query) use ($params) {
            $query->where('merchant_name', 'LIKE', '%' . $params . '%')
                ->orWhere('merchant_owner.merchant_owner_name', 'LIKE', '%' . $params . '%')
                ->orWhere('cities.city_name', 'LIKE', '%' . $params . '%')
                ->orWhere('provinces.province_name', 'LIKE', '%' . $params . '%');
        })->get()->map(function ($value, $key) {
            $merchant_pictures = collect(json_decode($value->merchant_pictures, true))[0];
            $merchant_pictures = asset(str_replace('public', 'storage',  $merchant_pictures['picture_location']) . '\\' .  $merchant_pictures['picture_filename']);
            // $merchant_pictures = Storage::url($merchant_pictures['picture_location'] . '\\' .  $merchant_pictures['picture_filename']);
            return [
                'attraction_id' => $value->merchant_id,
                'attraction_name' => $value->merchant_name,
                'attraction_location' => Str::title($value->Cities?->city_name . ', ' . $value->Cities?->Provinces->province_name),
                'attraction_image' => $merchant_pictures,
                'attraction_rating' => 0,
                'attraction_review' => 0,
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


    public function apiShow($id, Merchants $merchants)
    {
        $merchant = $merchants::find($id);
        $merchant_pictures = collect(json_decode($merchant->merchant_pictures, true))->map(function ($value, $key) {
            return asset(str_replace('public', 'storage', $value['picture_location']) . '\\' . $value['picture_filename']);
        });
        $merchant_facilities = $merchant?->MerchantFacilities?->map(function ($value, $key) {
            return ['facility_id' => $value->facility_id, 'facility_name' => $value?->Facilities?->facility_name];
        });
        $merchant_products = $merchant?->Products?->map(function ($value, $key) {
            return [['ticket_id' => $value->product_id, 'ticket_name' => $value->product_name, 'ticket_price' => (int) $value->product_sell_price]];
        });
        $merchant_review = null;
        // [
        //     [
        //         'rating' => null, 'review_count' => null, 'review' => [
        //             "review_id" => null,
        //             "reviewer_name" => null,
        //             "reviewer_avatar" => null,
        //             "reviewer_rating" => null,
        //             "reviewer_comment" => null
        //         ]
        //     ]
        // ];

        $merchant = [
            'merchant_id' => $merchant->merchant_owner_id,
            'merchant_name' => $merchant->MerchantOwner->merchant_owner_name,
            'merchant_image_url' => $merchant_pictures,
            'attraction_id' => $merchant->merchant_id,
            'attraction_name' => $merchant->merchant_name,
            'attraction_location' => Str::title($merchant->Cities?->city_name . ', ' . $merchant->Cities?->Provinces->province_name),
            'attraction_description' => $merchant->merchant_description,
            'attraction_facility' => $merchant_facilities,
            'attraction_ticket' => $merchant_products,
            'attraction_review' => $merchant_review,
        ];

        return response()->json($merchant, 200);
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