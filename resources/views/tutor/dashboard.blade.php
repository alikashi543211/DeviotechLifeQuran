@extends('layouts.tutor')
@section('title', 'Dashboard')
@section('css')
    <style>
        .modal-width
        {
            max-width: 600px!important;
        }
    </style>
    @endsection
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="d-flex key-feature align-items-center p-3 rounded shadow mb-4">
                <div class="flex-1 content ms-3">
                    <h4 class="title mb-0">
                        <span style="margin-left: 5px;">Trial Requests</span></h4>
                    @forelse(\App\Models\Inquiry::where('tutor_id',auth()->user()->id)->where('status','trial')->get() as $inquiry)

                        <hr>
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <h6 class=" mb-2">Inquiry : &nbsp;<span class="text-capitalize">{{$inquiry->study_type}}</span></h6>
                                <h6 class=" mb-2">Students : &nbsp;<span class="text-capitalize">{{$inquiry->no_of_students}}</span></h6>
                                <h6 class=" mb-2">Inquiry Date : &nbsp;<span class="text-capitalize">{{date('d/m/Y',strtotime($inquiry->created_at))}}</span></h6>
                                <h6 class=" mb-2">Inquiry Status : &nbsp;
                                    <span class="badge
                                         @if($inquiry->status=='trial') bg-info
                                         @elseif($inquiry->status=='continue') bg-primary
                                         @elseif($inquiry->status=='active') bg-success
                                         @else bg-warning @endif  text-capitalize text-white p-2" style="font-size: 15px"> {{ $inquiry->status }}</span>
                                </h6>
                            </div>
                            <div class="col-md-4  col-12">
                                @if(count($inquiry->schedules)==0)
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary set_trial"
                                                    data-id="{{$inquiry->id}}"
                                                    data-name="{{$inquiry->user->name}}"
                                                    data-no_of_students="{{$inquiry->no_of_students}}"
                                                    data-study_for="{{$inquiry->study_type}}"
                                                    data-date="{{date('d-m-Y',strtotime($inquiry->created_at))}}"
                                                    style="float:right;">Action</button>
                                        </div>
                                    </div>
                                @else
                                    @php
                                        $schedule=\App\Models\Schedule::where('inquiry_id',$inquiry->id)->where('status','trial_class')->first();
                                    @endphp
                                @if($schedule!=null)
                                    <div class="row">
                                        <h6 class=" mb-2">Trial Date : &nbsp;<span class="text-capitalize">{{$schedule->date}}</span></h6>
                                        @php
                                            $exc_start=strtotime($schedule->time)+($inquiry->time_zone*60);
                                            $strt_time=date("H:i",$exc_start);
                                            $date=\Carbon\Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
                                        @endphp

                                        <h6 class=" mb-2">Trial Time : &nbsp;<span class="text-capitalize">{{$strt_time}} ({{$schedule->time}})</span></h6>
                                        @if($schedule->is_done==false && $date==\Carbon\Carbon::today()->format('Y-m-d'))
                                            <button class="btn btn-primary trail-session" data-id="{{$inquiry->id}}">Start Trial Class</button>
                                         @endif
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                    @empty
                        <h5>No request for trial class</h5>
                    @endforelse

                </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="set_trial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-width modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Set Time for Trial</h5>
                    <button type="button" class="btn-close float-end " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{route('tutor.set.trail.class')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="inquiry_id" id="inquiry_id">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Student Name : &nbsp;<span id="student_name"></span></label>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Inquiry : &nbsp;<span id="inquiry_request"></span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Trial Class Date</label>
                                    <input type="text" style="height: 40px;" name="class_date" id="class_date" required class="form-control datepicker" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Trial Class Time</label>
                                    <select class="form-select form-control @error('class_time') is-invalid @enderror" name="class_time" required="required" aria-label="Default select example">
                                        <option disabled selected value="">Time Start</option>
                                        @for($i = 1; $i < 23; $i++)
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


    <div class="modal fade" id="start_class" tabindex="-1"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-body py-5">
                    <div class="text-center">
                        <form id="inquiry_form">
                            @csrf
                            <div class="mt-4">
                                <input type="hidden" name="inquiry_id" id="session_inquiry_id">
                                <p class="text-muted text-modal">Are you sure you want to start class</p>
                                <div class="mt-4">
                                    <button type="submit" class="btn w-75 btn-success start_button">Start Class</button>
                                </div>
                                <div class="gif" style="display: none;">
                                    <img src="{{asset('images/gif.gif')}}">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>
        $(document).ready(function () {

            $('.set_trial').click(function () {
                let id=$(this).data('id');
                let name=$(this).data('name');
                let no_of_students=$(this).data('no_of_students');
                let study_for=$(this).data('study_for');
                let date=$(this).data('date');
                $('#set_trial').modal('show');
                $('#inquiry_id').val(id);
                $('#student_name').text(name);
                $('#inquiry_request').text(study_for);

            });

        });
    </script>
    <script>
        $('.trail-session').click(function () {
            let inquiry_id=$(this).data('id');
            $('#session_inquiry_id').val(inquiry_id);
            $('#start_class').modal('show');
        });
    </script>
    <script>
        $(document).ready(function () {

            $('#inquiry_form').on('submit',function (e) {
                e.preventDefault();
                $('.start_button').hide();
                $('.gif').show();
                $('.text-modal').text('Please wait a moment you will be redirect to the link');
                let url='{{route('tutor.start.class')}}';
                let this_page='{{route('tutor.dashboard')}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: url,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data){

                        $('#start_class').modal('hide');
                        window.location.href=data.url;
                    },
                    error: function(error){

                        alert('Internet Problem Please retry later');
                        $('.start_button').show();
                        $('.gif').hide();
                        $('#start_class').modal('hide');
                    }
                });
            });


        });
    </script>

    @endsection
