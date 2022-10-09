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
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
            //'listings' => Listing::latest()->filter(request(['tag','search']))->simplePaginate(4)
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

        //add logo to form field to submit
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->logo->store('logos','public');
            //folder name in storage/app or storage/app/public
        }

        Listing::create($formFields);
        //Listing::create($reuest->all()); //insecure unguarded mass assignment

        return redirect('/')->with('success','Listing created successfully');
        //Session::flash('message','Listing created successfully!');
    }

    //Show form to edit listing
    public function edit(Listing $listing) //Pass listing model to edit view
    {
        //dd($listing->title);
        return view('listings.edit',[
            'listing' => $listing
        ]);
    }

    //Update listing data
    public function update(Request $request, Listing $listing)
    {
        //dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'nullable'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->logo->store('logos','public');
        }

        $listing->update($formFields); //same as store(), just updating current listing 

        return back()->with('success','Listing updated successfully');
    }
}
