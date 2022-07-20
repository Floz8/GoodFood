<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant as Restaurant;
use App\Models\Plat as Plat;

class ApiControler extends Controller
{

    // todo auth avec api key et msg error auth code 403

    // restaurant
    public function listApiRestaurant(){
        return response()->json(Restaurant::all());
    }
    
    public function FindOneApiRestaurant($id){
        $restau = Restaurant::find($id); 
        if($restau){
            return response()->json(  ["body" => $restau], 201);
        }else{
            return response()->json(["status" => "Not found"],204);
        }
    }
    public function createApiRestaurant(Request $request){
        $item = Restaurant::create($request->all());
        return response()->json([$item],201);
    }
    
    public function deleteApiRestaurant($id){
        $restau = Restaurant::find($id);
        if($restau){
            $restau->delete();
            return response()->json(["status" => "success"],200);
        }else{
            return response()->json(["status" => "error"],500);
        }
    }

    //plat
    public function listApiPlat(){
        return response()->json(Plat::all());
    }

    public function FindOneApiPlat($id,$idPlat){
        $plat = Plat::where('id',$idPlat)->first(); 
        if($plat){
            return response()->json(  ["body" => $plat], 200);
        }else{
            return response()->json(["status" => "not found"],204);
        }
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
