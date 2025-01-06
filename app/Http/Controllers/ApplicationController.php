<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentCourse;
use App\Models\Versity;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function developmentCourseApply($slug){

        $data = DevelopmentCourse::where('slug',$slug)->first();
        if(!$data){
            return response()->json([
                'message'=>'Not Found.'
            ]);
        }
        $versities = Versity::where('status',1)->get();
        $user = auth()->guard('trainee')->user();

        return view('frontend.development_course_apply',compact('data','versities','user'));
    }
    public function developmentCourseApplyStore(Request $request,$slug){


        $request->validate([
            "versity" => 'required|numeric',
            "session" => 'required|string',
            "department" => 'required|numeric',
            "semester" => 'required|numeric',
        ]);
        dd($request->all());


        return view('frontend.development_course_apply',compact('data','versities','user'));
    }
}
