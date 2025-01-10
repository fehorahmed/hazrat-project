<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Batch::orderBy('id', 'DESC')->paginate();
        return view('admin.config.batch.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::orderBy('id', 'DESC')->get();
        return view('admin.config.batch.create', compact('courses'));
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
            'name' => 'required|string',
            'course' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $data = new Batch();
        $data->name = $request->name;
        $data->course_id = $request->course;
        $data->status = $request->status;
        $data->created_by = auth()->id();
        if ($data->save()) {
            return redirect()->route('admin.config.batch.index')->with('success', 'Batch create successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Batch::find($id);
        $courses = Course::orderBy('id', 'DESC')->get();
        return view('admin.config.batch.edit', compact('data', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'course' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $data =  Batch::find($id);
        $data->name = $request->name;
        $data->course_id = $request->course;
        $data->status = $request->status;
        // $data->created_by = auth()->id();
        if ($data->save()) {
            return redirect()->route('admin.config.batch.index')->with('success', 'Batch update successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
