<?php

namespace App\Http\Controllers;

use App\Models\Restaurant as Restaurant;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class RestaurantController extends Controller
{
    public function list(){
        
        $restaurants = Restaurant::all();
        return view('/accueil', [
        'restaurants' => $restaurants
        ]);
       }
       public function listmanager(){
        
        $restaurants = Restaurant::all();
        return view('RestaurantManager', [
        'restaurants' => $restaurants
        ]);
       }
       public function show($restaurant){
        $restaurant = Restaurant::find($restaurant);
        //dd($restaurant);
       // return view('restaurants.show', compact('restaurant'));
       return view('restaurant',[
        'restaurant'=>$restaurant
    ]);
    }
    public function goToEdit($restaurant){
        $restaurant = Restaurant::find($restaurant);
        //dd($restaurant);
       // return view('restaurants.show', compact('restaurant'));
       return view('EditResto',[
        'restaurant'=>$restaurant
    ]);
    }
    public function delete($restaurant){
        $restaurant = Restaurant::find($restaurant);
        $restaurant->delete();
        return redirect('RestaurantManager')->with('success', 'Restaurant supprimé.');
        
    }
    public function store(Request $request){
        $restaurant = new Restaurant();
        $restaurant->Nom = $request->Nom;
        $restaurant->save();
        return redirect('RestaurantManager')->with('success', 'Restaurant Ajouté.');
     
         }
         public function update(Request $request, $id)
         {
             // Validation for required fields (and using some regex to validate our numeric value)
             $request->validate([
                 'Nom'=>'required',
                 
             ]); 
             $restaurant = Restaurant::find($id);
             // Getting values from the blade template form
             $restaurant->Nom =  $request->get('Nom');
             $restaurant->save();
      
             return redirect('RestaurantManager')->with('success', 'restaurant updated.'); // -> resources/views/restaurants/index.blade.php
         }
}

        


        /*
    public function deleterestaurant(Request $request) {
        $restaurant = restaurant::find($request->id);
        $restaurant->delete();
        return(back());
    }
    public function modifierrestaurant(Request $request){}

    public function show($restaurant){
        $restaurant = restaurant::find($restaurant);
        return view('restaurantShow.show', compact('restaurant'));
    }*/

