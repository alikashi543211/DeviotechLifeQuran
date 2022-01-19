@extends('layouts.admin')
@section('title','Inquiry Detail')
@section('heading','Student Inquiry Detail')
@section('css')

    <style>
        .waves-effect{
            overflow: unset!important;
        }

         .page-users-view table td {
             padding-bottom: 0.8rem;
             min-width: 140px;
             word-break: break-word;
         }
         .modal-width
         {
             max-width: 600px!important;
         }
        .form-group {
            margin-bottom: 1.0rem!important;
        }

    </style>


@endsection

@section('content')


        <input type="hidden" id="time_zone">

    <section class="page-users-view">
        <div class="row">
            <!-- account start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Student Detail</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="users-view-image" style="width: 150px;height: 150px;">
                                <img src="{{asset($inquiry->user->avatar)}}" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" style="width: 150px!important;" alt="avatar">
                            </div>
                            <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Name</td>
                                        <td>{{$inquiry->user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Email</td>
                                        <td>{{$inquiry->user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Phone</td>
                                        <td>{{$inquiry->user->phone}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-12 col-lg-5">
                                <table class="ml-0 ml-sm-0 ml-lg-0">
                                    <tbody><tr>
                                        <td class="font-weight-bold">Status</td>
                                        <td>
                                            <div class="chip chip-success">
                                                <div class="chip-body">
                                                    <div class="chip-text text-capitalize">{{$inquiry->user->status}}</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Role</td>
                                        <td>{{$inquiry->user->role}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Member Since</td>
                                        <td>{{date('d-m-Y',strtotime($inquiry->user->created_at))}}</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="col-12  mt-2">
                                <div class="btn-group">
{{--                                    @if($inquiry->user->status=='active')--}}
{{--                                        <button type="button" class="btn btn-relief-info block-student  waves-effect waves-light"><i class="fa fa-ban"></i> Block</button>--}}
{{--                                    @elseif($inquiry->user->status=='inactive' || $inquiry->user->status=='pending' || $inquiry->user->status=='reject')--}}
{{--                                        <button type="button" onclick="unblockAlert('{{route('admin.student.unblock',$inquiry->user->id)}}')" class="btn btn-relief-success   waves-effect waves-light"><i class="fa fa-check-circle " style="margin-right: 5px;"></i>Active</button>--}}
{{--                                    @endif--}}
{{--                                    @if($inquiry->user->status=='pending')--}}
{{--                                        <button type="button" class="btn btn-relief-info reject-student   waves-effect waves-light"><i class="fa fa-times" style="margin-right: 5px;"></i> Reject</button>--}}
{{--                                    @endif--}}
                                    <button  type="button" onclick="deleteAlert('{{route('admin.student.delete',$inquiry->user->id)}}')" title="Trash" class="btn btn-relief-danger waves-effect waves-light"><i class="feather icon-trash-2"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- account end -->

            <div class="col-sm-12 col-12 ">
                <div class="card">
                    <div class="card-header mb-2">
                        <div class="card-title ">Inquiry Detail</div>
                        <div class="btn-group">
                            @if(($inquiry->status=='pending' && $inquiry->tutor_id==null) || $inquiry->status=='rejected')
                                <a href="#" class="assign_tutor btn btn-relief-primary waves-effect waves-light"  title="Assign Tutor">Assign Tutor</a>
                            @elseif($inquiry->status=='continue')
                                <a href="#" class=" btn set-class-schedule btn-relief-primary waves-effect waves-light"  title="Set Class Schedule">Set Schedule</a>
                                <a href="#" class="change_tutor btn btn-relief-warning waves-effect waves-light"  title="Assign Tutor">Change Tutor</a>
                            @else
                                <a href="#" class="change_tutor btn btn-relief-warning waves-effect waves-light"  title="Assign Tutor">Change Tutor</a>

                            @endif
                                <a href="#" class="update_inquiry btn btn-relief-info waves-effect waves-light"  title="Update Inquiry">Update Inquiry</a>
                            @if($inquiry->status=='trial')
                                @if(count($inquiry->schedules)==0)
                                        <a href="#" class="set_trial btn btn-relief-primary waves-effect waves-light"  title="Set Trial Class">Set Trial Class</a>
                                @endif
                                @elseif($inquiry->status=='active')
                                    <a href="#" class="update_class_schedule btn btn-relief-primary waves-effect waves-light"  title="Update Class Schedule">Update Schedule</a>
                            @endif
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="w-100">
                            <tbody><tr>
                                <td class="font-weight-bold">Date </td>
                                <td>{{date('d-m-Y',strtotime($inquiry->created_at))}}</td>
                                <td class="font-weight-bold">Status</td>

                                <td>
                                    <div class="chip
                                        @if($inquiry->status=='rejected' || $inquiry->status=='cancel' ) chip-danger
                                        @elseif($inquiry->status=='pending' )
                                        chip-primary
                                        @else chip-success @endif">
                                        <div class="chip-body">
                                            <div class="chip-text text-capitalize">
                                                {{ $inquiry->status }}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="edit_status"  title="Edit Status"><i class="fa fa-pencil ml-1 " style="font-size: 17px"></i></a>
                                </td>
                            </tr>
                            <tr>
                                @php
                                    $exc_start=strtotime($inquiry->time_start)+($inquiry->time_zone*60);
                                    $exc_end=strtotime($inquiry->time_end)+($inquiry->time_zone*60);
                                    $strt_time=date("H:i",$exc_start);
                                    $end_time=date("H:i",$exc_end);
                                @endphp
                                <td class="font-weight-bold">Class Start</td>

                                <td>@if($inquiry->time_start!==null)  {{$strt_time}} ({{$inquiry->time_start}}) @endif</td>

                                <td class="font-weight-bold">Class End</td>
                                <td>@if($inquiry->time_end!==null)  {{$end_time}} ({{$inquiry->time_end}}) @endif</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Study</td>
                                <td class="text-capitalize">{{$inquiry->study_type}}</td>
                                <td class="font-weight-bold">No of Students</td>
                                <td class="text-capitalize">{{$inquiry->no_of_students}}</td>
                            </tr>

                            @if($inquiry->tutor_id!==null)
                                <tr>
                                    <td class="font-weight-bold">Tutor</td>
                                    <td class="text-capitalize">{{$inquiry->tutor->name}}</td>
                                    <td class="font-weight-bold">Tutor Email</td>
                                    <td >{{$inquiry->tutor->email}}</td>
                                </tr>
                            @endif
                            @if($inquiry->rejected_reason!==null)
                                <tr style="background-color: antiquewhite;">
                                    <td class="font-weight-bold pt-1">Reject Reason</td>
                                    <td colspan="3" class="pt-1">{{$inquiry->rejected_reason}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="font-weight-bold">Time Difference in Minutes</td>
                                <td class="text-capitalize">{{$inquiry->time_zone}}</td>
                                <td class="font-weight-bold">Payment Start Date</td>
                                <td class="text-capitalize">@if($inquiry->payment_start_date!==null) <span class="badge bg-success">{{$inquiry->payment_start_date}}</span> @endif </td>
                            </tr>
                            @php
                                $classes=$inquiry->schedules->where('status','live_class');
                            @endphp
                            @if(count($classes)>0)
                                <tr>
                                    <td class="font-weight-bold">Class Days</td>
                                    <td class="text-capitalize font-weight-bold text-primary">
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
                                    </td>
                                </tr>
                            @endif

                            @if($inquiry->price!==null)

                                <tr>
                                    <td class="font-weight-bold">Plan Price</td>
                                    <td class="text-capitalize text-primary font-weight-bold">{{number_format($inquiry->price,2)}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">No of Sessions Weekly</td>
                                    <td class="text-capitalize">{{$inquiry->weekly_sessions??'NA'}}</td>
                                    <td class="font-weight-bold">No of Sessions Monthly</td>
                                    <td class="text-capitalize">{{$inquiry->monthly_sessions??'NA'}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if(count($inquiry->payments)>0)
                <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-center">
                        <div class="card-title">Payment History</div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- DataTable starts -->
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                    <tr>
                                        <th>Sr.#</th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th>Paid Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th >ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inquiry->payments as $payment)
                                            <tr>
                                                <td >{{$loop->iteration}}</td>

                                                <td>{{$payment->date_from}}</td>
                                                <td>{{$payment->date_to}}</td>
                                                <td>{{$payment->pay_date}}</td>
                                                <td>${{$payment->amount}}</td>
                                                <td><span style="padding: 5px;" class="badge text-capitalize @if($payment->status=='due') badge-danger @elseif($payment->status=='pending') badge-primary @else badge-success @endif"> {{$payment->status}}</span></td>
                                                <td>
                                                    <div class="btn-group">
                                                        @if($payment->receipt!==null)
                                                            <a href="{{route('admin.invoice.receipt',$payment->id)}}" class="btn btn-relief-primary" title="Receipt">Receipt</a>
                                                        @endif
                                                        @if($payment->status=='pending')
                                                            <button class="btn btn-relief-success approve-payment" data-route="{{route('admin.approve.payment',$payment->id)}}" title="Payment Approve">Confirm</button>
                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- DataTable ends -->
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>




    <div class="modal fade" id="block-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Describe Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="submit-form" action="{{route('admin.student.block')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$inquiry->user->id}}">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="">
                                <textarea  rows="6" cols="8" placeholder="Block Reason" name="block_reason" class="form-control block-reason" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success block-submit">Block</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reject-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Describe Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="submit-form" action="{{route('admin.student.reject')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$inquiry->user->id}}">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="">
                                <textarea  rows="6" cols="8" placeholder="Reject Reason" name="block_reason" class="form-control block-reason" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success block-submit">Reject</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Assign Tutor-->
    <div class="modal fade" id="assign_tutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Assign Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="reject-form" action="{{route('admin.student.assign.tutor')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$inquiry->id}}" id="user_id">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Tutor</label>
                                <select  name="tutor_id" class="select2 form-control" required>
                                    <option disabled selected value="">Select tutor</option>
                                    @foreach($tutors as $tutor)
                                        <option {{$tutor->id==$inquiry->tutor_id?'selected':''}} value="{{$tutor->id}}">{{$tutor->name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$tutor->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label>Trial Class Date</label>
                                <input type="text" style="height: 40px;" name="class_date" id="class_date" required class="form-control datepicker" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label>Trial Class Time</label>
                                <select class="form-select form-control @error('class_time') is-invalid @enderror" name="class_time" required="required" aria-label="Default select example">
                                    <option disabled selected value="">Time Start</option>
                                    @for($i = 1; $i < 23; $i++)
                                        @php
                                            if($i<10)
                                            {
                                                $i='0'.$i;
                                            }
                                        @endphp
                                        <option value="{{ $i }}:00">{{ $i }}:00</option>
                                        <option value="{{ $i }}:30">{{ $i }}:30</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success ">Assign</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Assign Tutor-->

    <!-- Update Tutor-->
    <div class="modal fade" id="edit_tutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Change Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="reject-form" action="{{route('admin.student.update.tutor')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$inquiry->id}}" id="user_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Tutor</label>
                                    <select  name="tutor_id" class="select2 form-control" required>
                                        <option disabled selected value="">Select tutor</option>
                                        @foreach($tutors as $tutor)
                                            <option {{$tutor->id==$inquiry->tutor_id?'selected':''}} value="{{$tutor->id}}">{{$tutor->name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$tutor->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success ">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Update Tutor-->


    <!-- Inquiry Status-->
    <div class="modal fade" id="inquiry_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Inquiry Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="reject-form" action="{{route('admin.student.inquiries.status.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$inquiry->id}}" id="user_id">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="">
                                <label>Select Inquiry Status</label>
                                <select name="status" class="form-control" required>
                                    <option disabled selected value="">Choose Status</option>
                                        <option {{$inquiry->status=='pending'?'selected':''}} value="pending">Pending</option>
                                        <option {{$inquiry->status=='rejected'?'selected':''}} value="rejected">Rejected</option>
                                        <option {{$inquiry->status=='paused'?'selected':''}} value="paused">Paused</option>
                                        <option {{$inquiry->status=='cancel'?'selected':''}} value="canceled">Cancel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6  btn-group">
                            <button type="button" class="btn mr-0 btn-relief-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-relief-success ">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Inquiry Status-->


    <div class="modal fade" id="update_inquiry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-width modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Inquiry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('admin.student.inquiries.update')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" id="inquiry_id">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No of Students</label>
                                    <select name="no_of_students" class="form-control" required>
                                        <option disabled selected value="">Select No of Students</option>
                                        <option {{$inquiry->no_of_students==1?'selected':''}} value="1">1</option>
                                        <option {{$inquiry->no_of_students==2?'selected':''}} value="2">2</option>
                                        <option {{$inquiry->no_of_students==3?'selected':''}} value="3">3</option>
                                        <option {{$inquiry->no_of_students==4?'selected':''}} value="4">4</option>
                                        <option {{$inquiry->no_of_students==5?'selected':''}} value="5">5</option>
                                    </select>
                                    @error('no_of_students')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Class Start Time</label>
                                    <select class="form-select form-control @error('time_start') is-invalid @enderror" id="inquiry_start_time" name="time_start" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time End</option>
                                        @for($i = 1; $i < 23; $i++)
                                            @php
                                                if($i<10)
                                                {
                                                    $i='0'.$i;
                                                }
                                            @endphp
                                            <option {{$inquiry->time_start==$i.':00'?'selected':''}} value="{{ $i }}:00">{{ $i }}:00</option>
                                            <option {{$inquiry->time_start==$i.':30'?'selected':''}} value="{{ $i }}:30">{{ $i }}:30</option>
                                        @endfor
                                    </select>
                                    @error('time_start')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Class End Time</label>
                                    <select class="form-select form-control @error('time_end') is-invalid @enderror"  id="inquiry_end_time"  name="time_end" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time End</option>
                                        @for($i = 1; $i < 23; $i++)
                                            @php
                                                if($i<10)
                                                {
                                                    $i='0'.$i;
                                                }
                                            @endphp
                                            <option {{$inquiry->time_end==$i.':00'?'selected':''}} value="{{ $i }}:00">{{ $i }}:00</option>
                                            <option {{$inquiry->time_end==$i.':30'?'selected':''}} value="{{ $i }}:30">{{ $i }}:30</option>
                                        @endfor
                                    </select>
                                    @error('time_end')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

    <div class="modal fade" id="set_trial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Set Trial Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('admin.student.inquiries.set.trial')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" id="inquiry_id">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Trial Class Date</label>
                                    <input type="text" style="height: 40px;" name="class_date" id="class_date" required class="form-control datepicker" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Trial Class Time</label>
                                    <select class="form-select form-control @error('class_time') is-invalid @enderror" name="class_time" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time Start</option>
                                        @for($i = 1; $i < 23; $i++)
                                            @php
                                                if($i<10)
                                                {
                                                    $i='0'.$i;
                                                }
                                            @endphp
                                            <option value="{{ $i }}:00">{{ $i }}:00</option>
                                            <option value="{{ $i }}:30">{{ $i }}:30</option>
                                        @endfor
                                    </select>
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


    <div class="modal fade" id="set_schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Set Class Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('admin.student.inquiries.set.schedule')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="schedule_status" value="live_class">
                            <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" id="inquiry_id">
                            <div class="col-md-12">

                                <div class="form-group ">
                                    <label>Class Days</label>
                                    <select class="form-control select2" name="days[]" id="class_days" multiple="multiple" required>
                                        <option value="1">Monday</option>
                                        <option value="2">Tuesday</option>
                                        <option value="3">Wednesday</option>
                                        <option value="4">Thursday</option>
                                        <option value="5">Friday</option>
                                        <option value="6">Saturday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Class Start Time</label>
                                    <select class="form-select form-control @error('time_start') is-invalid @enderror" id="set_schedule_start" name="time_start" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time End</option>
                                        @for($i = 1; $i < 23; $i++)
                                            @php
                                                if($i<10)
                                                {
                                                    $i='0'.$i;
                                                }
                                            @endphp
                                            <option {{$inquiry->time_start==$i.':00'?'selected':''}} value="{{ $i }}:00">{{ $i }}:00</option>
                                            <option {{$inquiry->time_start==$i.':30'?'selected':''}} value="{{ $i }}:30">{{ $i }}:30</option>
                                        @endfor
                                    </select>
                                    @error('time_start')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Class End Time</label>
                                    <select class="form-select form-control @error('time_end') is-invalid @enderror"  id="set_schedule_end"  name="time_end" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time End</option>
                                        @for($i = 1; $i < 23; $i++)
                                            @php
                                                if($i<10)
                                                {
                                                    $i='0'.$i;
                                                }
                                            @endphp
                                            <option {{$inquiry->time_end==$i.':00'?'selected':''}} value="{{ $i }}:00">{{ $i }}:00</option>
                                            <option {{$inquiry->time_end==$i.':30'?'selected':''}} value="{{ $i }}:30">{{ $i }}:30</option>
                                        @endfor
                                    </select>
                                    @error('time_end')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Session in Week</label>
                                    <input type="number" class="form-control" name="weekly_sessions" required id="weekly_sessions" placeholder="sessions in week">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Session in Month</label>
                                    <input type="number" class="form-control" name="monthly_sessions" required id="monthly_sessions" placeholder="sessions in month">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total Price Monthly</label>
                                    <input type="number" step=".02" class="form-control" min="0" name="price" required id="amount" placeholder="Monthly Payment">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Start Date</label>
                                    <select class="form-select form-control @error('payment_start_date') is-invalid @enderror" name="payment_start_date" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Payment Start Date</option>
                                        @for($i = 1; $i < 30; $i++)

                                            <option {{$inquiry->payment_start_date==$i?'selected':''}} value="{{ $i }}">{{ $i }}</option>

                                        @endfor
                                    </select>
                                    @error('payment_start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

    <div class="modal fade" id="update_class_schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Class Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('admin.student.inquiries.schedule.update')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="schedule_status" value="live_class">
                            <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}" id="inquiry_id">
                            <div class="col-md-12">

                                <div class="form-group ">
                                    <label>Class Days</label>
                                    <select class="form-control select2" name="days[]" id="update_class_days" multiple="multiple" required>
                                        <option
                                            @foreach($classes as $class)
                                                {{$class->day==1?'selected':''}}
                                            @endforeach  value="1">Monday</option>
                                        <option
                                            @foreach($classes as $class)
                                            {{$class->day==2?'selected':''}}
                                            @endforeach  value="2">Tuesday</option>
                                        <option
                                            @foreach($classes as $class)
                                            {{$class->day==3?'selected':''}}
                                            @endforeach  value="3">Wednesday</option>
                                        <option
                                            @foreach($classes as $class)
                                            {{$class->day==4?'selected':''}}
                                            @endforeach  value="4">Thursday</option>
                                        <option
                                            @foreach($classes as $class)
                                            {{$class->day==5?'selected':''}}
                                            @endforeach  value="5">Friday</option>
                                        <option
                                            @foreach($classes as $class)
                                            {{$class->day==6?'selected':''}}
                                            @endforeach  value="6">Saturday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Class Start Time</label>
                                    <select class="form-select form-control @error('time_start') is-invalid @enderror"  id="update_schedule_start"  name="time_start" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time End</option>
                                        @for($i = 1; $i < 23; $i++)
                                            @php
                                                if($i<10)
                                                {
                                                    $i='0'.$i;
                                                }
                                            @endphp
                                            <option {{$inquiry->time_start==$i.':00'?'selected':''}} value="{{ $i }}:00">{{ $i }}:00</option>
                                            <option {{$inquiry->time_start==$i.':30'?'selected':''}} value="{{ $i }}:30">{{ $i }}:30</option>
                                        @endfor
                                    </select>
                                    @error('time_start')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Class End Time</label>
                                    <select class="form-select form-control @error('time_end') is-invalid @enderror"  id="update_schedule_start"  name="time_end" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time End</option>
                                        @for($i = 1; $i < 23; $i++)
                                            @php
                                                if($i<10)
                                                {
                                                    $i='0'.$i;
                                                }
                                            @endphp
                                            <option {{$inquiry->time_end==$i.':00'?'selected':''}} value="{{ $i }}:00">{{ $i }}:00</option>
                                            <option {{$inquiry->time_end==$i.':30'?'selected':''}} value="{{ $i }}:30">{{ $i }}:30</option>
                                        @endfor
                                    </select>
                                    @error('time_end')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Session in Week</label>
                                    <input type="number" class="form-control" name="weekly_sessions" value="{{$inquiry->weekly_sessions}}" required id="update_weekly_sessions" placeholder="sessions in week">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Session in Month</label>
                                    <input type="number" class="form-control" name="monthly_sessions" value="{{$inquiry->monthly_sessions}}" required id="update_monthly_sessions" placeholder="sessions in month">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Start Date</label>
                                    <input type="number" step=".02" class="form-control" min="0" value="{{$inquiry->price}}" name="price" required id="amount" placeholder="Monthly Payment">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Start Date</label>
                                    <select class="form-select form-control @error('payment_start_date') is-invalid @enderror" name="payment_start_date" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time End</option>
                                        @for($i = 1; $i < 30; $i++)

                                            <option {{$inquiry->payment_start_date==$i?'selected':''}} value="{{ $i }}">{{ $i }}</option>

                                        @endfor
                                    </select>
                                    @error('payment_start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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



        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <img src="" class="imagepreview" style="width: 100%;" >
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $(function() {
                $('.pop').on('click', function() {
                    $('.imagepreview').attr('src', $(this).data('src'));
                    $('#imagemodal').modal('show');
                });
            });


            $('.approve-payment').click(function () {

                let url=$(this).data('route');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want approve !",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href=url;
                    }
                })

            });
        });




        $(document).ready(function () {
            $('.data-table').DataTable({
                "order": [[ 0, "desc" ]],
                "autoWidth": true

            });
            $('.reject-student').click(function () {
                $('#reject-student').modal('show');
            });
            $('.set_trial').click(function () {
                $('#set_trial').modal('show');
            });
            $('.block-student').click(function () {
                $('#block-student').modal('show');
            });
            $('.assign_tutor').click(function () {
                $('#assign_tutor').modal('show');
            });
            $('.edit_status').click(function () {
                $('#inquiry_status').modal('show');
            });

            $('.change_tutor').click(function () {
                $('#edit_tutor').modal('show');
            });

            $('.update_inquiry').click(function () {
                $('#update_inquiry').modal('show');
            });


            $('.set-class-schedule').click(function () {
                $('#set_schedule').modal('show');
            });
            $('.update_class_schedule').click(function () {
                $('#update_class_schedule').modal('show');
            });


        });
    </script>
    <script>
        $(document).ready(function () {
            $('#class_days').change(function () {
                let leng=$(this).val().length;
                $('#weekly_sessions').val(leng);
                $('#monthly_sessions').val(leng*4);
            });

            $('#update_class_days').change(function () {
                let leng=$(this).val().length;
                $('#update_weekly_sessions').val(leng);
                $('#update_monthly_sessions').val(leng*4);
            });
        });
    </script>
    <script>
        $(document).ready(function(){
           $('#inquiry_end_time').change(function () {
                let end_time=$(this).val();
                if($('#inquiry_start_time').val() > end_time)
                {
                    $(this).val('');
                   toastr.error('Please choose class end time greater then start time.')
                }
           }) ;
            $('#set_schedule_end').change(function () {
                let end_time=$(this).val();
                if($('#set_schedule_start').val() > end_time)
                {
                    $(this).val('');
                    toastr.error('Please choose class end time greater then start time.')
                }
            }) ;
            $('#update_schedule_end').change(function () {
                let end_time=$(this).val();
                if($('#update_schedule_start').val() > end_time)
                {
                    $(this).val('');
                    toastr.error('Please choose class end time greater then start time.')
                }
            }) ;
        });
    </script>

    @endsection
