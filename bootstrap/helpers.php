<?php
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;




    function setting()
    {
        return Setting::pluck('value', 'key')->toArray();
    }

    function sendMail($data)
    {
        if (array_key_exists("pdf",$data)) {
            $mail = Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
                $message->to($data['to'], $data['name'])->subject($data['subject'])->attachData($data['pdf']->output(), "invoice.pdf");
            });
        }else {
            $mail = Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
                $message->to($data['to'], $data['name'])->subject($data['subject']);
            });
        }
    }

    function checkSession($inquiry_id)
    {

        $inquiry=\App\Models\Inquiry::where('id',$inquiry_id)->where('status','trial')->first();
        if ($inquiry!==null)
        {
            $sessions=\App\Models\Schedule::where('inquiry_id',$inquiry_id)->where('status','trial_class')->where('is_done',true)->get();
            return $sessions;
        }
        return 0;
    }

    function checkTodaySession($inquiry_id)
    {
        $session=\App\Models\InquirySession::where('inquiry_id',$inquiry_id)->whereDate('created_at',Carbon::today()->format('Y-m-d'))->first();
        return $session;
    }
    function lastPayment($inquiry)
    {
        $payment=$inquiry->payments->last();

        return $payment;
    }


function getLocation()
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://freegeoip.app/json/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
    {
        return $err;
    }
    else
    {
        return $response;
    }

}


?>
