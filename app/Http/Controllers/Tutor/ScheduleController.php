<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{



    public function setTrial(Request $request)
    {
        if ($request->inquiry_id==null || $request->class_date==null || $request->class_time==null)
        {
            return back()->with('error','Please Select Class Date and time correctly');
        }
        $request->validate([
            'class_date'=>'required',
            'class_time'=>'required',
        ]);
        $inquiry=Inquiry::where('id',$request->inquiry_id)->first();
        $schedule=Schedule::create([
            'date'=>$request->class_date,
            'inquiry_id'=>$request->inquiry_id,
            'time'=>$request->class_time,
            'student_id'=>$inquiry->student_id,
        ]);
        sendMail([
            'view' => 'emails.student.trial_class_schedule',
            'to' => $inquiry->user->email,
            'subject' =>  'Trial Class Schedule',
            'name' => $inquiry->user->name,
            'data' => ['user'=>$inquiry->user,'inquiry'=>$inquiry,'schedule'=>$schedule]
        ]);
        return back()->with('success','Trial Class Schedule Successfully');
    }
}
