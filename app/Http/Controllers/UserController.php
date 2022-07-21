<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(){
        
        $users = User::all();
        return view('/accueil', [
        'users' => $users
        ]);
       }
       public function listmanager(){
        
        $users = User::all();
        return view('UserManager', [
        'users' => $users
        ]);
       }
       public function show($user){
        $user = User::find($user);
        //dd($user);
       // return view('users.show', compact('user'));
       return view('user',[
        'user'=>$user
    ]);
    }
    public function goToEdit($user){
        $user = User::find($user);
        //dd($user);
       // return view('users.show', compact('user'));
       return view('EditUser',[
        'user'=>$user
    ]);
    }
    public function delete($user){
        $user = User::find($user);
        $user->delete();
        return redirect('UserManager')->with('success', 'user supprimé.');
        
    }
    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('UserManager')->with('success', 'user Ajouté.');
     
         }

         
         public function update(Request $request, $id)
         {
             // Validation for required fields (and using some regex to validate our numeric value)
             $request->validate([
                 'name'=>'required',
                 
             ]); 
             $user = User::find($id);
             // Getting values from the blade template form
             $user->name =  $request->get('name');
             $user->save();
      
             return redirect('UserManager')->with('success', 'user updated.'); // -> resources/views/users/index.blade.php
         }
}

        


        /*
    public function deleteuser(Request $request) {
        $user = user::find($request->id);
        $user->delete();
        return(back());
    }
    public function modifieruser(Request $request){}

    public function show($user){
        $user = user::find($user);
        return view('userShow.show', compact('user'));
    }*/

