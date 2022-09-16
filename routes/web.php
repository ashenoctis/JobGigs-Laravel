<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

//All Listings

Route::get('/', function () {
    return view('listings',[ //listings is the name of the view
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
});

//Single Listing
Route::get('/listings/{id}', function ($id) {
    return view('listing',[ //listing is the name of the view
        'listing' => Listing::find($id)
    ]);
});


/*
Route::get('/about', function () {
    return response('<h1>Ashish Sharma</h1>', 200) //404, 500
        ->header('Content-Type', 'text/plain') //text/html
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function ($id) {
    dd($id); //die and dump
    ddd($id); //die, dump and die
    return response('<h1>Post '.$id.'</h1>', 200);
})->where('id', '[0-9]+'); //only numbers

Route::get('/search', function (Request $request) {
    dd($request->name . ' ' . $request->city); //name=Ashish&city=Bangalore
});
*/