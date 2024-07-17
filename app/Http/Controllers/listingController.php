<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class listingController extends Controller
{
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search','location']))->paginate(6)
        ]);
    }
    

    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function store(Request $request){

        $formFields = $request -> validate([
            'title' => 'required',
            'price' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        $formFields['user'] = Auth::user() -> name;
        $formFields['email'] = Auth::user() -> email;
    
        if($request-> hasFile('logo')){

            $formFields['logo'] = $request-> file('logo')-> store('logos', 'public'); 
        }

        Listing::create($formFields);
      

        return redirect('supplierDashboard')->with('message', 'Product Listing created successfully!');
    }

    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    
}
