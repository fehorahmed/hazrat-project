<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Http\Request;

class ActiveCoursesController extends Controller
{
    public function index()
    {
        $datas = Course::where('status', 1)->paginate();
        return view('admin.courses.index', compact('datas'));
    }

    public function applicationList($id)
    {
        $applications = Application::where('course_id', $id)->where('status', '>', 2)->get();
        return view('admin.courses.application_list', compact('applications'));
    }
}
