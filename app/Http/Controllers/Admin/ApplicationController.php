<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Course;
use App\Models\CourseDuration;
use App\Models\Division;
use App\Models\Education;
use App\Models\InstituteType;
use App\Models\Quota;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
    public function index(Request $request)
    {
        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'upazila' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $query = Application::where('status', 1)->orderBy('id', 'desc');

        if ($request->course) {
            $query->where('course_id', $request->course);
        }
        if ($request->division) {
            $query->where('division_id', $request->division);
        }
        if ($request->district) {
            $query->where('district_id', $request->district);
        }
        if ($request->upazila) {
            $query->where('upazila_id', $request->upazila);
        }
        if ($request->start_date) {
            $query->where('date', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $end_date = Carbon::createFromDate($request->end_date)->addDay(1)->subSecond();
            $query->where('date', '<=', $end_date);
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

        $divisions = Division::all();
        $courses = Course::all();
        $datas = $query->paginate();
        return view('admin.application.index', compact('datas', 'courses', 'divisions'));
    }
    public function approvedIndex(Request $request)
    {
        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'upazila' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $query = Application::where('status', 2)->orderBy('id', 'desc');

        if ($request->course) {
            $query->where('course_id', $request->course);
        }
        if ($request->division) {
            $query->where('division_id', $request->division);
        }
        if ($request->district) {
            $query->where('district_id', $request->district);
        }
        if ($request->upazila) {
            $query->where('upazila_id', $request->upazila);
        }
        if ($request->start_date) {
            $query->where('date', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $end_date = Carbon::createFromDate($request->end_date)->addDay(1)->subSecond();
            $query->where('date', '<=', $end_date);
        }

        if ($request->export) {
            $datas = $query->get()->groupBy('course_id');
            // dd($datas);
            $pdf = Pdf::loadView('admin.pdf.applications', compact('datas'));
            return $pdf->download('applications.pdf');
        }

        $divisions = Division::all();
        $courses = Course::all();
        $datas = $query->paginate();
        return view('admin.application.index', compact('datas', 'courses', 'divisions'));
    }
    public function canceledIndex(Request $request)
    {
        $request->validate([
            'division' => 'nullable|numeric',
            'district' => 'nullable|numeric',
            'upazila' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $query = Application::where('status', 0)->orderBy('id', 'desc');

        if ($request->course) {
            $query->where('course_id', $request->course);
        }
        if ($request->division) {
            $query->where('division_id', $request->division);
        }
        if ($request->district) {
            $query->where('district_id', $request->district);
        }
        if ($request->upazila) {
            $query->where('upazila_id', $request->upazila);
        }
        if ($request->start_date) {
            $query->where('date', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $end_date = Carbon::createFromDate($request->end_date)->addDay(1)->subSecond();
            $query->where('date', '<=', $end_date);
        }

        if ($request->export) {
            $datas = $query->get()->groupBy('course_id');
            // dd($datas);
            $pdf = Pdf::loadView('admin.pdf.applications', compact('datas'));
            return $pdf->download('applications.pdf');
        }

        $divisions = Division::all();
        $courses = Course::all();
        $datas = $query->paginate();
        return view('admin.application.index', compact('datas', 'courses', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Application::find($id);

        return view('admin.application.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Application::find($id);
        $courses = Course::all();
        $course_durations = CourseDuration::all();
        $divisions = Division::all();
        $institute_types = InstituteType::all();
        $educations = Education::all();
        $quotas = Quota::all();
        return view('admin.application.edit', compact('data', 'courses', 'course_durations', 'divisions', 'institute_types', 'educations', 'quotas', 'divisions'));
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
        $request->validate([
            'course' => 'required|numeric',
            'name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'nid' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'mobile' => 'required|numeric',
            'blood_group' => 'required|string',
            'division' => 'required|numeric',
            'district' => 'required|numeric',
            'upazila' => 'required|numeric',
            'permanent_address' => 'required|string',
            'any_course_before' => 'required|numeric',
            'current_education_status' => 'required|numeric',
            'business_status' => 'required|numeric',
            'last_education' => 'required|numeric',
            'computer_course_duration' => 'required|numeric',
            'basis_institute_type' => 'required|numeric',
            'quota' => 'required|numeric',
        ]);
        // dd($request->all());

        $application = Application::find($id);
        $application->course_id = $request->course;
        //        $application->trainee_id=Auth::guard('trainee')->id();
        $application->name = $request->name;
        $application->father_name = $request->father_name;
        $application->mother_name = $request->mother_name;
        $application->address = $request->permanent_address;
        $application->division_id = $request->division;
        $application->district_id = $request->district;
        $application->upazila_id = $request->upazila;
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
        //  $application->status=1;
        $application->updated_by = Auth::id();
        if ($application->save()) {
            return redirect()->route('admin.application.index')->with('success', 'Application successfully updated.');
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

    public function approve(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required|numeric'
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()->first(),
            ]);
        }

        $data = Application::find($request->id);
        $data->status = 2;
        $data->confirmed_by = Auth::id();
        if ($data->save()) {
            return response([
                'success' => true,
                'message' => 'Application Approved.'
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Something went wrong.',
            ]);
        }
    }
    public function enrolled(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'app_id' => 'required|numeric'
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()->first(),
            ]);
        }
        // dd($request->app_id);
        $data = Application::find($request->app_id);
        $data->status = 3;
        $data->confirmed_by = Auth::id();
        if ($data->save()) {
            return response([
                'success' => true,
                'message' => 'Application Enrolled successfully.'
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Something went wrong.',
            ]);
        }
    }
    public function passed(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'app_id' => 'required|numeric'
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()->first(),
            ]);
        }
        // dd($request->app_id);
        $data = Application::find($request->app_id);
        $data->status = 5;
        $data->updated_by = Auth::id();
        if ($data->save()) {
            return response([
                'success' => true,
                'message' => 'Applicant Passed successfully.'
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Something went wrong.',
            ]);
        }
    }
    public function failed(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'app_id' => 'required|numeric'
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()->first(),
            ]);
        }
        // dd($request->app_id);
        $data = Application::find($request->app_id);
        $data->status = 6;
        $data->updated_by = Auth::id();
        if ($data->save()) {
            return response([
                'success' => true,
                'message' => 'Applicant Failed !!.'
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Something went wrong.',
            ]);
        }
    }
    public function changeStatus(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'application_id' => 'required|array',
            'submit_type' => 'required|string',
        ]);
        if ($validation->fails()) {
            return response([
                'success' => false,
                'message' => $validation->errors()->first(),
            ]);
        }
        $message = "";
        if ($request->submit_type == "Approved") {
            $data = Application::whereIn('id', $request->application_id)->update([
                'status' => 2,
                'confirmed_by' => Auth::id()
            ]);
            $message = "Application Approved.";
        } elseif ($request->submit_type == "Disapproved") {
            $data = Application::whereIn('id', $request->application_id)->update([
                'status' => 1,
                'updated_by' => Auth::id()
            ]);
            $message = "Application Disapproved.";
        }
        if ($data) {
            return response([
                'success' => true,
                'message' => $message
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function certificate(Application $application)
    {
        if ($application->status != 5) {
            return redirect()->back()->with('error', 'Certificate is not available for this application');
        }

        return view('pdf.certificate', compact('application'));
    }
}
