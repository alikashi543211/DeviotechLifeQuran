<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function list()
    {
        $lists=Testimonial::all();
        return view('admin.testimonial.list',get_defined_vars());
    }

    public function add()
    {
        return view('admin.testimonial.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png',
            'rating'=>'required',
            'review'=>'required',
            'date'=>'required',
            'name'=>'required',
        ]);

        if($request->image)
        {
            $image=$request->image;
            $avatar = 'uploads/testimonials/'.time() . '.' . $image->getClientOriginalExtension();
            $movedFile = $image->move('uploads/testimonials/', $avatar);
        }
        Testimonial::create([
            'image'=>$avatar,
            'rating'=>$request->rating,
            'review'=>$request->review,
            'date'=>$request->date,
            'name'=>$request->name,
            'status'=>true,
        ]);
        return redirect()->route('admin.testimonials')->with('message','Testimonial add successfully');
    }


    public function delete($id)
    {
        Testimonial::where('id',$id)->delete();
        return redirect()->back()->with('message','Testimonial has been deleted');
    }
}
