<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Mail\sendMail;
use Mail;




class AuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('branch', 'department', 'employee')
            ->get();
        return ['users' => $users];
    }

    public function loginForm()
    {


        return view('authentication.authentication-signin');
    }

    public function register()
    {

        return view('authentication.authentication-signup');
    }

    public function verifyAccount()
    {
        return view('authentication.authentication-otp');
    }

    public function verifyOTPAccount(Request $request)
    {
        $userId = $request->query('user_id');
        $user = User::find($userId);

        if ($user) {
            // Generate a new OTP
            $number = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $user->otp_code = $number;
            $user->save();

            return redirect('verify-account')->with([
                'status' => 'success',
                'message' => 'A new verification code has been sent to your email.',
                'userId' => $userId
            ]);

        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'User not found.'
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|max:255',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:5|max:255',
            'phone_no' => 'required|min:11|max:11',

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = 2;
            $user->password = Hash::make($request->password);
            $user->phone_no = $request->phone_no;
            $number = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $user->otp_code = $number;
            $user->save();

            $userData = User::where('id', $user->id)->first();
            $userId = $userData->id;

            return redirect('verify-account')->with(['status' => 'success', 'message' => 'Please Check your email inbox for account verification', 'userId' => $userId]);
            // return redirect('login')->with(['status' => 'success', 'message' => 'Your account has been created successfully, Please Login']);
        } catch (Exception $e) {
            return back()->withInput()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }


    public function accountVerification(Request $request)
    {


        $otpArray = $request->input('otp');
        $otp = implode('', $otpArray);
        $userId = $request->input('user_id');

        $user = User::findOrFail($userId);

        if ($otp === $user->otp_code) {
            $user->email_verified_date = Carbon::now();
            $user->save();
            return redirect('login')->with(['status' => 'success', 'message' => 'Your account has been verified, Please Login']);

        } else {
            return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => "Invalid Otp"]);
        }
    }



    public function adminlogin(Request $request)
    {

        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        if (Auth::attempt($credentials)) {


            $user = User::where('email', $request->email)->with('role')->first();
            if ($user->email_verified_date === null) {
                return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => 'Please verify your account']);
            }

            if ($user->subscription_status === 0 || $user->subscription_status === null) {
                Session::put('user_id', $user->id);
                Session::put('role_id', $user->role_id);
                Session::put('name', $user->name);
                return redirect()->route('purchase-plan')->with(['status' => 'success', 'message' => 'Please purchase one of our plans to continue to the dashboard..! ']);
            } else {
                Session::put('user_id', $user->id);
                Session::put('role_id', $user->role_id);
                Session::put('name', $user->name);
                return redirect()->route('admin-dashboard')->with(['status' => 'success', 'message' => 'Welcome..! ' . $user->name]);
            }

        }

        return redirect()->back()->with(['status' => 'danger', 'message' => 'Wrong Credentials']);

    }


    public function logout()
    {
        session()->flush();
        return redirect()->to('/login');
    }
}
