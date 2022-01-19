@extends('layouts.admin')
@section('title','Today Schedules')
@section('heading','Today Classes')
@section('css')

    <style>
        .waves-effect{
            overflow: unset!important;
        }
    </style>

@endsection

@section('content')


    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- BEGIN: Content-->
                    <section id="data-list-view" class="data-list-view-header">

                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table data-list-view">
                                <thead>
                                <tr>
                                    <th>Sr.#</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Tutor Name</th>
                                    <th>Tutor Email</th>
                                    <th>Class</th>
                                    <th>Class Time</th>
                                    <th>Start Url</th>
                                    <th>Join Url</th>
                                    <th class="float-right pr-2">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count=0;
                                    @endphp
                                    @foreach($trials as $trial)
                                        @php
                                            $exc_start=strtotime($trial->time)+($trial->inquiry->time_zone*60);
                                            $strt_time=date("H:i",$exc_start);
                                            $session=checkTodaySession($trial->inquiry_id);
                                        @endphp

                                        <td>{{++$count}}</td>
                                        <td>{{$trial->student->name}}</td>
                                        <td>{{$trial->student->email}}</td>

                                        <td>{{$trial->inquiry->tutor->name}}</td>
                                        <td>{{$trial->inquiry->tutor->email}}</td>
                                        <td class="text-capitalize">{{$trial->inquiry->study_type}}</td>
                                        <td>{{$strt_time}} ({{$trial->time}})</td>


                                        <td>
                                            <div class="  start_url_display" @if($session!==null) @else style="display: none;" @endif>
                                                <input type="text" id="start-link-{{  $trial->id }}" class="form-control form-control-sm start-link" value="{{$session!==null?$session->start_url:''}}" >
                                                <div class="input-group-append">
                                                    <button class="btn btn-sm btn-primary start-copy-link">Copy</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="  join_url_display" @if($session!==null) @else style="display: none;" @endif>
                                                <input type="text" id="join-link-{{  $trial->id }}" class="form-control form-control-sm join-link" value="{{$session!==null?$session->join_url:''}}" >
                                                <div class="input-group-append">
                                                    <button class="btn btn-sm btn-primary join-copy-link">Copy</button>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if($session==null)
                                                <button id="button-class-{{$trial->id}}" type="button" class="btn btn-relief-success start-session" data-id="{{$trial->id}}" title="Start Class">Start Class</button>
                                            @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                    @forelse($schedules as $schedule)
                                        <tr>
                                            @php
                                                $exc_start=strtotime($schedule->time)+($schedule->inquiry->time_zone*60);
                                                $strt_time=date("H:i",$exc_start);
                                                $session=checkTodaySession($schedule->inquiry_id);
                                            @endphp
                                            <td>{{++$count}}</td>
                                            <td>{{$schedule->student->name}}</td>
                                            <td>{{$schedule->student->email}}</td>

                                            <td>{{$schedule->inquiry->tutor->name}}</td>
                                            <td>{{$schedule->inquiry->tutor->email}}</td>
                                            <td class="text-capitalize">{{$schedule->inquiry->study_type}}</td>
                                            <td>{{$strt_time}} ({{$schedule->time}})</td>

                                            <td>
                                                <div class="  start_url_display" @if($session!==null) @else style="display: none;" @endif>
                                                    <input type="text" id="start-link-{{  $schedule->id }}" class="form-control form-control-sm start-link" value="{{$session!==null?$session->start_url:''}}" >
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm btn-primary start-copy-link">Copy</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="  join_url_display" @if($session!==null) @else style="display: none;" @endif>
                                                    <input type="text" id="join-link-{{  $schedule->id }}" class="form-control form-control-sm join-link" value="{{$session!==null?$session->join_url:''}}" >
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm btn-primary join-copy-link">Copy</button>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                @if($session==null)
                                                    <button id="button-class-{{$schedule->id}}" type="button" class="btn btn-relief-success start-session" data-id="{{$schedule->id}}" title="Start Class">Start Class</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="start_class" tabindex="-1"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-body py-5">
                    <div class="text-center">
                        <form id="inquiry_form" {{--method="post" action="{{route('admin.start.class')}}"--}}>
                            @csrf
                            <div class="mt-4">
                                <input type="hidden" name="schedule_id" id="session_schedule_id">
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

            $('.dt-buttons.btn-group').css("display", "none");
        });
        </script>
    <script>
        $('.start-session').click(function () {
            let schedule_id=$(this).data('id');
            $('#session_schedule_id').val(schedule_id);
            $('#start_class').modal('show');
        });
        $(document).ready(function () {

            $(document).on("click",".start-copy-link", function(event) {
                var elm = $(this).closest('td').find('.start-link');
                $(elm).select();
                document.execCommand("copy");
                $('.start-copy-link').text('Copy');
                $(this).text('Copied');
            });

            $(document).on("click",".join-copy-link", function(event) {
                var elm = $(this).closest('td').find('.join-link');
                $(elm).select();
                document.execCommand("copy");
                $('.join-copy-link').text('Copy');
                $(this).text('Copied');
            });

        });
    </script>
    <script>
        $(document).ready(function () {

            $('#inquiry_form').on('submit',function (e) {
                e.preventDefault();
                $('.start_button').hide();
                $('.gif').show();
                $('.text-modal').text('Please wait a moment you will be redirect to the link');
                let url='{{route('admin.start.class')}}';

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

                            $('#start-link-'+data.id).closest('.start_url_display').show();
                            $('#join-link-'+data.id).closest('.join_url_display').show();
                            $('#button-class-'+data.id).hide();
                            $('#start-link-'+data.id).val(data.start_url);
                            $('#join-link-'+data.id).val(data.join_url);

                        $('.start_button').show();
                        $('.gif').hide();

                        // alert(data.start_url,data.join_url);
                        // window.location.reload();
                        // window.location.href=data.url;
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
