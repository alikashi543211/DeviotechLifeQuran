@extends('layouts.front')
@section('title', $setting['about_title'])
@section('meta')
    <meta name="description" content="{{$setting['about_meta_description'] ?? ''}}" />
    <meta name="keywords" content="{{$setting['about_meta_tag'] ?? ''}}" />
@endsection
@section('content')


    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> About us </h1>
                        <p class="text-white-50 para-desc mb-0 mx-auto">{{$setting['banner_description']??''}}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="section pb-0">
        <div class="container">
            <div class="row align-items-center" id="counter">
                <div class="col-md-6">
                    <img src="{{asset('images/teach.png')}}" class="img-fluid about-image" alt="">
                </div><!--end col-->

                <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="">
                        <div class="d-flex mb-4">
                            <span class="text-primary h1 mb-0"><span class="  fw-bold" style="font-size: 47px" >World's</span>Best Scholars</span>
                        </div>
                        <div class="section-title">
                            <p class="text-muted">{{$setting['who_we_are'] ?? ''}}</p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

    </section><!--end section-->

    <section class="section  pb-0">
        <div class="container">
            <div class="row align-items-center" id="counter">
                <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="">
                        <div class="d-flex mb-4">
                            <span class="text-primary h5 font-weight-bold  mb-0"><span class="  fw-bold" style="font-size: 47px" >Our</span> Mission</span>
                        </div>
                        <div class="section-title">

                            <p class="text-muted">{{$setting['who_we_are'] ?? ''}}</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-6">
                    <img src="{{asset('images/best_tutor.jpg')}}" class="img-fluid about-image" alt="">
                </div><!--end col-->


            </div><!--end row-->
        </div><!--end container-->

    </section><!--end section-->
    <section class="section padding-bottom-mob ">
        <div class="container">
            <div class="row align-items-center" id="counter">
                <div class="col-md-6">
                    <img src="{{asset('images/quran_teaching.jpg')}}" class="img-fluid about-image" alt="">
                </div><!--end col-->
                <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="">
                        <div class="d-flex mb-4">
                            <span class="text-primary h5 font-weight-bold  mb-0"><span class="  fw-bold" style="font-size: 47px" >Our</span> Story</span>
                        </div>
                        <div class="section-title">

                            <p class="text-muted">{{$setting['who_we_are'] ?? ''}}</p>
                        </div>
                    </div>
                </div><!--end col-->



            </div><!--end row-->
        </div><!--end container-->

    </section><!--end section-->




@endsection
