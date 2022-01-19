<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;


class TutorController extends Controller
{
    public function tutors()
    {
        $users=User::where('role','tutor')->get();
        return view('admin.tutors.tutors',get_defined_vars());
    }
    public function add()
    {
        return view('admin.tutors.add');
    }

    public function edit($id)
    {
        $tutor=User::where('id',$id)->with('profile')->first();
        return view('admin.tutors.edit',get_defined_vars());
    }

    public function showMessages()
    {
        $messages=User::with('chat')->get();
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'salary'=>'required',
            'detail'=>'required',
            'course'=>'required'
        ]);
        if ($request->is_home_show==null)
        {

            $request->is_home_show=false;
        }

        $user=User::where('id',$request->id)->first();
        if ($request->email != $user->email) {
            $request->validate([
                'email' =>'required|email|unique:users',
            ]);
        }

        if($request->image)
        {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|required'
            ]);
            $image=$request->image;
            $avatar = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move('uploads/users/', $avatar);
        }
        else
            {
            $avatar=$user->avatar;
        }
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'avatar'=>$avatar,
            'is_home_show'=>$request->is_home_show,
            'slug'=>\Illuminate\Support\Str::slug($request->name,'-').'-'.$user->id.'-'.'5684',
        ]);
        $video_image=$user->profile->video_image;
        if ($request->hasFile('video_image'))
        {
            $image = $request->file('video_image');
            $video_image = 'uploads/video_image/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move('uploads/video_image/', $video_image);
        }
        $user->profile->update([
            'salary'=>$request->salary,
            'video_image'=>$video_image,
            'video_id'=>$request->video_id,
            'zoom_token'=>$request->zoom_token,
            'detail'=>$request->detail,
            'course'=>implode(',',$request->course),
            'bank_address'=>$request->bank_address,
            'bank_name'=>$request->bank_name,
            'account_title'=>$request->account_title,
            'branch_code'=>$request->branch_code,
            'account_no'=>$request->account_no,
        ]);
        return redirect()->route('admin.tutors')->with('message','Tutor has been updated');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'salary'=>'required',
            'detail'=>'required',
            'course'=>'required'
        ]);
        $avatar='uploads/users/default.png';
        if($request->image)
        {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|required'
            ]);
            $image=$request->image;
            $avatar = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move('uploads/users/', $avatar);
        }

        $password=\Illuminate\Support\Str::random(10);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($password),
            'status'=>'active',
            'role'=>'tutor',
            'avatar'=>$avatar,
            'is_home_show'=>$request->is_home_show,
        ]);
        $user->update([

            'slug'=>\Illuminate\Support\Str::slug($request->name,'-').'-'.$user->id.'-'.'5684',
        ]);
        $video_image=null;
        if ($request->hasFile('video_image'))
        {
            $image = $request->file('video_image');
            $video_image = 'uploads/video_image/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move('uploads/video_image/', $video_image);
        }
        profile::create([
            'user_id'=>$user->id,
            'salary'=>$request->salary,
            'video_image'=>$video_image,
            'video_id'=>$request->video_id,
            'zoom_token'=>$request->zoom_token,
            'detail'=>$request->detail,
            'course'=>implode(',',$request->course),
            'bank_address'=>$request->bank_address,
            'bank_name'=>$request->bank_name,
            'account_title'=>$request->account_title,
            'branch_code'=>$request->branch_code,
            'account_no'=>$request->account_no,
        ]);
        sendMail([
            'view' => 'emails.tutor.register_confirmation',
            'to' => $user->email,
            'subject' =>  'Register Successfully',
            'name' => $user->name,
            'data' => ['user'=>$user,'password'=>$password]
        ]);
        return redirect()->route('admin.tutors')->with('message','Tutor has been added');

    }

    public function salaryUpdate(Request $request)
    {
        $request->validate(['salary'=>'required']);
        profile::where('user_id',$request->id)->update(['salary'=>$request->salary]);
        return redirect()->back()->with('message','Tutor Salary has been updated');
    }



    public function delete($id)
    {
        $user=User::where('id',$id)->first();
        $user->delete();
        return redirect()->route('admin.tutors')->with('message','Tutor has been deleted');
    }

    public function block(Request $request)
    {
        if($request->block_reason==null || $request->id==null)
        {
            return redirect()->back()->with('error','Please describe the reason to block tutor');
        }
        User::where('id',$request->id)->update([
            'status'=>'inactive',
            'block_reason'=>$request->block_reason
        ]);
        return redirect()->back()->with('message','Tutor has been blocked');
    }

    public function reject(Request $request)
    {
        if($request->block_reason==null || $request->id==null)
        {
            return redirect()->back()->with('error','Please describe the reason to reject tutor');
        }
        User::where('id',$request->id)->update([
            'status'=>'reject',
            'block_reason'=>$request->block_reason
        ]);
        $user=User::where('id',$request->id)->first();
        sendMail([
            'view' => 'emails.tutor.reject_account',
            'to' => $user->email,
            'subject' =>  'Account Rejected',
            'name' => $user->name,
            'data' => ['user'=>$user,]
        ]);
        return redirect()->back()->with('message','Tutor has been reject');
    }

    public function unblock($id)
    {
        User::where('id',$id)->update([
            'status'=>'active',
            'block_reason'=>null
        ]);
        return redirect()->back()->with('message','Tutor has been unblocked');
    }

    public function detail($id)
    {
        $user=User::where('id',$id)->first();
        return view('admin.tutors.detail',get_defined_vars());
    }
}
