<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\order;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    //
    public function add(Request $request){
      

        $formFields = $request->validate([
            'product_id'=> 'required',
            'quantity' => 'required',
            'name' => 'required',
            'unit_price'=> 'required',
            'location' => 'required'
        ]);

        $formFields['user'] = Auth::user() -> name;
        $formFields['total_price'] = $formFields['unit_price'] * $formFields['quantity'];
        $formFields['email'] = Auth::user() -> email;

        //dd($formFields);

        order::create($formFields);

        return redirect()->route('farmerDashboard')->with('message', 'Order filled, added to cart!');

    }
}
