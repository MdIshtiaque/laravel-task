<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::orderBy("id", "desc")->paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = companies::get(['id', 'name']);
        return view('employee.create',  compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employees::create([

            'first_name' => $request->first_name,
            'last_name' =>$request->last_name,
            'company_id' => $request->id,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);
        Session::flash('status','Info created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::get(['id', 'name']);
        $employees = Employees::find($id);
        return view('employee.edit', compact('companies','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employees = Employees::find($id);

        //dd($request->all());
        $employees->update([
            'first_name' => $request->first_name,
            'last_name' =>$request->last_name,
            'company_id' => $request->id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        Session::flash('status', 'Employee info Updated successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id)->delete();
        Session::flash('status', 'Employee info Deleted successfully');
        return redirect()->route('employee.index');
    }
}
