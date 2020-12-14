<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyRequest;
use App\Models\Company;
use App\Models\Restaurant;
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
        $companies = Company::all();
        return response()->json([
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {   
        $company = Company::create($request->validated());
        return response()->json([
            'company' => $company
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $company = Company::find($id);
        if(!$company){
            return response()->json([
                'status' => false,
                'message' => 'company not found'
            ],404);
        }
        else{
            return response()->json([
                'status' => true,
                'company' => $company
            ],200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request,int $id)
    {
        $company = Company::find($id);
        if(!$company){
            return response()->json([
                'status' => false,
                'message' => 'company not found'
            ],404);
        }else{
            $company->update($request->validated());
            return response()->json([
                'status' => true,
                'company' => $company
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if(!$company){
            return response()->json([
                'status' => false,
                'message' => 'company not found'
            ],404);
        }else{
            $company->delete();
            return response()->json([
                'status' => true,
                'message' => 'company delete'
            ],200);
        }
       
    }
    public function restaurants(int $id){
        $res = Restaurant::where('company_id',$id)->get();
        return response()->json([
            'restaurants' => $res
        ]);
    }
}
