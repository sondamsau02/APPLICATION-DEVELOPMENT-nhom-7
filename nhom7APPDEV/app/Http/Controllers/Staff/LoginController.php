<?php
namespace App\Http\Controllers\Staff;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class LoginController extends Controller
{
    /**
     * Show the staff login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('staff.login');
    }

    /**
     * Handle an incoming staff login request.
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

        // Attempt to authenticate the staff user
        if (Auth::guard('staff')->attempt($credentials)) {
            // Redirect to the staff dashboard upon successful login
            return redirect()->route('staff.dashboard');
        }

        // If the authentication attempt fails, redirect back to the login form with an error message
        return redirect()->route('staff.login')->with('error', 'Invalid credentials');
    }

    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }
}
