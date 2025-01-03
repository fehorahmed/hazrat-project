<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentCourse;
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

        return view('frontend.development_course_apply',compact('data'));
    }
}
