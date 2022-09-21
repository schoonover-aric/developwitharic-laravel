<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        // validate request, authenticate & log in user (based on credentials), redirectw/ success msg
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your credentials could NOT be verified.'
            ]);
        }

        //add protection against 'session fixation' attacks
        session()->regenerate();

        $displayname = auth()->user()->name;
        return redirect('/')->with('success', "Welcome Back, $displayname!");
        
        // OR...
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your credentials could NOT be verified.']);
    }

    public function destroy() {
        $displayname = auth()->user()->name;

        auth()->logout();
        return redirect('/')->with('success', "Goodbye, $displayname!");
    }
}
