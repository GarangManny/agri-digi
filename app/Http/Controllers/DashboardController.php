<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function show(Listing $listing){
        return view('listings.addtoCart', [
            'listing' => $listing
        ]);
    }

    public function edit(Listing $listing){
        return view('listings.supplierEdit', [
            'listing' => $listing
        ]);
    }

    public function supplierDashboard(){

        $email = Auth::user()->email;
        return view('listings.supplierDashboard', [
            'listings' => Listing::where('email', $email)
                                 ->latest()
                                 ->filter(request(['tag', 'search','location']))
                                 ->paginate(6)
        ]);
        
    }

    public function create(){

        $user = Auth::user();
        return view('listings.create', [
            'user' => $user
        ]);
    }

    public function farmerDashboard(){

        return view('listings.farmerDashboard', [
            'listings' => Listing::latest()->filter(request(['tag', 'search', 'location']))->paginate(6)
        ]);
        
    }

public function update(Request $request, Listing $listing)
{
    $formFields = $request->validate([
        'title' => 'required',
        'company' => 'required',
        'price' => 'required|numeric',
        'location' => 'required',
        'description' => 'required',
        'email' => 'required|email',
        'website' => 'required|url',
    ]);

    if ($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $listing->update($formFields);

    return redirect('/supplierDashboard')->with('success', 'Listing updated successfully');
}


    public function logout()
    {
        Auth::logout();
    
        return redirect('/');
    }
}
