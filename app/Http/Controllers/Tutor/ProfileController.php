<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function dashboard()
    {
        return view('tutor.dashboard');
    }

    public function profile()
    {
        return view('tutor.profile');
    }

    public function update(Request $request)
    {

        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255',
            'phone'             => 'required',
            'bank_name'         => 'required',
            'bank_address'      => 'required',
//            'iban'           =>  'required',
            'branch_code'       => 'required',
            'account_no'        => 'required',
            'account_title'     => 'required',
            'detail'       => 'required',
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
            $request->validate([
                'user_img' =>'mimes:jpeg,jpg,png|required',
            ]);
            $image = $request->file('user_img');

            $filename = 'uploads/users/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move('uploads/users/', $filename);
            $user->avatar = $filename;
            $user->save();
        }else {
            $user->save();
        }

        Profile::where('user_id',auth()->user()->id)->update([
            'bank_name'=>$request->bank_name,
            'bank_address'=>$request->bank_address,
//            'iban_no'=>$request->iban,
            'branch_code'=>$request->branch_code,
            'account_no'=>$request->account_no,
            'account_title'=>$request->account_title,
            'detail'=>$request->detail,
        ]);
        return redirect()->back()->with('success','Profile updated successfully');
    }
}
