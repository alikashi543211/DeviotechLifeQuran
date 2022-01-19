<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\InquirySession;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Zoom;

class ZoomController extends Controller
{
    public function checking()
    {
        $users=Zoom::meeting()->find(99306335622)->first();
        dd($users);
    }



    public function todaySessions()
    {
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $schedules=Schedule::where('day',$dayOfTheWeek)->where('status','live_class')->with('inquiry','student')->get();
        $trials=Schedule::where('date',Carbon::today()->format('m/d/Y'))->with('inquiry','student')->get();

        return view('admin.sessions.today',get_defined_vars());
    }

    public function startClass(Request $request)
    {

        $schedule=Schedule::where('id',$request->schedule_id)->first();

        $inquiry=$schedule->inquiry;
        if(Zoom::user()) {
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
            if (!$meeting) {
                return redirect()->route('admin.dashboard')->with('error', 'There is no meeting, only zoom user can create meeting');
            } else {

                $test = $user->meetings()->save($meeting);

                $inquiry_session = InquirySession::create([
                    'inquiry_id' => $inquiry->id,
                    'start_url' => $test->start_url,
                    'join_url' => $test->join_url,
                    'meeting_id'=>$test->id,
                ]);

                $inquiry = Inquiry::find($inquiry->id);


                sendMail([
                    'view' => 'emails.student.join_url',
                    'to' => $inquiry->user->email,
                    'name' => $inquiry->user->name,
                    'subject' => 'Student Session Started',
                    'data' => [
                        'join_url' => $test->join_url,
                    ]
                ]);
                sendMail([
                    'view' => 'emails.tutor.start_url',
                    'to' => $inquiry->tutor->email,
                    'name' => $inquiry->tutor->name,
                    'subject' => 'Session Started',
                    'data' => [
                        'join_url' => $test->start_url,
                    ]
                ]);
                if($schedule->status=='trial_class')
                {
                    $schedule->update(['is_done'=>true]);
                }

                return response()
                    ->json(['success' => true,
                        'msg' => 'approved',
                        'id'=>$request->schedule_id,
                        'start_url'=>$test->start_url,
                        'join_url'=>$test->join_url]);
//                return response()->json(['success' => true, 'msg' => 'approved', 'url' => $test->start_url]);


            }


        }
    }





}
