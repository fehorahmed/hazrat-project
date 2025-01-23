<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Trainee;
use App\Models\TraineeAge;
use App\Models\User;
use App\Models\Versity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TraineeController extends Controller
{
    public function login()
    {

        return view('frontend.login');
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $loginType = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $loginType => $request->input('email'), // Use $loginType as the key
            'password' => $request->input('password'),
        ];

        if (Auth::guard('trainee')->attempt($credentials)) {
            // dd($request->all());
            return redirect()->route('trainee.dashboard');
        }
        return redirect()->back()->with('error', 'Something went wrong.');
    }

    public function register()
    {

        $versities = Versity::where('status',1)->get();
        // $departments = ::where('status',1)->get();

        return view('frontend.register',compact('versities'));
    }

    public function registerPost(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:trainees,email',
            'password' => 'required|string|confirmed|min:6',
            'phone' => 'required|numeric|unique:trainees,phone',
            'nid' => 'required|numeric',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'bn_name' => 'required|string|max:255',
            'bn_father_name' => 'required|string|max:255',
            'bn_mother_name' => 'required|string|max:255',
            // 'versity' => 'required|numeric',
            // 'session' => 'required|string|max:255',
            // 'department' => 'required|numeric',
            // 'semester' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:300',
            'signature' => 'required|image|mimes:jpeg,jpg,png|max:100',
        ]);

        $u_ck = User::latest()->first();
        if ($u_ck) {
            $ddd = 'TR-' . rand(100, 999) . (0000 + ($u_ck->id + 1));
        } else {
            $ddd = 'TR-' . rand(100, 999) . (0001);
        }

        $user = new Trainee();
        $user->name = $request->name;
        $user->trainee_code = $ddd;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->nid = $request->nid;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->bn_name = $request->bn_name;
        $user->bn_father_name = $request->bn_father_name;
        $user->bn_mother_name = $request->bn_mother_name;
        // $user->versity_id = $request->versity;
        // $user->session = $request->session;
        // $user->department_id = $request->department;
        // $user->semester = $request->semester;
        $user->photo =  saveImage('photo',$request->photo);
        $user->signature =  saveImage('signature',$request->signature);
        $user->status = 1;
        $user->save();
        return redirect()->route('trainee.login')->with('success', 'Registration Success. Please Login Here.');
    }

    public function ageIndex()
    {
        $data = TraineeAge::first();
        return view('admin.config.trainee_age.index', compact('data'));
    }
    public function ageStore(Request $request)
    {

        $request->validate([
            'max_age' => 'required|numeric',
            'min_age' => 'required|numeric',
        ]);

        $data = TraineeAge::first();
        if (!$data) {
            $data = new TraineeAge();
        }
        $data->max_age = $request->max_age;
        $data->min_age = $request->min_age;
        $data->save();
        return redirect()->back()->with('success', 'Age Update Successfully.');
    }
    public function dashboard()
    {

        $applications= Application::where('trainee_id',auth()->guard('trainee')->id())->get();
        // dd(auth()->guard('trainee')->id());

        return view('frontend.trainee.dashboard',compact('applications'));
    }
}
