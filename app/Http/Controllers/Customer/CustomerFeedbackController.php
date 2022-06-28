<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer\CustomerFeedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.customer_feedback');
    }

    public function merchantIndex()
    {
        return view('pages.merchant.merchant-feedback');
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
     * @param  \App\Models\Customer\CustomerFeedback  $customerFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer\CustomerFeedback  $customerFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer\CustomerFeedback  $customerFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer\CustomerFeedback  $customerFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerFeedback $customerFeedback)
    {
        //
    }
}