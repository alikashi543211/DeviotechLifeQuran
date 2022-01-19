<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use App\Models\Inquiry;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\InquirySession;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function students()
    {
        $users=User::where('role','student')->get();
        return view('admin.students.students',get_defined_vars());
    }


    public function assignTutor(Request $request)
    {
        if($request->tutor_id==null || $request->tutor_id==null)
        {
            return redirect()->back()->with('error','Please Select Tutor');
        }

        Inquiry::where('id',$request->id)->update([
            'tutor_id'=>$request->tutor_id,
            'status'=>'trial',
            'rejected_reason'=>null
        ]);
        InquirySession::where('inquiry_id',$request->id)->delete();
        Schedule::where('inquiry_id',$request->id)->where('status','trial_class')->delete();

        $inquiry=Inquiry::where('id',$request->id)->first();
        $schedule=Schedule::create([
            'inquiry_id'=>$request->id,
            'student_id'=>$inquiry->student_id,
            'date'=>$request->class_date,
            'time'=>$request->class_time,
            'status'=>'trial_class',
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

        return redirect()->back()->with('message','Tutor assign successfully');
    }


    public function changeTutor(Request $request)
    {

        if($request->tutor_id==null || $request->tutor_id==null)
        {
            return redirect()->back()->with('error','Please Select Tutor');
        }

        Inquiry::where('id',$request->id)->update([
            'tutor_id'=>$request->tutor_id,
        ]);
        return redirect()->back()->with('message','Tutor change successfully');
    }


    public function delete($id)
    {
        $user=User::where('id',$id)->first();
        $user->delete();
        return redirect()->route('admin.students')->with('message','Student has been deleted');
    }

    public function block(Request $request)
    {
        if($request->block_reason==null || $request->id==null)
        {
            return redirect()->back()->with('error','Please describe the reason to block Student');
        }
        User::where('id',$request->id)->update([
            'status'=>'inactive',
            'block_reason'=>$request->block_reason
        ]);
        return redirect()->back()->with('message','Student has been blocked');
    }

    public function reject(Request $request)
    {
        if($request->block_reason==null || $request->id==null)
        {
            return redirect()->back()->with('error','Please describe the reason to block Student');
        }
        User::where('id',$request->id)->update([
            'status'=>'reject',
            'block_reason'=>$request->block_reason
        ]);
        return redirect()->back()->with('message','Student has been rejected');
    }


    public function unblock($id)
    {
        User::where('id',$id)->update([
            'status'=>'active',
            'block_reason'=>null
        ]);
        return redirect()->back()->with('message','Student has been unblocked');
    }
public function showChat()
{
    $chats_users=Chat::get();
    return view('admin.students.showchat',get_defined_vars());

}
public function ticket(Request $request,$id)
{
       $chats_users=Chat::find($id);
      return view('admin.students.ticketresponse')->with(compact('chats_users'));
}

public function ticketResponse(Request $request)
{

        $request->validate([

               'message'             => 'required',
               'object'             => 'required',


        ]);
        // $inquiry=Inquiry::where('id',$request->id)->first();
        $chat=Chat::create([
            'student_id'=>Auth::user()->id,
            'category'=>$request->category,
            'priorirty'=>$request->priorirty,
            'message'=>$request->message,
            'object'=>$request->object,
            'response_id'=>$request->user_id,

        ]);
sendMail([
            'view' => 'emails.student.ticket_student',
            'to' => $chat->user->email,
            'subject' =>  'Successful Your Meassage',
            'name' => $chat->user->name,
            'data' => ['user'=>$chat->user ,'chat'=>$chat]
        ]);
return redirect()->back()->with('success','seccessful your message to Admin');


}

}
