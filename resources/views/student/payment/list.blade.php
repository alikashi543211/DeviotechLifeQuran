@extends('layouts.student')
@section('title', 'Payments List')
@section('css')

@endsection
@section('content')


    <div class="row">
        <div class="col-sm-12 mt-4 pt-1">
            <div class="card shadow border-0">
                <div class="card-header card-shadow header-position">
                    <h5 class="text-white mb-0">Payments List</h5>
                </div>
                <div class="card-body">
                    <table  class="table datatable  invoice-tb">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Payment Duration</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$payment->date_from}} - {{$payment->date_to}}</td>
                                    <td>
                                        <span class="badge bg-primary mt-1 p-2 text-capitalize">
                                            $ {{number_format($payment->amount,2)}}
                                        </span>
                                    </td>
                                    <td class="text-center" >
                                        <span class="badge mt-1 p-2 text-capitalize
                                        @if($payment->statsus=='pending') bg-primary
                                        @elseif($payment->status=='due') bg-danger @else bg-success @endif ">{{$payment->status}}</span>
                                    </td>
                                    @php
                                        $id=\Illuminate\Support\Facades\Crypt::encrypt($payment->id);
                                    @endphp
                                    <td class="text-center" >
                                        <a href="{{route('student.inquiry.payment.invoice',['id'=>$id])}}" class="btn btn-primary" style="padding: 6px 12px!important;"><img style="height: 18px;" src="{{asset('images/thumb-tack.png')}}"> Invoice</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
