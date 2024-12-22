<?php

namespace App\Http\Controllers;

use App\Models\TraineeFeedback;
use Illuminate\Http\Request;

class TraineeFeedbackController extends Controller
{
    public function adminIndex()
    {

        $feedbacks = TraineeFeedback::paginate();
        return view('admin.trainee-feedback', compact('feedbacks'));
    }
    public function create()
    {

        $feedback = TraineeFeedback::where('trainee_id', auth()->guard('trainee')->id())->first();
        return view('frontend.feedback', compact('feedback'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'joining_date' => 'required|date',
        ]);
        $feedback = TraineeFeedback::where('trainee_id', auth()->guard('trainee')->id())->first();
        if (!$feedback) {
            $feedback = new TraineeFeedback();
        }
        $feedback->trainee_id = auth()->guard('trainee')->id();
        $feedback->company_name = $request->company_name;
        $feedback->company_address = $request->company_address;
        $feedback->designation = $request->designation;
        $feedback->description = $request->description;
        $feedback->joining_date = $request->joining_date;
        $feedback->save();

        return redirect()->back()->with('success', 'Feedback update successfully.');
    }
}
