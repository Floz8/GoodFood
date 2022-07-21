<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FournisseurController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
//Route::get('/', function () {
   
    //return view('welcome');
});*/

Route::get('/', [RestaurantController::class, 'list']);

Route::get('/accueil', function () {
    return view('accueil');
})->middleware(['auth', 'user'])->name('accueil');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


// ADMIN DASHBOARD
Route::get('/dashboardG', function () {
    return view('dashboardG');
})->middleware(['auth', 'admin'])->name('admin_dashboard');

Route::get('/panier', function () {
    return view('panier');
})->middleware(['auth'])->name('panier');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/panier/{id}', [PanierController::class, 'show'])->name('panier.show');

Route::get('/accueil', [RestaurantController::class, 'list']);
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show');


//CRUD fournisseurs

Route::get('/fournisseurs', function () {
    return view('fournisseurs');
})->middleware(['auth', 'admin'])->name('fournisseurs');

//CRUD Resto
//Liste
Route::get('/RestaurantManager', [RestaurantController::class, 'listmanager']);

//Delete
Route::get('/RestaurantManager/{id}', [RestaurantController::class, 'delete'])->name('restaurants.delete');;

//Create
Route::get('CreateResto', function () {
    return view('CreateResto');
});
Route::Post('CreateResto', [RestaurantController::class, 'store'])->name('restaurants.store');;

//Update
Route::get('/EditResto/{id}', [RestaurantController::class, 'goToEdit'])->name('restaurants.goToEdit');
Route::Post('EditResto/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');;

//CRUD Plat
Route::get('/PlatManager', [PlatController::class, 'listmanager']);

//Delete
Route::get('/PlatManager/{id}', [PlatController::class, 'delete'])->name('plats.delete');;

//Create
Route::get('CreatePlat', function () {
    return view('CreatePlat');
});
Route::Post('CreatePlat', [PlatController::class, 'store'])->name('plats.store');;

//Update
Route::get('/EditPlat/{id}', [PlatController::class, 'goToEdit'])->name('plats.goToEdit');
Route::Post('EditPlat/{id}', [PlatController::class, 'update'])->name('plats.update');;

//CRUD User
Route::get('/UserManager', [UserController::class, 'listmanager']);

//Delete
Route::get('/UserManager/{id}', [UserController::class, 'delete'])->name('users.delete');;

//Create
Route::get('CreateUser', function () {
    return view('CreateUser');
});
Route::Post('CreateUser', [UserController::class, 'store'])->name('users.store');;

//Update
Route::get('/EditUser/{id}', [UserController::class, 'goToEdit'])->name('users.goToEdit');
Route::Post('EditUser/{id}', [UserController::class, 'update'])->name('users.update');;

//CRUD Fournisseur
Route::get('/FournisseurManager', [FournisseurController::class, 'listmanager']);

//Delete
Route::get('/FournisseurManager/{id}', [FournisseurController::class, 'delete'])->name('fournisseurs.delete');;

//Create
Route::get('CreateFournisseur', function () {
    return view('CreateFournisseur');
});
Route::Post('CreateFournisseur', [FournisseurController::class, 'store'])->name('fournisseurs.store');;

//Update
Route::get('/EditFournisseur/{id}', [FournisseurController::class, 'goToEdit'])->name('fournisseurs.goToEdit');
Route::Post('EditFournisseur/{id}', [FournisseurController::class, 'update'])->name('fournisseurs.update');;

require __DIR__.'/auth.php';

