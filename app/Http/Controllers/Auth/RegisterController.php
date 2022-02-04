<?php

namespace App\Http\Controllers\Auth;

use App\User;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        $dataa = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_code' => Str::uuid(),
            // 'verification_code' => sha1(time()),
            // 'token' => $data['token'],

        ]);

        // dd($dataa->verification_code);

        if($dataa != null){
            // MailController::sendSignupMail($data->name, $data->email, $data->verification_code);
            Mail::send('mail.signup-email', ['data' => $dataa], function($message) use($dataa){
                $message->to($dataa->email);
                $message->subject('Confirm Your Email Address');
            });
            return redirect()->route('login')
            ->with('SUCCESS', 'You are successfully register! Please check your email address for verify your account');
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something wrong'));
    }

    public function verifyUser(Request $request){
        $verification_code = Request::get('code');
        $data = User::where(['verification_code' => $verification_code])->first();

        if($data != null){
            $data->is_verified = 1;
            $data->save();
            return redirect()->route('login')
            ->with('SUCCESS', 'Your account successfully verified! You can login now');
        }
        return redirect()->back()->with(session()->flash('ERROR', 'Something wrong'));
    }

        // public function register(Request $request){
        //     dd($request);
        //     $user = new User();

        //     $user->name = $request->name;
        //     $user->email = $request->email;
        //     $user->password = Hash::make($request->password);
        //     $user->verification_code = sha1(time());

        //     $user->save();

        //     if($user != null){
        //         MailController::sendSignupMail($user->name, $user->email, $user->verification_code);
        //         return redirect()->back()
        //         ->with(session()->flash('alert-success', 'You are successfully register! Please check your email address for verify your account'));
        //     }
        //     return redirect()->back()->with(session()->flash('alert-danger', 'Something wrong'));


        // }
}
