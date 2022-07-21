<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur as Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class FournisseurController extends Controller
{
    public function listmanager(){
        
        $fournisseurs = Fournisseur::all();
        return view('fournisseurManager', [
        'fournisseurs' => $fournisseurs
        ]);
       }
       public function goToEdit($fournisseur){
        $fournisseur = Fournisseur::find($fournisseur);
        //dd($fournisseur);
       // return view('fournisseurs.show', compact('fournisseur'));
       return view('Editfournisseur',[
        'fournisseur'=>$fournisseur
    ]);
    }

        

       public function store(Request $request){
        $fournisseur = new Fournisseur();
        $fournisseur->raison_sociale = $request->raison_sociale;
        $fournisseur->save();
        return redirect('FournisseurManager')->with('success', 'fournisseur Ajouté.');
     
         }
      public function delete($fournisseur){
        $fournisseur = Fournisseur::find($fournisseur);
        $fournisseur->delete();
        return redirect('FournisseurManager')->with('success', 'fournisseur supprimé.');
        
    }
    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'raison_sociale'=>'required',
            
            
        ]); 
        $fournisseur = Fournisseur::find($id);
        // Getting values from the blade temfournisseure form
        $fournisseur->raison_sociale =  $request->get('raison_sociale');
        $fournisseur->save();
 
        return redirect('FournisseurManager')->with('success', 'Fournisseur updated.'); // -> resources/views/fournisseurs/index.blade.php
    }

    public function show($fournisseur){
        $fournisseur = fournisseur::find($fournisseur);
        return view('fournisseurShow.show', compact('fournisseur'));
    }
}
