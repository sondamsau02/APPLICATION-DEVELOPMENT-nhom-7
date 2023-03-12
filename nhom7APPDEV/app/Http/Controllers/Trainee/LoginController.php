<?php

namespace App\Http\Controllers\Trainee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    /**
     * Show the trainee login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('trainee.login');
    }

    /**
     * Handle an incoming trainee login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the trainee user
        if (Auth::guard('trainee')->attempt($credentials)) {
            // Redirect to the trainee dashboard upon successful login
            return redirect()->route('trainee.dashboard');
        }

        // If the authentication attempt fails, redirect back to the login form with an error message
        return redirect()->route('trainee.login')->with('error', 'Invalid credentials');
    }

    public function __construct()
    {
        $this->middleware('guest:trainee')->except('logout');
    }
}
