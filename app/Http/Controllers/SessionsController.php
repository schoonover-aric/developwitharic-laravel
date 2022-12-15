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

/*
***** What's the purpose of this file? *****

app > Http > Controllers > Controller.php = Controller

Controller for Login Form/session:
    -validates request
        -email
        -password
    -authenticate and login user
    -regenerate session id to protect against 'session fixation' attacks
    -redirect /home with 'success' message
    -assigns username to displayname and echoes back within header

Laravel Controllers:
    Instead of defining all of your request handling logic as closures in your route files, you may wish to organize this behavior using "controller" classes. Controllers can group related request handling logic into a single class. For example, a UserController class might handle all incoming requests related to users, including showing, creating, updating, and deleting users. By default, controllers are stored in the app/Http/Controllers directory.
*/