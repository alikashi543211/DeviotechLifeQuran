@extends('layouts.student')
@section('title', 'Inquiries')
@section('css')
    <style>
        table td {
            padding: 0.7rem 0rem;
            word-break: break-word;
        }
        .font-weight-bold{
            font-weight: 600;
        }
        </style>
    @endsection

@section('content')

    <div class="row">
        <div class="col-sm-12 mb-4">
            <div class=" text-md-end">
                <a href="{{route('student.add.inquiry')}}" class="btn btn-primary">New Inquiry</a>
            </div><!--end col-->
        </div>
        @foreach($inquiries as $inquiry)
            <div class="col-sm-12 mt-4 mb-4">
                <div class="card shadow border-0">
                    <div class="card-header card-shadow header-position">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item font-weight-bold list-bg">Inquiry No : <span class="header-font-size"> # {{$inquiry->id}} </span></li>
                                    @if($inquiry->price!==null)
                                        <li class="list-group-item font-weight-bold list-bg">
                                            Monthly Price : <span class="header-font-size"> &nbsp; {{$inquiry->price}} </span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <li class="list-group-item font-weight-bold list-bg">Status : &nbsp;
                                        <span class="badge
                                                @if($inquiry->status=='trial') bg-info
                                                @elseif($inquiry->status=='continue') bg-primary
                                                @elseif($inquiry->status=='active') bg-success
                                                @else bg-warning @endif  text-capitalize text-white p-2" style="font-size: 15px"><span class="header-font-size">  {{ $inquiry->status }}</span></span>
                                    </li>
                                    @if($inquiry->price!==null)
                                        <li class="list-group-item font-weight-bold list-bg">
                                            Sessions in Month :<span class="header-font-size">  &nbsp; {{$inquiry->monthly_sessions}}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @php
                            $schedules=$inquiry->schedules;
                            $sessions=checkSession($inquiry->id);
                        @endphp

                        <div class="row ">
                            @php
                                $classes=$inquiry->schedules->where('status','live_class');
                            @endphp
                            <div class="col-md-3 col-6">
                                <span class="font-weight-bold">Date</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <span class="">{{date('d-m-Y',strtotime($inquiry->created_at))}}</span>
                            </div>
                            @if(count($classes)>0)

                                <div class="col-md-3 col-6">
                                    <span class="font-weight-bold">Class Days</span>
                                </div>
                                <div class="col-md-3 col-6">
                                            <span class="">
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
                                            </span>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-md-3 col-6">
                                <span class="font-weight-bold">Study</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <span class="text-capitalize">{{$inquiry->study_type}}</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <span class="font-weight-bold">No of Students</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <span class="text-capitalize">{{$inquiry->no_of_students??'NA'}}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-md-3 col-6">
                                <span class="font-weight-bold">Class Start</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <span class="text-capitalize badge bg-dark   mt-1">{{$inquiry->time_start??'NA'}}</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <span class="font-weight-bold">Class End</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <span class="text-capitalize badge bg-dark  mt-1">{{$inquiry->time_end??'NA'}}</span>
                            </div>
                        </div>
                        <hr>
                        @if($inquiry->tutor_id!==null)
                            <div class="row ">
                                <div class="col-md-3 col-6">
                                    <span class="font-weight-bold">Tutor</span>
                                </div>
                                <div class="col-md-3 col-6">
                                    <span class="text-capitalize">{{$inquiry->tutor->name}}</span>
                                </div>
                                <div class="col-md-3 col-6">
                                    <span class="font-weight-bold">Email</span>
                                </div>
                                <div class="col-md-3 col-6">
                                    <span class="">{{$inquiry->tutor->email}}</span>
                                </div>
                            </div>
                            <hr>
                        @endif
                        @if(count($schedules)>0)
                            @if($inquiry->status!=='active')
                                @php
                                    $schedule=$inquiry->schedules->where('status','trial_class')->last();
                                @endphp
                                <div class="row">
                                    <div class="col-md-3 col-6">
                                        <span class="font-weight-bold">Trial Date</span>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <span class="text-capitalize">{{$schedule->date}}</span>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <span class="font-weight-bold">Trial Time</span>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <span class="text-capitalize">{{$schedule->time}}</span>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endif


                        @if($sessions!==0 && count($sessions)==1)
                            <div class="alert alert-info mt-3  alert-dismissible fade show" role="alert">
                                <strong>Well done! Your Trial Class has been completed Please either Continue or Reject Inquiry</strong> .
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                            </div>
                            <div class="btn-group mt-2 p-0" >
                                <button class="btn btn-primary continue-schedule" data-id="{{$inquiry->id}}">Continue</button>
                                <button class="btn btn-danger reject_schedule" data-id="{{$inquiry->id}}">Reject</button>
                            </div>
                        @elseif($inquiry->price!==null)
                            @php

                                $payment=lastPayment($inquiry);
                                $id=\Illuminate\Support\Facades\Crypt::encrypt($payment->id);
                            @endphp

                            <a href="{{route('student.inquiry.payment.invoice',['id'=>$id])}}" class="btn btn-primary mt-2" data-id="{{$inquiry->id}}"><img style="height: 21px;" src="{{asset('images/thumb-tack.png')}}"> Invoice</a>
                        @endif
                        @if($inquiry->status!=='cancel')
                            <div class="mt-3" style="float:right;">
                                <a href="#" class="text-danger cancel-Inquiry" data-id="{{$inquiry->id}}"><i class="fa fa-times-circle mr-1"></i> Cancel Inquiry</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>




    <div class="modal fade" id="reject_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-width modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Reject Reason</h5>
                    <button type="button" class="btn-close float-end " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{route('student.inquiry.reject')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="inquiry_id" id="inquiry_id_reject" >
                            <input type="hidden" name="status" value="rejected">
                            {{--                            <div class="col-sm-12 col-12">--}}
                            {{--                                <div class="form-group mb-2">--}}
                            {{--                                    <label>Inquiry Rejection</label>--}}
                            {{--                                    <select name="status" class="form-control" required>--}}
                            {{--                                        <option disabled selected value="">Choose Status</option>--}}
                            {{--                                        <option  value="paused">Paused</option>--}}
                            {{--                                        <option  value="cancel">Cancel</option>--}}
                            {{--                                        <option  value="rejected">Change Tutor</option>--}}
                            {{--                                    </select>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="col-sm-12 col-12">
                                <div class="form-group mb-0">
                                    <label>Reason</label>
                                    <textarea name="rejected_reason" class="form-control" required cols="8" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('.reject_schedule').click(function () {
                let id=$(this).data('id');
                $('#inquiry_id_reject').val(id);
                $('#reject_modal').modal('show');
            });

            $('.continue-schedule').click(function () {
                let id=$(this).data('id');
                let url='{{route('student.inquiry.continue')}}?id='+id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to continue!",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Continue!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = url;
                    }
                })
            });


            $('.cancel-Inquiry').click(function () {
                let id=$(this).data('id');
                let url='{{route('student.inquiry.cancel')}}?id='+id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to cancel!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = url;
                    }
                })
            });

        });
    </script>

    @endsection
