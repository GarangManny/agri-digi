<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function show(){
        return view('listings.login');
    }

    public function authenticate(Request $request, User $user){


        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials) ) {
            // Authentication passed...
            $user = Auth::user();
            $accountType = $user->account_type;
            if($accountType == 'supplier'){
            return redirect()->route('supplierDashboard');
            }
            elseif($accountType == 'farmer'){
                return redirect()->route('farmerDashboard');
                }
        }
        

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

  
}
