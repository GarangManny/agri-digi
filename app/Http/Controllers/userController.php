<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class userController extends Controller
{
    //
    public function register(){
        return view('listings.register');
    }

    public function store(Request $request, User $user)
    {
        
        try{
        $formFields = $request->validate([
            'account_type' => 'required',
            'name' => 'required',
            'password' => 'required',
            'location' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
        ]);

        // Hash the password before storing
        $formFields['password'] = bcrypt($formFields['password']);

        User::create($formFields);

        return redirect('/')->with('message', 'User registered successfully');
        }catch (QueryException $e) {
            // Check if the error code is for duplicate entry
            if ($e->errorInfo[1] == 1062) {
                return back()->withInput()->withErrors(['email' => 'The email address is already in use.']);
            }
            
            // Handle other database errors if necessary
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the user. Please try again.']);
        }
    }

    public function login(User $user){
        return view('/listings.login', [
            'user' => $user
        ]);

    }
}
