<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//Common Resource Routes
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Save new listing
// edit - Show form to edit listing
// update - Save edited listing
// destroy - Delete listing

//All Listings
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

//Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing Data
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete Listing Data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//Single Listing - should be below create route otherwise conflict with /create vs /{listing}
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Logout
Route::post('/logout', [UserController::class, 'logout']);