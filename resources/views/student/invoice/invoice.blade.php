@extends('layouts.student')
@section('title', 'Invoice')
@section('content')


    <div class="card shadow rounded border-0">
        <div class="card-body">

            <div class="invoice-middle py-4">
                <div class="row">
                    @php
                        $inquiry=$payment->inquiry;
                    @endphp
                    <div class="col-md-12 mb-3">
                        <h5 style="float: left">Invoice Details :</h5>
                        @if($payment->status=='due')
                            <button type="button" class="btn btn-primary payment" style="float: right"><i class="fa fa-money-bill"></i> Pay</button>
                        @else
                            <h5><span class="badge p-2 @if($payment->status=='pending') bg-info @else bg-primary @endif text-capitalize" style="float: right">{{$payment->status}}</span> </h5>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <h5 class="text-center text-primary">{{$payment->date_from}}  - {{$payment->date_to}}</h5>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 order-2 order-md-1">
                        <dl class="row">
                            <dt class="col-sm-6 col-6 font-weight-bold fw-normal">Invoice No. :</dt>
                            <dd class="col-sm-6 col-6 "># IN{{$payment->id}}</dd>

                            <dt class="col-sm-6 col-6 font-weight-bold  fw-normal">Inquiry :</dt>
                            <dd class="col-sm-6 col-6  text-capitalize">{{$inquiry->study_type}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-6 order-md-2 order-1 mt-2 mt-sm-0">
                        <dl class="row mb-0">
                            <dt class="col-sm-6 col-6 font-weight-bold fw-normal">Date :</dt>
                            <dd class="col-sm-6 col-6 font-weight-bold  ">{{date('d M Y',strtotime($inquiry->created_at))}}</dd>
                            <dt class="col-sm-6 col-6 font-weight-bold fw-normal">Monthly Price :</dt>
                            <dd class="col-sm-6 col-6 font-weight-bold  ">{{$inquiry->price}}</dd>
                        </dl>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-12 order-2 order-md-1">
                        <dl class="row">
                            <dt class="col-sm-6 col-md-3 col-6 font-weight-bold  fw-normal">Class Days :</dt>
                            <dd class="col-sm-6 col-md-9 col-6 ">
                                @php
                                    $classes=$inquiry->schedules->where('status','live_class');
                                @endphp
                                @foreach($classes as $class)
                                    @if($class->day==1)
                                        Monday,
                                    @elseif($class->day==2)
                                        Tuesday,
                                    @elseif($class->day==3)
                                        Wednesday,
                                    @elseif($class->day==4)
                                        Thursday,
                                    @elseif($class->day==5)
                                        Friday,
                                    @elseif($class->day==6)
                                        Saturday,
                                    @endif
                                @endforeach
                            </dd>
                        </dl>
                    </div>


                </div>
                <div class="row mb-0">
                    <div class="col-md-6 order-2 order-md-1">
                        <dl class="row">
                            @if($inquiry->tutor_id!==null)
                                <dt class="col-md-6 col-6 font-weight-bold  fw-normal">Tutor Name :</dt>
                                <dd class="col-md-6 col-6  text-capitalize">{{$inquiry->tutor->name}}</dd>
                            @endif
                        </dl>
                    </div>
                    <div class="col-md-6 order-md-2 order-1 mt-2 mt-sm-0">
                        <dl class="row">
                            @if($inquiry->tutor_id!==null)
                                <dt class="col-md-6 col-6 font-weight-bold  fw-normal">Tutor Email :</dt>
                                <dd class="col-md-6 col-6  ">{{$inquiry->tutor->email}}</dd>
                            @endif
                        </dl>

                    </div>
                </div>
            </div>

            <div class="invoice-table pb-4">
                <div class="table-responsive bg-white shadow rounded">
                    <table class="table mb-0 table-center invoice-tb">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-bottom text-start">No.</th>
                            @if($payment->status=='due')
                                <th scope="col" class="border-bottom">Date From</th>
                                <th scope="col" class="border-bottom">Date To</th>
                            @else
                                <th scope="col" class="border-bottom text-start">Paid Date</th>
                            @endif
                            <th scope="col" class="border-bottom">Status</th>
                            <th scope="col" class="border-bottom">Amount</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row" class="text-start">1</th>
                            @if($payment->status=='due')
                                <td  class="border-bottom">{{$payment->date_from}}</td>
                                <td  class="border-bottom">{{$payment->date_to}}</td>
                            @else
                                <td class="text-start">{{$payment->pay_date}}</td>
                            @endif
                            <td><span class="badge mt-2 @if($payment->status=='due') bg-danger @elseif($payment->status=='pending') bg-info @else bg-primary @endif text-capitalize">{{$payment->status}}</span> </td>
                            <td > <span class="badge mt-2 bg-primary">$ {{$payment->amount}}</span></td>


                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="row">
                    @if($payment->receipt!==null)
                        <div class="col-md-2 mt-2 ">
                            <a href="{{route('student.invoice.receipt',$payment->id)}}" class="btn btn-secondary">Receipt</a>
                        </div>
                    @endif
                    <div class="col-lg-4 col-md-5 ms-auto">
                        <ul class="list-unstyled h6 fw-normal mt-4 mb-0 ms-md-5 ms-lg-4">

                            <li class="d-flex justify-content-between font-weight-bold">Total :<span>${{$payment->amount}}</span></li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div>

        </div>
    </div>

    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-width modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Invoice Payment</h5>
                    <span class="text-white badge bg-success  mb-0 h6" style="margin-left: auto;">Amount &nbsp;&nbsp;:&nbsp;&nbsp; 807</span></span>
{{--                    <button type="button" class="btn-close btn-close-white float-end text-white" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;margin-left: 1rem!important;"></button>--}}
                </div>
                <form method="post" action="{{route('student.payment.paid')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="inquiry_id" value=" {{$inquiry->id}}"  >
                            <input type="hidden" name="payment_id" value="{{$payment->id}}"  >
                            <input type="hidden" name="status" value="pending">

                            <div class="col-sm-12 col-12">
                                <div class="form-group mb-3">
                                    <label>Paid Date</label>
                                    <input type="text" name="pay_date" class="form-control datepicker" required placeholder="Bank Pay Date">
                                </div>
                            </div>
                            <div class="col-sm-12 col-12">
                                <div class="form-group mb-0">
                                    <label>Bank Receipt (Screenshot)</label>
                                    <input type="file" name="receipt" class="form-control" required placeholder="Upload Payment Receipt">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" data-bs-dismiss="modal" aria-label="Close"  class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('.payment').click(function () {
                $('#payment_modal').modal('show');
            });
        });
    </script>

    @endsection
