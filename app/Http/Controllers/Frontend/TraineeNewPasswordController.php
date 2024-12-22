<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Trainee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TraineeNewPasswordController extends Controller
{
    public function create(Request $request)
    {
        // $request->validate([
        //     'token' => 'required|string',
        // ]);
        $data = DB::table('trainee_password_resets')->where('token', $request->token)->first();
        if (!$data) {
            return view('errors.404');
        }
        return view('auth.trainee.reset-password', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
        ]);
        $data = DB::table('trainee_password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)->first();
        if (!$data) {
            return redirect()->back()->with('status', 'Token or email mismatch.');
        }

        $token_time = Carbon::parse($data->created_at);
        $current_time = Carbon::now();
        $diff_in_minutes = $token_time->diffInMinutes($current_time);
        if ($diff_in_minutes > 60) {
            return redirect()->back()->with('status', 'Token validation time is over.');
        }

        $trainee = Trainee::where('email', $request->email)->first();

        if (!$trainee) {
            return redirect()->back()->with('status', 'Token or email mismatch.');
        }

        $trainee->password = Hash::make($request->password);
        if ($trainee->update()) {

            $delete_token = DB::table('trainee_password_resets')->where('token', $request->token)->delete();
            return redirect()->route('trainee.login')->with('success', 'Password reset successfull.');
        }
        return redirect()->back()->with('status', 'Something went wrong.');
    }
}
