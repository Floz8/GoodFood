<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant as Restaurant;
use App\Models\Plat as Plat;

class ApiControler extends Controller
{
/*
 public function index()
    {
        // On récupère tous les utilisateurs
        $users = User::all();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // La validation de données
        $this->validate($request, [
           'name' => 'required|max:100',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8'
        ]);

        // On crée un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        // La validation de données
        $this->validate($request, [
           'name' => 'required|max:100',
           'email' => 'required|email',
           'password' => 'required|min:8'
        ]);

        // On modifie les informations de l'utilisateur
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        // On retourne la réponse JSON
        return response()->json();
    }

    public function destroy(User $user)
    {
        // On supprime l'utilisateur
        $user->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
*/
    // todo auth avec api key et msg error auth code 403

    // restaurant
    public function ListApiRestaurant(){
         $resto = Restaurant::all();
         if($resto){
            return response()->json(  ["body" => $resto], 200);
        }else{
            return response()->json(["status" => "No content"],204);
        }
    }
    
    public function FindOneApiRestaurant($id){
        $item = Restaurant::find($id); 
        if($item){
            return response()->json(  ["body" => $item], 200);
        }else{
            return response()->json(["status" => "No content"],204);
        }
    }

    public function CreateApiRestaurant(Request $request){
         $restaurant = Restaurant::store($request->all());
        if($restaurant){
            return response()->json(  ["body" => $restaurant], 201);
        }else{
            return response()->json(["status" => "Bad request"],400);
        }
    }

    public function UpdateApiRestaurant(Request $request,$id){
       $this->validate($request, [
        'Nom' => 'required|max:100',
     ]);
     $restaurant = Restaurant::find($id);
     $restaurant->Nom =  $request->get('Nom');
     $restaurant->save();
    if($restaurant){
        return response()->json(  ["body" => $restaurant], 201);
    }else{
            return response()->json(["status" => "Bad request"],400);
        }
    }
    
    public function DeleteApiRestaurant(Request $request,$id){
        $restaurant = Restaurant::find($id);
        if($restaurant){
         $restaurant->delete();
            return response()->json(["status" => "success"],201);
        }else{
            return response()->json(["status" => "error"],500);
        }
    }

    //plat
    public function ListApiPlat(){
        $item=  Plat::all();
        if($item){
            return response()->json(  ["body" => $item], 200);
        }else{
            return response()->json(["status" => "no content"],204);
        }
    }

    public function FindOneApiPlat($id){
        $item = Plat::find($id);
        if($item){
            return response()->json(  ["body" => $item], 200);
        }else{
            return response()->json(["status" => "no content"],204);
        }
    }

    public function CreateApiPlat(Request $request){
     $this->validate($request, [
        'Nom' => 'required|max:100',
          'prix' =>'required',
        'restaurants_id' => 'required'
     ]);

       $item = Plat::create([
           "Nom" => $request->Nom,
           "prix " =>$request-> prix,
           "restaurants_id" => $request->restaurants_id
       ]);
       if($item){
        return response()->json(  ["body" => $item], 201);
    }else{
        return response()->json(["status" => "no content"],204);
    }
    }

  public function UpdateApiPlat($id){
        $this->validate($request, [
         'Nom' => 'required|max:100',
        'prix' =>'required',
        'restaurants_id' => 'required'
      ]);

   $plat->update([
       "Nom" => $request->Nom,
           "prix " =>$request-> prix,
           "restaurants_id" => $request->restaurants_id
   ]);
   if ($plat){
   return response()->json(["status" => "success"],201);
}else{
    return response()->json(["status" => "Bad request"],400);
}
     }

  public function DeleteApiPlat($id){
    $item = Plat::find($id);
    if($item){
    $item->delete();
        return response()->json(["status" => "success"],200);
    }else{
        return response()->json(["status" => "error"],500);
    }
  }
}
