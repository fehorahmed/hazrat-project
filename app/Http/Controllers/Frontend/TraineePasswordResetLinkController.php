<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\TraineePasswordReset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;


class TraineePasswordResetLinkController extends Controller
{

    public function create()
    {

        return view('auth.trainee.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|min:3|max:50|exists:trainees',
        ]);
        $token = Str::random(64);
        $email = $request->email;

        DB::table('trainee_password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $user_obj = DB::table('trainees')->where('email', $email)->first();
        $username = $user_obj->name;
        $reset_url = route('trainee.password.reset', ['token' => $token]);
        $password_token_expire_time = 60;


        Mail::to($email)->send(new TraineePasswordReset($username, $reset_url, $password_token_expire_time));

        return redirect()->back()->with('status', 'Reset link successfully send to your email.');
    }
}
