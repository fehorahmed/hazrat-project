<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseDuration;
use Illuminate\Http\Request;

class CourseDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= CourseDuration::paginate();
        return view('admin.config.course_duration.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.config.course_duration.create');
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
            'name'=>'required|string|unique:course_durations,name',
            'status'=>'required|numeric',
        ]);
        $data=new CourseDuration();
        $data->name=$request->name;
        $data->status=$request->status;
        //$data->created_by=Auth::id();
        $data->save();

        return redirect()->route('admin.config.course.duration.index')->with('success','Course Duration created successfully');
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
        $data= CourseDuration::find($id);
        return view('admin.config.course_duration.edit',compact('data'));
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
            'name'=>'required|string|unique:course_durations,name,'.$id,
            'status'=>'required|numeric',
        ]);
        $data= CourseDuration::find($id);
        $data->name=$request->name;
        $data->status=$request->status;
        //$data->created_by=Auth::id();
        $data->save();

        return redirect()->route('admin.config.course.duration.index')->with('success','Course Duration update successfully');

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
