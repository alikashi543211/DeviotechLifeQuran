<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\Testimonial;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function dashboard()
    {
        if (auth()->user()->role=='student')
            return redirect()->intended(RouteServiceProvider::Student);
        elseif (auth()->user()->role=='tutor')
            return redirect()->intended(RouteServiceProvider::Tutor);
        elseif (auth()->user()->role=='admin')
            return redirect()->intended(RouteServiceProvider::Admin);
        else
            return redirect()->route('index');

    }

    public  function home()
    {
        $tutors=User::where('role','tutor')->where('is_home_show',true)->get();
        $testimonials=Testimonial::all();
        return view('front.index',get_defined_vars());
    }
    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function faq()
    {
        return view('front.faq');
    }

    public function tutors(Request $request)
    {
        $tutors=User::where('role','tutor')->where('slug','!=',null)->where('status','active');
        if ($request->course)
        {
            $course=$request->course;
            $tutors->with(['profile'=>function($query) use ($request){
                $query->where('course','Like','%'.$request->course.'%');
            }]);
        }
        $tutors=$tutors->paginate(20);
        return view('front.tutors_list',get_defined_vars());
    }

    public function tutorDetail($slug)
    {
        $tutor=User::where('slug',$slug)->with('profile')->first();
        return view('front.tutor_detail',get_defined_vars());
    }

    public function contactInquiry(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        ContactInquiry::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->contact,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        return redirect()->route('thankyou');
    }
}
