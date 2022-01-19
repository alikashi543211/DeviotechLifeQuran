<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Inquiry;
use Str;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $inquiry=Inquiry::where('student_id',auth()->user()->id)->orderBy('created_at','DESC')->first();
//
        $schedules=Schedule::where('student_id',Auth::user()->id)->whereHas('inquiry', function($q){
            $q->where('status','!=','cancel');
        })->get();

        $trials=Schedule::where('student_id',Auth::user()->id)->where('status','trial_class')->with('inquiry')->get();

        $Events = [];
        $week_number = date("W");
        $year = date("Y");
        foreach ($trials as $trial)
        {
            $t_date=Carbon::createFromFormat('m/d/Y', $trial->date)->format('Y-m-d');
            $sch=$t_date. 'T' . $trial['time'] . ':00';
            $Events[] = array(/*'title'=>$titla,*/'start'=>$sch);
        }

        for($day=1; $day<=7; $day++) {
            foreach ($schedules as $s) {

                if ($day == $s['day']) {

                    $data = date('Y-m-d', strtotime($year."W".$week_number.$day)) . 'T' . $s['time'] . ':00';
                    $titla=Str::upper($s->inquiry->study_type);
                    $Events[] = array(/*'title'=>$titla,*/'start'=>$data);
                }

            }
        }

        return view('student.dashboard',get_defined_vars());
    }


    public function profile()
    {
        return view('student.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255',
            'phone'             => 'required',
        ]);
        $user = User::find(Auth::User()->id);
        if ($request->email != $user->email) {
            $request->validate([
                'email' =>'required|email|unique:users',
            ]);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if($request->hasfile('user_img')){
            $image = $request->file('user_img');
            $request->validate([
                'user_img' =>'mimes:jpeg,jpg,png|required',
            ]);

            $filename = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move('uploads/users/', $filename);
            $user->avatar = $filename;
            $user->save();
        }else {
            $user->save();
        }
        return redirect()->back();
    }
}
