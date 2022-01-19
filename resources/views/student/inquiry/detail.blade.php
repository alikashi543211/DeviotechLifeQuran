@extends('layouts.student')
@section('title', 'Inquiry Detail')
@section('css')
<style>
    table td {
        padding: 0.8rem 0rem;
        word-break: break-word;
    }
    .font-weight-bold{
        font-weight: 700;
    }
</style>
@endsection
@section('content')


    <div class="card shadow rounded border-0 overflow-hidden">
        <div class="p-3 border-bottom">
            <h4 class="title mb-0">&nbsp;&nbsp;Inquiry Detail </h4>
        </div>
    <div class="card-body">
        @php

        @endphp
        @if($sessions!==0 && count($sessions)==1)
        <div class="col-md-4 mb-3 col-sm-5 col-5" style="float: right">
            <div class="btn-group">
                <button class="btn btn-primary continue-schedule">Continue</button>
                <button class="btn btn-danger reject_schedule" data-id="{{$inquiry->id}}">Reject</button>
            </div>
        </div>
        @endif
        <table class="w-100">
            <tbody>
            <tr class="border-bottom">
                <td class="font-weight-bold">Date </td>
                <td>{{date('d-m-Y',strtotime($inquiry->created_at))}}</td>
                <td class="font-weight-bold">Status</td>

                <td >
                    <span class="badge bg-primary text-capitalize p-2" style="font-size: 15px"> {{ $inquiry->status }}</span>
                </td>
            </tr>

            <tr class="border-bottom">
                <td class="font-weight-bold">Class Start</td>
                <td>{{$inquiry->time_start}}</td>
                <td class="font-weight-bold">Class End</td>
                <td>{{$inquiry->time_end}}</td>
            </tr>

            <tr class="border-bottom">
                <td class="font-weight-bold">Study</td>
                <td class="text-capitalize">{{$inquiry->study_type}}</td>
                <td class="font-weight-bold">No of Students</td>
                <td class="text-capitalize">{{$inquiry->no_of_students}}</td>

            </tr>
            @if($inquiry->tutor_id!==null)
                <tr class="border-bottom" style="background: aliceblue;">
                    <td class="font-weight-bold">Tutor</td>
                    <td class="text-capitalize">{{$inquiry->tutor->name}}</td>
                    <td class="font-weight-bold">Tutor Email</td>
                    <td >{{$inquiry->tutor->email}}</td>
                </tr>
            @endif
            @php
            $schedules=$inquiry->schedules;
            @endphp
            @if(count($schedules)>0)
                @php
                    $schedule=$inquiry->schedules->where('status','trial_class')->last();
                @endphp

                <tr style="background: aliceblue;">
                    <td class="font-weight-bold">Trial Date</td>
                    <td class="text-capitalize">{{$schedule->date}}</td>
                    <td class="font-weight-bold">Trial Time</td>
                    <td >{{$schedule->time}}</td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>
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
                            <input type="hidden" name="inquiry_id" id="inquiry_id" value="{{$inquiry->id}}">
                            <div class="col-sm-12 col-12">
                                <div class="form-group mb-2">
                                    <label>Inquiry Rejection</label>
                                    <select name="status" class="form-control" required>
                                        <option disabled selected value="">Choose Status</option>
                                        <option  value="paused">Paused</option>
                                        <option  value="cancel">Cancel</option>
                                        <option  value="rejected">Change Tutor</option>
                                    </select>
                                </div>
                            </div>
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
                $('#reject_modal').modal('show');
            });
            $('.continue-schedule').click(function () {
                let url='{{route('student.inquiry.continue',$inquiry->id)}}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to continue!",
                    icon: 'warning',
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
        });
    </script>

    @endsection
