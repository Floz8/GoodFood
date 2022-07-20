<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiControler extends Controller
{
    public function listApiRestaurant(){
        return response()->json(Restaurant::all());
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
    
}
