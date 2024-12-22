<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotasController extends Controller
{
    public function index()
    {
        $datas= Quota::paginate();
        return view('admin.config.quota.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.quota.create');
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
            'name'=>'required|string|unique:quotas,name',
            'status'=>'required|numeric',
        ]);
        $data=new Quota();
        $data->name=$request->name;
        $data->status=$request->status;
        $data->created_by=Auth::id();
        $data->save();

        return redirect()->route('admin.config.quota.index')->with('success','Education created successfully');
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
        $data= Quota::find($id);
        return view('admin.config.quota.edit',compact('data'));
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
            'name'=>'required|string|unique:quotas,name,'.$id,
            'status'=>'required|numeric',
        ]);
        $data= Quota::find($id);
        $data->name=$request->name;
        $data->status=$request->status;
        $data->created_by=Auth::id();
        $data->save();

        return redirect()->route('admin.config.quota.index')->with('success','Quota Updated successfully');
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
