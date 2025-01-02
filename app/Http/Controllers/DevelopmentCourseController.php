<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DevelopmentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DevelopmentCourse::orderBy('id', 'DESC')->paginate();
        return view('admin.config.development_course.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.development_course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:development_courses,name',
            'course_code' => 'required|string|unique:development_courses,course_code',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'text' => 'nullable|string|max:50000',
            'serial' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $data = new DevelopmentCourse();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name, '-');
        $data->course_code = $request->course_code;
        $data->text = $request->text;
        $data->status = $request->status;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->created_by = Auth::id();
        $data->save();

        return redirect()->route('admin.config.development-course.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DevelopmentCourse  $developmentCourse
     * @return \Illuminate\Http\Response
     */
    public function show(DevelopmentCourse $developmentCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DevelopmentCourse  $developmentCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(DevelopmentCourse $developmentCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DevelopmentCourse  $developmentCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DevelopmentCourse $developmentCourse)
    {
        //
    }


    public function courseDetail($slug)
    {
        $data = DevelopmentCourse::where('slug',$slug)->first();

        if(!$data){
            return response()->json([
                'message'=>'Not found.'
            ]);
        }

        return view('frontend.development_course_detail',compact('data'));
    }
}
