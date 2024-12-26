<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Course::orderBy('id', 'DESC')->paginate();
        return view('admin.config.course.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.course.create');
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
            'name' => 'required|string|unique:courses,name',
            'course_code' => 'required|string|unique:courses,course_code',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'text' => 'nullable|string|max:50000',
            'status' => 'required|numeric',
        ]);

        // $ck_code = Course::orderBy('id', 'desc')->first();
        // dd($ck_code);
        // if ($ck_code) {
        //     $code = 5000 + $ck_code->id + 1;
        //     $code = 'C-' . $code;
        // } else {
        //     $code = 'C-' . 5001;
        // }
        // dd($code);
        $data = new Course();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name, '-');
        $data->course_code = $request->course_code;
        $data->text = $request->text;
        $data->status = $request->status;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->created_by = Auth::id();
        $data->save();

        return redirect()->route('admin.config.course.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Course::find($id);
        return view('admin.config.course.edit', compact('data'));
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
            'name' => 'required|string|unique:courses,name,' . $id,
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|numeric',
        ]);

        $data = Course::find($id);
        $data->name = $request->name;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->status = $request->status;
        $data->created_by = Auth::id();
        $data->save();

        return redirect()->route('admin.config.course.index')->with('success', 'Course updated successfully');
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
