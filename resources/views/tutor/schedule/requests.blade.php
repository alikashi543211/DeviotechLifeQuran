@extends('layouts.tutor')
@section('title', 'Schedule Requests')
@section('css')

@endsection
@section('content')


    <div class="col-md-12">
        <h4 class="title mb-0">
            <span style="margin-left: 5px;">Schedule Requests</span>
        </h4>

        @foreach($inquiries as $inquiry)
            <div class="col-sm-12 mb-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 col-12">
                                <h6 class=" mb-2">Inquiry : &nbsp;<span class="text-capitalize">{{$inquiry->study_type}}</span></h6>
                                <h6 class=" mb-2">Inquiry Date : &nbsp;<span class="text-capitalize">{{date('d/m/Y',strtotime($inquiry->created_at))}}</span></h6>
                                <h6 class=" mb-2">Trial Class : &nbsp;<span class="text-capitalize">{{$inquiry->schedules[0]->date}}</span></h6>
                            </div>
                            <div class="col-md-3  col-12">
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <a href="{{route('tutor.inquiries.schedules.detail',[$inquiry->id,$inquiry->user->name])}}" class="btn btn-primary " style="float:right;">Detail </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
@section('js')




@endsection
