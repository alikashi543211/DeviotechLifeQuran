@extends('layouts.front')
@section('title', $setting['tutor_title'])
@section('meta')
    <meta name="description" content="{{$setting['tutor_meta_description']??''}}" />
    <meta name="keywords" content="{{$setting['tutor_meta_tag']??''}}" />
@endsection
@section('content')


    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Tutors List </h1>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->


    <!-- Blog STart -->
    <section class="section padding-bottom-mob">
        <div class="container">
            <div class="row">
                @foreach($tutors as $tutor)
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="card blog rounded border-0 shadow overflow-hidden">
                        <div class="position-relative">
                            <img src="{{asset($tutor->avatar)}}" class="card-img-top img-teachers" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body py-3 content">
                            <h5><a href="javascript:void(0)" class="card-title text-capitalize title text-dark">{{$tutor->name}} </a></h5>
                            <div class="post-meta d-flex justify-content-center ">
                                @php

                                  $desc=substr_replace($tutor->profile->detail, "...", 70);
                                @endphp
                                <span>
                                {!! $desc !!}
                                <a href="{{route('tutorDetail',$tutor->slug)}}" class="text-muted  readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </span>

                            </div>
                        </div>
                        <div class="author">
                            <small class="text-light user text-capitalize d-block"><i class="uil uil-user"></i> {{$tutor->name}}</small>
                        </div>
                    </div>
                </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Blog End -->




@endsection
