<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationDate;
use App\Models\Course;
use App\Models\CourseDuration;
use App\Models\Division;
use App\Models\Education;
use App\Models\InstituteType;
use App\Models\Quota;
use App\Models\TraineeAge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Application::where('trainee_id', Auth::guard('trainee')->id())->get();
        $data_date = ApplicationDate::where('status', 1)->first();
        //dd($data_date);
        return view('frontend.application.index', compact('datas', 'data_date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_date = ApplicationDate::where('status', 1)->first();
        if ($data_date->date < now()) {
            return redirect()->back()->with('error', 'Application date is over.');
        }
        $courses = Course::where('status', 1)->get();
        $course_durations = CourseDuration::where('status', 1)->get();
        $divisions = Division::all();
        $institute_types = InstituteType::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $quotas = Quota::where('status', 1)->get();
        $trainee_age = TraineeAge::first();
        return view('frontend.application.create', compact('divisions', 'educations', 'quotas', 'courses', 'course_durations', 'institute_types', 'trainee_age'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = [
            'course' => 'required|numeric',
            'name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'nid' => 'required|numeric',
            'nid_image' => 'required|file|max:2048',
            'date_of_birth' => 'required|date',
            'mobile' => 'required|numeric',
            'blood_group' => 'required|string',
            'division' => 'required|numeric',
            'district' => 'required|numeric',
            'upazila' => 'required|numeric',
            'permanent_address' => 'required|string',
            'address_same' => 'nullable|string',


            'any_course_before' => 'required|numeric',
            'current_education_status' => 'required|numeric',
            'business_status' => 'required|numeric',
            'last_education' => 'required|numeric',
            'educational_certificate' => 'required|file|max:2048',
            'computer_course_duration' => 'required|numeric',
            'basis_institute_type' => 'required|numeric',
            'basis_institute_certificate' => 'required|file|max:2048',
            'quota' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:100'
        ];

        if (!$request->address_same) {
            $rules['present_division'] = 'required|numeric';
            $rules['present_district'] = 'required|numeric';
            $rules['present_upazila'] = 'required|numeric';
            $rules['present_address'] = 'required|string';
        }


        $validate= Validator::make($request->all(),$rules);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

      //  dd($request->address_same);

        $ck_application = Application::where('trainee_id', auth()->id())
            ->where('status', '>=', 2)->first();
        if ($ck_application) {
            return redirect()->back()->with('error', 'You are already completed or enrolled in a training program. You can not apply another.');
        }
        $ck_nid = Application::where('nid', $request->nid)
            ->where('status', '>=', 2)->first();
        if ($ck_application) {
            return redirect()->back()->with('error', 'This NID user already completed or enrolled in a training program. You can not apply another.');
        }


        $app = Application::latest()->first();
        if ($app) {
            $u_id = 'APP-' . rand(100, 999) . (10000 + $app->id);
        } else {
            $u_id = 'APP-' . rand(100, 999) . (100001);
        }
        $application = new Application();
        $application->application_no = $u_id;
        $application->course_id = $request->course;
        $application->trainee_id = Auth::guard('trainee')->id();
        $application->name = $request->name;
        $application->father_name = $request->father_name;
        $application->mother_name = $request->mother_name;
        $application->address = $request->permanent_address;
        $application->division_id = $request->division;
        $application->district_id = $request->district;
        $application->upazila_id = $request->upazila;



        if($request->address_same=="YES"){

            $application->present_division_id = $request->division;
            $application->present_district_id = $request->district;
            $application->present_upazila_id = $request->upazila;
            $application->present_address = $request->permanent_address;
        }else{
            $application->present_division_id = $request->present_division;
            $application->present_district_id = $request->present_district;
            $application->present_upazila_id = $request->present_upazila;
            $application->present_address = $request->present_address;
        }


        $application->nid = $request->nid;
        $application->date_of_birth = $request->date_of_birth;
        $application->mobile = $request->mobile;
        $application->blood_group = $request->blood_group;
        $application->any_course_before = $request->any_course_before;
        $application->current_education_status = $request->current_education_status;
        $application->business_status = $request->business_status;
        $application->last_education_id = $request->last_education;
        $application->computer_course_duration = $request->computer_course_duration;
        $application->institute_type_id = $request->basis_institute_type;
        $application->quota_id = $request->quota;
        $application->status = 1;
        $application->created_by = Auth::guard('trainee')->id();
        if ($request->file('basis_institute_certificate')) {
            $application->basis_institute_certificate =  saveImage('basis-institute-certificate', $request->basis_institute_certificate);
        }
        if ($request->file('image')) {
            $application->image =  saveImage('applicationProfile', $request->image, 300, 300);
        }
        if ($request->file('nid_image')) {
            $application->nid_image =  saveImage('nidImage', $request->nid_image);
        }
        if ($request->file('educational_certificate')) {
            $application->educational_certificate =  saveImage('educationalCertificate', $request->educational_certificate);
        }
        if ($application->save()) {
            return redirect()->route('trainee.application.index')->with('success', 'Application successfully submitted.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Application::where('id', $id)->where('trainee_id', auth()->guard('trainee')->id())->first();
        if (!$data) {
            return view('errors.404');
        }

        return view('frontend.application.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_date = ApplicationDate::where('status', 1)->first();
        if ($data_date->date < now()) {
            return redirect()->back()->with('error', 'Application date is over.');
        }
        $data = Application::find($id);
        if ($data->status != 1) {
            return redirect()->back()->with('error', 'Application edit not except now.');
        }
        $courses = Course::where('status', 1)->get();
        $course_durations = CourseDuration::where('status', 1)->get();
        $divisions = Division::all();
        $institute_types = InstituteType::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $quotas = Quota::where('status', 1)->get();
        $trainee_age = TraineeAge::first();

        return view('frontend.application.edit', compact('divisions', 'educations', 'quotas', 'courses', 'course_durations', 'institute_types', 'data','trainee_age'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'course' => 'required|numeric',
        //     'name' => 'required|string',
        //     'father_name' => 'required|string',
        //     'mother_name' => 'required|string',
        //     'nid' => 'required|numeric',
        //     'nid_image' => 'nullable|file|max:2048',
        //     'date_of_birth' => 'required|date',
        //     'mobile' => 'required|numeric',
        //     'blood_group' => 'required|string',
        //     'division' => 'required|numeric',
        //     'district' => 'required|numeric',
        //     'upazila' => 'required|numeric',
        //     'permanent_address' => 'required|string',
        //     'any_course_before' => 'required|numeric',
        //     'current_education_status' => 'required|numeric',
        //     'business_status' => 'required|numeric',
        //     'last_education' => 'required|numeric',
        //     'educational_certificate' => 'nullable|file|max:2048',
        //     'computer_course_duration' => 'required|numeric',
        //     'basis_institute_type' => 'required|numeric',
        //     'basis_institute_certificate' => 'nullable|file|max:2048',
        //     'quota' => 'required|numeric',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100'
        // ]);


        $rules = [
            'course' => 'required|numeric',
            'name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'nid' => 'required|numeric',
            'nid_image' => 'nullable|file|max:2048',
            'date_of_birth' => 'required|date',
            'mobile' => 'required|numeric',
            'blood_group' => 'required|string',
            'division' => 'required|numeric',
            'district' => 'required|numeric',
            'upazila' => 'required|numeric',
            'permanent_address' => 'required|string',
            'address_same' => 'nullable|string',


            'any_course_before' => 'required|numeric',
            'current_education_status' => 'required|numeric',
            'business_status' => 'required|numeric',
            'last_education' => 'required|numeric',
            'educational_certificate' => 'nullable|file|max:2048',
            'computer_course_duration' => 'required|numeric',
            'basis_institute_type' => 'required|numeric',
            'basis_institute_certificate' => 'nullable|file|max:2048',
            'quota' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100'
        ];

        if (!$request->address_same) {
            $rules['present_division'] = 'required|numeric';
            $rules['present_district'] = 'required|numeric';
            $rules['present_upazila'] = 'required|numeric';
            $rules['present_address'] = 'required|string';
        }


        $validate= Validator::make($request->all(),$rules);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }



        $application =  Application::find($id);
        if ($application->status != 1) {
            return redirect()->back()->with('error', 'Application edit not except now.');
        }
        $application->course_id = $request->course;
        $application->name = $request->name;
        $application->father_name = $request->father_name;
        $application->mother_name = $request->mother_name;
        $application->address = $request->permanent_address;
        $application->division_id = $request->division;
        $application->district_id = $request->district;
        $application->upazila_id = $request->upazila;

        if($request->address_same=="YES"){

            $application->present_division_id = $request->division;
            $application->present_district_id = $request->district;
            $application->present_upazila_id = $request->upazila;
            $application->present_address = $request->permanent_address;
        }else{
            $application->present_division_id = $request->present_division;
            $application->present_district_id = $request->present_district;
            $application->present_upazila_id = $request->present_upazila;
            $application->present_address = $request->present_address;
        }

        $application->nid = $request->nid;
        $application->date_of_birth = $request->date_of_birth;
        $application->mobile = $request->mobile;
        $application->blood_group = $request->blood_group;
        $application->any_course_before = $request->any_course_before;
        $application->current_education_status = $request->current_education_status;
        $application->business_status = $request->business_status;
        $application->last_education_id = $request->last_education;
        $application->computer_course_duration = $request->computer_course_duration;
        $application->institute_type_id = $request->basis_institute_type;
        $application->quota_id = $request->quota;
        $application->status = 1;
        $application->created_by = Auth::guard('trainee')->id();
        if ($request->file('image')) {
            if ($application->image) {
                deleteFile($application->image);
            }
            $application->image =  saveImage('applicationProfile', $request->image, 300, 300);
        }
        if ($request->file('basis_institute_certificate')) {
            if ($application->basis_institute_certificate) {
                deleteFile($application->basis_institute_certificate);
            }
            $application->basis_institute_certificate =  saveImage('applicationProfile', $request->basis_institute_certificate);
        }
        if ($request->file('nid_image')) {
            if ($application->nid_image) {
                deleteFile($application->nid_image);
            }
            $application->nid_image =  saveImage('nidImage', $request->nid_image);
        }
        if ($request->file('educational_certificate')) {
            if ($application->educational_certificate) {
                deleteFile($application->educational_certificate);
            }
            $application->educational_certificate =  saveImage('educationalCertificate', $request->educational_certificate);
        }

        if ($application->save()) {
            return redirect()->route('trainee.application.index')->with('success', 'Application Update successful.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
