<?php

namespace App\Http\Controllers\Trainer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Show the trainer login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('trainer.login');
    }

    /**
     * Handle an incoming trainer login request.
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

        // Attempt to authenticate the trainer user
        if (Auth::guard('trainer')->attempt($credentials)) {
            // Redirect to the trainer dashboard upon successful login
            return redirect()->route('trainer.dashboard');
        }

        // If the authentication attempt fails, redirect back to the login form with an error message
        return redirect()->route('trainer.login')->with('error', 'Invalid credentials');
    }

    public function __construct()
    {
        $this->middleware('guest:trainer')->except('logout');
    }
}
