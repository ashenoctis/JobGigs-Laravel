<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        //dd(request('tag'));
        //dd(request()->tag); //Request as helper instead of dependency injection
        return view('listings.index',[ //moved to listings folder
            'listings' => Listing::latest()->filter(request(['tag']))->get()
            //'listings' => Listing::latest()->get() //same as all()
        ]);
    }

    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show',[  //moved to listings folder
            'listing' => $listing
        ]);
    }
}
