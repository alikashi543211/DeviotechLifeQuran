<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InquiryController extends Controller
{

    public function inquiries()
    {
        $inquiries=Inquiry::where('student_id',auth()->user()->id)->orderBy('created_at','DESC')->get();
        return view('student.inquiry.list',get_defined_vars());
    }

    public function newInquiry()
    {
        return view('student.inquiry.add');
    }

    public function store(Request $request)
    {

        $tutor_id=null;
        if($request->tutor_id!==null)
        {
            $tutor_id=$request->tutor_id;
        }

        $request->validate([
            'name'              => 'required|string|max:255',
            'email_form'             => 'required|string|email|max:255',
            'phone'             => 'required',

            'study_type'        =>'required',

        ]);
        $user=User::where('email',$request->email)->first();

        if($user==null)
        {
            $password=Str::random(10);
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email_form,
                'password'=>Hash::make($password),
                'phone'=>$request->phone,
                'role'=>'student',
                'status'=>'active',
                'avatar'=>'uploads/users/default.png',
            ]);

            sendMail([
                'view' => 'emails.tutor.register_confirmation',
                'to' => $user->email,
                'subject' =>  'Register Successfully',
                'name' => $user->name,
                'data' => ['user'=>$user,'password'=>$password]
            ]);
        }
        $difference=$request->time_zone - (-300);
        Inquiry::create([
            'student_id'=>$user->id,
//            'time_start'=>$request->time_start,
//            'time_end'=>$request->time_end,
            'study_type'=>implode(',',$request->study_type),
            'tutor_id'=>$tutor_id,
            'time_zone'=>$difference,
//            'no_of_students'=>$request->no_of_students,
        ]);
        if (!Auth::check())
        {
            Auth::login($user);
        }
        return redirect()->route('thankyou');
    }

    public function dashboardInquiryStore(Request $request)
    {
        $request->validate([
            'study_type'        =>'required',
        ]);
        $difference=$request->time_zone - (-300);
        Inquiry::create([
            'student_id'=>$request->student_id,
            'study_type'=>implode(',',$request->study_type),
            'time_zone'=>$difference,
        ]);
        return redirect()->route('thankyou');

    }

    public function thankyou()
    {
        return view('front.thankyou');
    }

    public function detail($id)
    {
        $inquiry=Inquiry::where('id',$id)->first();
        return view('student.inquiry.detail',get_defined_vars());
    }

    public function rejectInquiry(Request $request)
    {
        Inquiry::where('id',$request->inquiry_id)->update([
            'status'=>$request->status,
            'rejected_reason'=>$request->rejected_reason,
        ]);

        return redirect()->back()->with('success','Inquiry status has been update');
    }

    public function continueInquiry(Request $request)
    {
        Inquiry::where('id',$request->id)->update([
            'status'=>'continue',
            'rejected_reason'=>null,
        ]);
        return redirect()->back()->with('success','Your inquiry has been updated admin will update schedule');
    }

    public function cancelInquiry(Request $request)
    {
        Inquiry::where('id',$request->id)->update(['status'=>'cancel']);
        return back()->with('success','Inquiry has been cancel successfully');
    }
}
