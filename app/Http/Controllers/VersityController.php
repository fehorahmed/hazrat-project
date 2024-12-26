<?php

namespace App\Http\Controllers;

use App\Models\Versity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VersityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas= Versity::paginate();
        return view('admin.config.versity.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.versity.create');
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
            'name'=>'required|string|unique:versities,name',
            'status'=>'required|numeric',
        ]);
        $data=new Versity();
        $data->name=$request->name;
        $data->status=$request->status;
        $data->created_by=Auth::id();
        $data->save();

        return redirect()->route('admin.config.versity.index')->with('success','Versity created successfully');
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
        $data= Versity::find($id);
        return view('admin.config.versity.edit',compact('data'));
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
            'name'=>'required|string|unique:versities,name,'.$id,
            'status'=>'required|numeric',
        ]);
        $data= Versity::find($id);
        $data->name=$request->name;
        $data->status=$request->status;
        $data->save();

        return redirect()->route('admin.config.versity.index')->with('success','Versity created successfully');
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
