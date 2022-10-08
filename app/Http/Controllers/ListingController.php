<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        return view('listings.index',[ //moved to listings folder
            'listings' => Listing::all()
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
