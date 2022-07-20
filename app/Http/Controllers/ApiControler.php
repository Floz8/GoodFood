<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant as Restaurant;
use App\Models\Plat as Plat;

class ApiControler extends Controller
{

    // restaurant
    public function listApiRestaurant(){
        return response()->json(Restaurant::all());
    }
    
    public function FindOneApiRestaurant($id){
        $restau = Restaurant::find($id); 
        if($restau){
            return response()->json(  ["body" => $restau], 201);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    public function createApiRestaurant(Request $request){
        $item = Restaurant::create($request->all());
        return response()->json($item);
    }
    
    public function deleteApiRestaurant($id){
        $restau = Restaurant::find($id);
        if($restau){
            $restau->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }

    //plat
    public function listApiPlat(){
        return response()->json(Plat::all());
    }
/*
    //fournisseur
     public function listApiRestaurant(){
        return response()->json(Restaurant::all());
    }
    
    public function FindOneApiRestaurant($id){
        $restau = Restaurant::find($id); 
        if($restau){
            return response()->json(  ["body" => $restau], 201);
        }else{
            return response()->json(["status" => "error"]);
        }
    }
    public function createApiRestaurant(Request $request){
        $item = Restaurant::create($request->all());
        return response()->json($item);
    }
    
    public function deleteApiRestaurant($id){
        $restau = Restaurant::find($id);
        if($restau){
            $restau->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }*/
}
