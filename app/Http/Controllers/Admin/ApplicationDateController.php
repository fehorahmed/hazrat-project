<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDate;
use Illuminate\Http\Request;

class ApplicationDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas=ApplicationDate::orderBy('status','desc')->orderBy('id','desc')->paginate();
        return view('admin.config.application_date.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.config.application_date.create');
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
           'name'=>'required|string|unique:application_dates,name',
           'date'=>'required|date',
           'status'=>'required|numeric',
        ]);

        if ($request->status==1){
            $update= ApplicationDate::query()->update([
                'status'=>0
            ]);
        }
        $data= new ApplicationDate();
        $data->name= $request->name;
        $data->date= $request->date;
        $data->status= $request->status;
        $data->save();
        return redirect()->route('admin.config.application.date.index')->with('success','Successfully Added.');
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
        $data= ApplicationDate::find($id);
        return view('admin.config.application_date.edit',compact('data'));

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
            'name'=>'required|string|unique:application_dates,name,'.$id,
            'date'=>'required|date',
        ]);

        if ($request->status==1) {
            $update = ApplicationDate::query()->update([
                'status' => 0
            ]);
        }
        $data= ApplicationDate::find($id);
        $data->name= $request->name;
        $data->date= $request->date;
        $data->status= $request->status;
        $data->save();
        return redirect()->route('admin.config.application.date.index')->with('success','Successfully Updated.');
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
