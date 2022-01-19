<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\InquirySession;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Zoom;

class ZoomController extends Controller
{
    public function startClass(Request $request)
    {

        if(Zoom::user())
        {
            $user = Zoom::user()->first();
            $meeting = Zoom::meeting()->make([
                'userId' => 'me',
                'topic' => 'Online Class',
                'type' => 2,

                'disable_recording' => false,
                'duration' => 1,
                'timezone' => 'Pakistan',
                'password' => '1234567890',
                'agenda' => 'Teacher arrange online class for student',
            ]);
            if(!$meeting)
            {
                return redirect()->route('tutor.dashboard')->with('error','There is no meeting, only zoom user can create meeting');
            }
            else
            {
                $test= $user->meetings()->save($meeting);
                $inquiry_session = InquirySession::create([
                    'inquiry_id' => $request->inquiry_id,
                    'start_url' => $test->start_url,
                    'join_url' => $test->join_url,
                    'meeting_id'=>$test->id,
                ]);
                Schedule::where('inquiry_id',$request->inquiry_id)->where('status','trial_class')->update([
                    'is_done'=>true,
                ]);
        $inquiry = Inquiry::find($request->inquiry_id);


            sendMail([
                'view' => 'emails.student.join_url',
                'to' => $inquiry->user->email,
                'name' => 'Join Class',
                'subject' => 'Student Session Started',
                'data' => [
                    'join_url' => $test->join_url,
                ]
            ]);

            return response()->json(['success'=>true, 'msg' => 'approved','url'=> $test->start_url]);


            }
        }
    }
}
