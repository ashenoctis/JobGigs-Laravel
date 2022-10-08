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
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()
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

    //Show form to create new listing
    public function create()
    {
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request)
    {
        //dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email|unique:listings,email',
            'tags' => 'required',
            'description' => 'nullable'
        ]);

        Listing::create($formFields);

        return redirect('/');
    }
}
