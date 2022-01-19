<?php

namespace App\Http\Controllers\Admin;
use App\Models\Inquiry;
use App\Models\Payments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class AdminLoginController extends Controller
{

    public  function adminIndexLogin(){
        if(Auth::check()) {
           return $this->checkAdmin();
        }
        return view('admin.login');
    }

    public function dashboard()
    {
        $total_inquiries=Inquiry::count();
        $pending_inquiries=Inquiry::where('status','pending')->count();
        $trial_inquiries=Inquiry::where('status','trial')->count();
        $schedule_req_inquiries=Inquiry::where('status','continue')->count();
        $started_inquiries=Inquiry::where('status','active')->count();
        $reject_inquiries=Inquiry::where('status','rejected')->count();
        $cancelled_inquiries=Inquiry::where('status','cancel')->count();
        $paid_inquiries=Inquiry::where('is_paid',true)->count();
        $unpaid_inquiries=Inquiry::where('is_paid',false)->count();

        $pending_payments=Payments::where('status','pending')->count();
        $due_payments=Payments::where('status','due')->count();
        $rec_inquiries=Inquiry::where('status','pending')->orderBy('created_at','DESC')->take(25)->get();

        return view('admin.dashboard',get_defined_vars());
    }

    public function checkAdmin(){

        if(Auth::user()->can('browse_admin')){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('index');
    }

    protected function AdminAttemptLogin(Request $request)
    {
        if( $this->guard()->attempt($this->credentials($request), $request->filled('remember')))
        {
            return $this->checkAdmin();
        }
        else{
            return back()->with('error', 'Whoops! These credentials do not match our records.')->withInput($request->except('password'));;

        }

    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
    protected function guard()
    {
        return Auth::guard();
    }
    public function username()
    {
        return 'email';
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

}
