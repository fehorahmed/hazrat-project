<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Versity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Department::orderBy('id', 'DESC')->paginate();
        return view('admin.config.department.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $versities = Versity::all();
        return view('admin.config.department.create', compact('versities'));
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
            'name' => 'required|string|max:255',
            'versity' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $data = new Department();
        $data->name = $request->name;
        $data->versity_id = $request->versity;
        $data->status = $request->status;
        $data->created_by = Auth::id();
        $data->save();

        return redirect()->route('admin.config.department.index')->with('success', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = Department::find($id);
        $versities = Versity::all();
        return view('admin.config.department.edit', compact('data','versities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'versity' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $data =  Department::find($id);
        $data->name = $request->name;
        $data->versity_id = $request->versity;
        $data->status = $request->status;
        $data->created_by = Auth::id();
        $data->save();

        return redirect()->route('admin.config.department.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
    public function getDepartmentByVersity(Request $request)
    {
        $rules =[
            'versity_id' => 'nullable|numeric'
        ];

        $data = Department::where('versity_id',$request->versity_id)->where('status',1)->get();
        // dd($data);
        return response()->json([
            'status'=>true,
            'datas'=>$data
        ]);


    }
}
