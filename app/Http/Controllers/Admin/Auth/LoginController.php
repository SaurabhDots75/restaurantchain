<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     protected function redirectTo()
     {
         return '/admin/home'; 
     }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except(['logout', 'verifyotp' ,'verifyotpsubmit']);
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */

     public function showLoginForm()
     {
         return view('auth.login');
     }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            $user = Auth::user();
            session()->flash('success', 'Login successful!');

            if ($user->hasRole('Restaurant')) {
                return redirect()->route('admin.restaurant.dashboard');
            }
            if ($user->hasRole('Super Admin')) {
                return redirect()->route('admin.home');
            }
        } else {
            return redirect()->route('admin.login')
                ->with('error', 'The email address or password you entered is incorrect.');
        }

    }

    public function verifyotp(Request $request)
    {
        return view('auth.otp');
    }

    public function verifyotpsubmit(Request $request)
        {
            $userId = Session::get('mfa_user_id');

            $request->validate([
                'otp' => 'required|digits:6',
            ]);

            

            if (!$userId) {
                return redirect()->route('admin.login')->with('error', 'Session expired, please log in again.');
            }

            $otp = Otp::where('user_id', $userId)->where('otp_code', $request->otp)->first();

            if ($otp ) {
                Session::forget('mfa_user_id');
                Session::put('otp_verified', true);
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('admin.otp')->with('error', 'Invalid or expired OTP.');
            }
        }

    public function logout(Request $request)
    {
        auth()->logout();
        
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('success', 'You have been logged out successfully');

        return redirect()->route('admin.login'); // Change '/admin/login' to your desired path
    }
}
