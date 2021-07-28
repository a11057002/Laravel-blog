<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    //
    public function create()
    {
        return view('session.create');
    }
     
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)){
            throw ValidationException::withMessages(['email'=>'Credentials could not be verified']);
        }
        
        session()->regenerate();
        return redirect('/')->with('success','Welcome Back!');

        
        // same as above
        // return back()
        //        ->withInput()   // old('xxxx');
        //        ->withErrors(['email'=>'Credentials could not be verified']);

        // attempt to  authenticate and login the user
        // based on the provided credentials



    }

    public function destory()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You\'re Logout!');
    }
}
