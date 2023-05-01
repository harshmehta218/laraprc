<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\create;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Company::all();
        return view('admin.company.companyList',compact('companys'));
    }

    public function create()
    {
        return  view('admin.company.company');
    }

    public function store(create $request)
    {
        $company = Company::create([
            'name' => $request->name
        ]);

        if ($company) {
            return redirect()->route('company.list');
        }
    }

    public function show($id)
    {
        // $company = Compa
    }
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.editCompany',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::updated([
            'name' => $request->name,
        ]);

        if($company)
        {
            return redirect()->route('company.list')->with('message', 'updated sucessfully');
        }
    }

    public function delete($id)
    {
        $company = Company::find($id);
        if($company->delete())
        {
            return redirect()->route('company.list')->with('message', 'deleted sucessfully');
        }
    }
}
