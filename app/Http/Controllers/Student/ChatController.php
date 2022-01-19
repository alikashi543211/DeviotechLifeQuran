<?php

namespace App\Http\Controllers\Student;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat()
    {

        return view('student.chat.chat');


    }





    public function chatSend(Request $request)
    {
//         if($request->isMethod('post'))
// {
//     $data=$request->all();
//     dd($data);
// }

// $chat = new Chat;
// $chat->student_id=$request->student_id;
// $chat->category=$request->category;
// $chat->priorirty=$request->priorirty;
// $chat->message=$request->message;
// $chat->object=$request->object;
// $chat->save();
//   $tutor_id=null;
//         if($request->tutor_id!==null)
//         {
//             $tutor_id=$request->tutor_id;
//         }

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



    public function studentTickets()

    {
        $id=Auth::user()->id;
        $chats=Chat::where('response_id',$id)->get();
             return view('student.chat.showticket',get_defined_vars());
    }


}
