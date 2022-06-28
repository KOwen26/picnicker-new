<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.admin.employees');
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
        $employee = new Employees();
        $employee->employee_name = $request->employee_name;
        $employee->employee_gender = $request->employee_gender;
        $employee->employee_email = $request->employee_email;
        $employee->employee_phone = $request->employee_phone;
        $employee->employee_address = $request->employee_address;
        $employee->employee_password = "admin123";
        $employee->employee_status = "ACTIVE";
        $employee->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Employees $employees)
    {
        //
        $route = "admin.employee.update";
        return view('livewire.employees.employees-details', ['route' => $route, 'employee' => $employees::find($request->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {
        //
        $employee = $employees::find($request->employee_id);
        $employee->employee_name = $request->employee_name;
        $employee->employee_gender = $request->employee_gender;
        $employee->employee_email = $request->employee_email;
        $employee->employee_phone = $request->employee_phone;
        $employee->employee_address = $request->employee_address;
        $employee->employee_status = $request->employee_status;
        $employee->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employees $employees)
    {
        //
        $employees::destroy($request->id);
        return redirect()->back();
    }
}