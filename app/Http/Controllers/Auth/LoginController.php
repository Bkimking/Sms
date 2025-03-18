<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the authenticated method to handle role-based redirection and profile checks.
     */
    protected function authenticated(Request $request, $user)
    {
        // Redirect users with role == 9 to the home route ('Kenswed')
        if ($user->role == 9) {
            return redirect()->route('Kenswed');
        }

        // Check if the logged-in user has an admin profile
        $admin = $user->admin;

        if (!$admin || empty($admin->firstname) || empty($admin->lastname) || empty($admin->phone_number)) {
            return redirect()->route('admin.profile.edit')->with('warning', 'Please complete your profile before accessing the dashboard.');
        }

        // Default redirection
        return redirect()->intended($this->redirectPath());
    }
}