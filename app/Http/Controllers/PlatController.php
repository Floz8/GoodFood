<?php

namespace App\Http\Controllers;

use App\Models\Plat as Plat;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PlatController extends Controller
{
    public function listmanager(){
        
        $plats = Plat::all();
        return view('PlatManager', [
        'plats' => $plats
        ]);
       }
       public function goToEdit($plat){
        $plat = Plat::find($plat);
        //dd($plat);
       // return view('plats.show', compact('plat'));
       return view('EditPlat',[
        'plat'=>$plat
    ]);
    }

        

       public function store(Request $request){
        $plat = new Plat();
        $plat->Nom = $request->Nom;
        $plat->prix = $request->prix;
        $plat->restaurants_id = 0;
        $plat->save();
        return redirect('PlatManager')->with('success', 'plat Ajouté.');
     
         }
      public function delete($plat){
        $plat = Plat::find($plat);
        $plat->delete();
        return redirect('PlatManager')->with('success', 'plat supprimé.');
        
    }
    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'Nom'=>'required',
            'prix' =>'required'
            
        ]); 
        $plat = Plat::find($id);
        // Getting values from the blade template form
        $plat->Nom =  $request->get('Nom');
        $plat->prix = $request->get('prix');
        $plat->save();
 
        return redirect('PlatManager')->with('success', 'plat updated.'); // -> resources/views/plats/index.blade.php
    }

    public function show($plat){
        $plat = Plat::find($plat);
        return view('PlatShow.show', compact('plat'));
    }
}
