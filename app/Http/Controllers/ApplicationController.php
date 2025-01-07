<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use App\Models\DevelopmentCourse;
use App\Models\Versity;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index(Request $request)
    {


        $query = Application::orderBy('id', 'desc');

        if ($request->course) {
            $query->where('course_id', $request->course);
        }


        if ($request->export) {
            $datas = $query->get()->groupBy('course_id');
            // if(empty($datas)){
            //     return redirect()->back()->with('error','No data is here.');
            // }
            // return ($datas);
            $pdf = Pdf::loadView('admin.pdf.applications', compact('datas'));
            return $pdf->download('applications.pdf');
        }

        // $divisions = Division::all();
        $courses = Course::all();
        $datas = $query->paginate();
        return view('admin.application.index', compact('datas', 'courses'));
    }



    public function courseApply($slug){

        $data = Course::where('slug',$slug)->first();
        if(!$data){
            return response()->json([
                'message'=>'Not Found.'
            ]);
        }
        $versities = Versity::where('status',1)->get();
        $user = auth()->guard('trainee')->user();

        return view('frontend.development_course_apply',compact('data','versities','user'));
    }
    public function courseApplyStore(Request $request,$slug){


        $request->validate([
            "versity" => 'required|numeric',
            "session" => 'required|string',
            "department" => 'required|numeric',
            "semester" => 'required|numeric',
        ]);
        // dd($request->all());
        $user = auth()->guard('trainee')->user();
        $ck_course = Course::where('slug',$slug)->where('status',1)->first();
        if(!$ck_course){
            return redirect()->back()->with('error','This course is not available now.');
        }
        $ck_application = Application::where(['trainee_id'=> $user->id, 'course_id'=> $ck_course->id])->first();
        if($ck_application){
            return redirect()->back()->with('error','You applied already.');
        }
        $data =new Application();
        $data->application_no = $ck_course->id.'-'.$user->id;
        $data->application_type = 1;
        $data->trainee_id = $user->id;
        $data->course_id = $ck_course->id;
        $data->versity_id = $request->versity;
        $data->session = $request->session;
        $data->department_id = $request->department;
        $data->semester = $request->semester;
        $data->status = 1;
        $data->created_by = $user->id;
        if($data->save()){
            return redirect()->route('course.detail',$ck_course->slug)->with('success','Application submitted successfully..');
        }else{
            return redirect()->back()->with('error','Something went wrong.');
        }



    }
    public function show($id)
    {
        $data = Application::find($id);

        return view('admin.application.view', compact('data'));
    }

}
