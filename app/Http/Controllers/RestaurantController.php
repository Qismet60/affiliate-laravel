<?php

namespace App\Http\Controllers;

use App\Http\Requests\Restaurant\RestaurantRequest;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Restaurant::all();
        return response()->json([
            'restaurants' => $res
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $res = Restaurant::create($request->validated());
        return response()->json([
            'Restaurants' => $res
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Restaurant::find($id);
        if(!$res){
            return response()->json([
                'message' => 'Restaurant not found'
            ],404);
        }else{
            return response()->json([
                'message' => $res
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
    public function update(RestaurantRequest $request, $id)
    {
        $res =  Restaurant::find($id);
        if(!$res){
            return response()->json([
                'message' => 'Restaurant not found'
            ],404);
        }else{
            $res->update($request->validated());
            return response()->json([
                'message' => $res
            ],200);
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
        $res =  Restaurant::find($id);
        if(!$res){
            return response()->json([
                'message' => 'Restaurant not found'
            ],404);
        }else{
            $res->delete();
            return response()->json([
                'message' => 'Restaurant delete'
            ],200);
        }
    }
    public function menus($id){
        $menu = Menu::where('restaurant_id',$id)->get();
    }
}
