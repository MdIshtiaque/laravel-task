<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Postimage;



class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::orderBy("id", "desc")->paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->file('logo')){
            $file = $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('app/public'), $filename);
        }
        Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $filename,
            'website' =>$request->website,
        ]);

        Session::flash('status','Info created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('company.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companies = Companies::find($id);

        //dd($request->all());
        $companies->update([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $request->logo,
            'website' => $request->website,

        ]);
        Session::flash('status', 'Company info Updated successfully');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id)->delete();

        Session::flash('status','Company info Deleted successfully');

        return redirect()->route('company.index');
    }
}
