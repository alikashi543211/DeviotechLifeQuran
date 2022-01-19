@extends('layouts.tutor')
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



    @endsection



