<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Payments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $inq_id=Crypt::decrypt($id);
        $payment=Payments::where('id',$inq_id)->with('inquiry')->first();
        return view('student.invoice.invoice',get_defined_vars());
    }

    public function payments()
    {
        $payments=Payments::where('student_id',auth()->user()->id)->orderBy('created_at','DESC')->with('inquiry')->get();
        return view('student.payment.list',get_defined_vars());
    }

    public function pay(Request $request)
    {

        $request->validate([
            'receipt'=>'required',
            'pay_date'=>'required',
        ]);
        if($request->hasfile('receipt'))
        {
            $name=$request->file('receipt');
            $originalname = $name->getClientOriginalName();
            $path = $request->file('receipt')->storeAs('/receipts',$originalname);
            $image_url = $path;

        }

        Payments::where('id',$request->payment_id)->update([
            'status'=>$request->status,
            'receipt'=>$image_url,
            'pay_date'=>$request->pay_date,
        ]);

        return redirect()->back()->with('success','Payment Sent successfully');
    }

    public function invoiceDownload($id)
    {
        $payment=Payments::where('id',$id)->first();
        return Storage::download($payment->receipt);
//        dd($payment->receipt);
    }
}
