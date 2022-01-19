<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\InquiryPlan;
use App\Models\InquirySession;
use App\Models\Payments;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rules\In;
use MongoDB\Driver\Session;

class InquiryController extends Controller
{
    public function list(Request $request)
    {
        $inquiries=Inquiry::orderBy('created_at','DESC');
        if ($request->inquiries)
        {
            $inquiries->where('status',$request->inquiries);
        }
        if ($request->payment)
        {
            $inquiries->where('is_paid',$request->payment);
        }
        $inquiries=$inquiries->get();
        return view('admin.inquiries.list',get_defined_vars());
    }

    public function detail($id)
    {
        $tutors=User::where('role','tutor')->where('status','active')->get();
        $inquiry=Inquiry::where('id',$id)->with('payments')->first();
        return view('admin.inquiries.detail',get_defined_vars());
    }

    public function delete($id)
    {
        $inquiry=Inquiry::where('id',$id)->first();
        $inquiry->delete();
        return redirect()->back()->with('message','Inquiry has been deleted successfully');
    }

    public function statusUpdate(Request $request)
    {
        Inquiry::where('id',$request->id)->update([
            'status'=>$request->status,
            'rejected_reason'=>null
        ]);
        return redirect()->back()->with('message','Inquiry status has been updated');
    }

    public function inquiryUpdate(Request $request)
    {

        $request->validate([

            'no_of_students'=>'required',
            'time_start'=>'required',
            'time_end'=>'required',
        ]);
        $inquiry=Inquiry::where('id',$request->inquiry_id)->first();
        $status=$inquiry->status;

        if($inquiry->tutor_id!==null && $status=='pending')
        {
            $status='trial';
        }
        Inquiry::where('id',$request->inquiry_id)->update([

            'no_of_students'=>$request->no_of_students,
            'time_start'=>$request->time_start,
            'time_end'=>$request->time_end,
            'status'=>$status,
        ]);
        return redirect()->back()->with('message','Inquiry record has been update');
    }

    public function setTrial(Request $request)
    {
       $request->validate([
           'class_date'=>'required',
           'class_time'=>'required',
       ]);
       Schedule::where('inquiry_id',$request->inquiry_id)->where('status','trial_class')->delete();
       InquirySession::where('inquiry_id',$request->inquiry_id)->delete();
       $inquiry=Inquiry::where('id',$request->inquiry_id)->first();
        $schedule=Schedule::create([
           'inquiry_id'=>$request->inquiry_id,
           'date'=>$request->class_date,
           'time'=>$request->class_time,
           'status'=>'trial_class',
           'student_id'=>$inquiry->student_id,
       ]);

        sendMail([
            'view' => 'emails.student.trial_class_schedule',
            'to' => $inquiry->user->email,
            'subject' =>  'Trial Class Schedule',
            'name' => $inquiry->user->name,
            'data' => ['user'=>$inquiry->user,'inquiry'=>$inquiry,'schedule'=>$schedule]
        ]);
        sendMail([
            'view' => 'emails.tutor.trial_class_schedule',
            'to' => $inquiry->tutor->email,
            'subject' =>  'Trial Class Schedule',
            'name' => $inquiry->tutor->name,
            'data' => ['user'=>$inquiry->tutor,'inquiry'=>$inquiry,'schedule'=>$schedule]
        ]);
        return redirect()->back()->with('message','Trial Class Set successfully');
    }



    public function scheduleRequest()
    {
        $inquiries=Inquiry::where('status','continue')->get();
        return view('admin.inquiries.schedule_requests',get_defined_vars());
    }

    public function scheduleRequestDetail($id)
    {
        $inquiry=Inquiry::where('id',$id)->first();
//        return view('tutor.schedule.request_detail',get_defined_vars());
    }

    public function setClassSchedule(Request $request)
    {
        $start_date=$request->payment_start_date.'/'.now()->format('m/Y');
        $end_date=\Carbon\Carbon::createFromFormat('d/m/Y',$start_date)->format('Y-m-d');
        $end_date=\Carbon\Carbon::parse($end_date)->addMonth(1)->subDays(1)->format('d/m/Y');

        Inquiry::where('id',$request->inquiry_id)->update([
            'status'=>'active',
            'time_start'=>$request->time_start,
            'time_end'=>$request->time_end,
            'weekly_sessions'=>$request->weekly_sessions,
            'monthly_sessions'=>$request->monthly_sessions,
            'price'=>$request->price,
            'payment_start_date'=>$request->payment_start_date
        ]);

        $inquiry=Inquiry::where('id',$request->inquiry_id)->first();

        Payments::create([
            'inquiry_id'=>$request->inquiry_id,
            'student_id'=>$inquiry->student_id,
            'date_from'=>$start_date,
            'date_to'=>$end_date,
            'amount'=>$request->price,
            'status'=>'due',
        ]);
        foreach ($request->days as $day)
        {
            Schedule::create([
                'inquiry_id'=>$request->inquiry_id,
                'student_id'=>$inquiry->student_id,
                'status'=>$request->schedule_status,
                'day'=>$day,
                'time'=>$request->time_start,
            ]);
        }

        sendMail([
            'view' => 'emails.student.trial_class_schedule',
            'to' => $inquiry->user->email,
            'subject' =>  'Trial Class Schedule',
            'name' => $inquiry->user->name,
            'data' => ['user'=>$inquiry->user,'inquiry'=>$inquiry]
        ]);

        return redirect()->back()->with('message','Student Schedule set successfully');
    }

    public function updateClassSchedule(Request $request)
    {

        Inquiry::where('id',$request->inquiry_id)->update([

            'time_start'=>$request->time_start,
            'time_end'=>$request->time_end,
            'weekly_sessions'=>$request->weekly_sessions,
            'monthly_sessions'=>$request->monthly_sessions,
            'price'=>$request->price,
            'payment_start_date'=>$request->payment_start_date

        ]);

        $payment=Payments::where('inquiry_id',$request->inquiry_id)->where('status','due')->first();
        $start_date=$request->payment_start_date.'/'.now()->format('m/Y');
        $end_date=\Carbon\Carbon::createFromFormat('d/m/Y',$start_date)->format('Y-m-d');
        $end_date=\Carbon\Carbon::parse($end_date)->addMonth(1)->subDays(1)->format('d/m/Y');
        if ($payment!==null)
        {
            $payment->update([
                'date_from'=>$start_date,
                'date_to'=>$end_date,
                'amount'=>$request->price,
            ]);

        }

        $inquiry=Inquiry::where('id',$request->inquiry_id)->first();
        Schedule::where('inquiry_id',$request->inquiry_id)->where('status','live_class')->delete();
        foreach ($request->days as $day)
        {
            Schedule::create([
                'inquiry_id'=>$request->inquiry_id,
                'student_id'=>$inquiry->student_id,
                'status'=>$request->schedule_status,
                'day'=>$day,
                'time'=>$request->time_start,
            ]);
        }

        return redirect()->back()->with('message','Student Schedule update successfully');
    }
}
