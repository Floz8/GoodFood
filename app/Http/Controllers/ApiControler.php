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
         return response()->json($resto);
    }
    
    public function FindOneApiRestaurant($id){
        $item = Restaurant::find($id); 
        if($item){
            return response()->json(  ["body" => $item], 201);
        }else{
            return response()->json(["status" => "Not found"],204);
        }
    }
    public function CreateApiRestaurant(Request $request){
          // La validation de données
          $this->validate($request, [
            'Nom' => 'required|max:100'
         ]);
 
         $item = Restaurant::create([
             "Nom" => $request->Nom,
         ]);
 
            return response()->json($item, 201);
     }

    public function UpdateApiRestaurant($id){
       $this->validate($request, [
        'Nom' => 'required|max:100',
     ]);
     $item->update([
         "Nom" => $request->Nom
     ]);
      return response()->json();
    }
    
    public function DeleteApiRestaurant($id){
        $item = Restaurant::find($id);
        if($item){
            $item->delete();
            return response()->json(["status" => "success"],200);
        }else{
            return response()->json(["status" => "error"],500);
        }
    }

    //plat
    public function ListApiPlat(){
        return response()->json(Plat::all());
    }

    public function FindOneApiPlat($id){
        $item = Plat::find($id);
        if($item){
            return response()->json(  ["body" => $plat], 200);
        }else{
            return response()->json(["status" => "not found"],204);
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

          return response()->json($item, 201);
   }

  public function UpdateApiPlat($id){
     $this->validate($request, [
        'Nom' => 'required|max:100',
        'prix' =>'required',
        'restaurants_id' => 'required'
   ]);

   $user->update([
       "Nom" => $request->Nom,
           "prix " =>$request-> prix,
           "restaurants_id" => $request->restaurants_id
   ]);
   return response()->json();
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
