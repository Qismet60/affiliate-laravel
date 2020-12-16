<?php

namespace App\Http\Controllers;

use App\Http\Requests\Menu\MenuRequest;
use App\Models\Company;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return response()->json([
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $validated = $request->validated();
        $resId =(int) $validated['restaurant_id'];
        $compId = (int) $validated['company_id'];
        $res = Restaurant::find($resId);
        if(!$res){
            return response()->json([
                'message' => 'Restaurant not found'
            ]);
        }
        $comp = Company::find($compId);
        if(!$comp){
            return response()->json([
                'message' => 'Company not found'
            ]);
        }
        $menu = Menu::create($request->validated());
        return response()->json([
            'menu' => $menu
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        if(!$menu){
            return response()->json([
                'message' => 'Menu not found'
            ]);
        }else{
            return response()->json([
                'menu' => $menu
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::find($id);
        if(!$menu){
            return response()->json([
                'message' => 'Menu not found'
            ]); 
        }else{
            $menu->update($request->validated());
            return response()->json([
                'menu' => $menu
            ]);
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
        $menu = Menu::find($id);
        if(!$menu){
            return response()->json([
                'message' => 'Menu not found'
            ]); 
        }else{
            $menu->delete();
            return response()->json([
                'menu' => 'Menu Delete'
            ]);
        }
    }
}
