<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function pendingPayments()
    {
        $payments=Payments::where('status','pending')->get();
        return view('admin.payments.pending',get_defined_vars());
    }

    public function paymentReceipt($id)
    {
        $payment=Payments::where('id',$id)->first();
        return Storage::download($payment->receipt);
    }

    public function approvePayment($id)
    {
        $payment=Payments::where('id',$id)->first();
        $payment->update([
            'status'=>'confirmed'
        ]);
        $inquiry=$payment->inquiry;

        $inquiry->update([
            'is_paid'=>true,
        ]);
        $last_date=Carbon::createFromFormat('d/m/Y',$payment->date_to)->format('m/Y');
        $start_date=$inquiry->payment_start_date.'/'.$last_date;
        $end_date=\Carbon\Carbon::createFromFormat('d/m/Y',$start_date)->format('Y-m-d');
        $end_date=\Carbon\Carbon::parse($end_date)->addMonth(1)->subDays(1)->format('d/m/Y');
        Payments::create([
            'inquiry_id'=>$inquiry->id,
            'student_id'=>$inquiry->student_id,
            'date_from'=>$start_date,
            'date_to'=>$end_date,
            'amount'=>$inquiry->price,
            'status'=>'due',
        ]);
        return redirect()->back()->with('message','Payment Approved Successfully');
    }
}
