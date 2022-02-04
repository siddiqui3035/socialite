<?php

namespace App\Http\Controllers;

use App\Mail\SignupMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class MailController extends Controller
{
    public static function sendSignupMail($name, $email, $password_pin){
        // $data = [
        //     'name' => $name,
        //     'verification_code' => $password_pin,
        // ];
        // // dd($data);
        // Mail::to($email)->send(new SignupMail($data));
    }
}
