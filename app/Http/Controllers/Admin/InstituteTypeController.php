<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstituteType;
use Illuminate\Http\Request;

class InstituteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= InstituteType::paginate();
        return view('admin.config.institute_type.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.config.institute_type.create');
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
            'name'=>'required|string|unique:institute_types,name',
            'status'=>'required|numeric',
        ]);
        $data=new InstituteType();
        $data->name=$request->name;
        $data->status=$request->status;
        //$data->created_by=Auth::id();
        $data->save();

        return redirect()->route('admin.config.institute.type.index')->with('success','Institute type created successfully');
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
        $data= InstituteType::find($id);
        return view('admin.config.institute_type.edit',compact('data'));
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
            'name'=>'required|string|unique:institute_types,name,'.$id,
            'status'=>'required|numeric',
        ]);
        $data= InstituteType::find($id);
        $data->name=$request->name;
        $data->status=$request->status;
        //$data->created_by=Auth::id();
        $data->save();

        return redirect()->route('admin.config.institute.type.index')->with('success','Institute type update successfully');

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
