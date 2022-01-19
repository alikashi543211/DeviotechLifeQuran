@extends('layouts.front')
@section('title', $setting['tutor_detail_title'])
@section('meta')
    <meta name="description" content="{{$setting['tutor_detail_meta_description']??''}}" />
    <meta name="keywords" content="{{$setting['tutor_detail_meta_tag']??''}}" />
@endsection
@section('content')



    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Tutors Detail </h1>
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




    <!-- Start Work Detail -->
    <section class="section padding-bottom-mob">
        <div class="container">
            <div class="row justify-content-center">

                    <div class="offset-md-2 row align-items-center ">
                        <div class="col-lg-2 col-md-2 text-md-start text-center">
                            <img src="{{asset($tutor->avatar)}}" style="height: 160px;" class="avatar  rounded-circle w-100  d-block mx-auto" alt="">
                        </div><!--end col-->

                        <div class="col-lg-5 col-md-5">
                            <div class="row align-items-end">
                                <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                    <h4 class="title text-capitalize mt-3 mb-2">{{$tutor->name}}</h4>
                                    <small class="text-muted h6 me-2 text-capitalize">{{$tutor->profile->course}}</small>
                                    <ul class="list-unstyled text-warning mt-2 mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div><!--end col-->

                            </div><!--end row-->
                        </div><!--end col-->

                            <div class="col-lg-3 col-md-3 text-center col-sm-12 col-12 ">
                                <a href="#hire_me" class="btn btn-primary" >Hire me</a>
                            </div><!--end col-->

                    </div>




                <div class="col-md-10 mt-4 pt-2">

                    @if($tutor->profile->video_id!==null)
                        <div class="col-lg-12 mt-4 mb-4 col-md-12 col-sm-12 col-12 ">
                            <div class="position-relative">
                                <img src="{{asset($tutor->profile->video_image)}}" style="width: 80%;height: 400px;" class="rounded img-fluid mx-auto d-block" alt="">
                                <div class="play-icon">
                                    <a href="#!" data-type="youtube" data-id="{{$tutor->profile->video_id}}" class="play-btn lightbox">
                                        <i class="mdi mdi-play text-primary rounded-circle bg-white shadow"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!--end col-->

                    @endif


                    <div class="bg-light rounded p-4">
                        <h3 class=""><span class="" style="border-bottom: 1.5px solid;">Description</span></h3>
                        <p class=" fst-italic mb-0">
                           {!! $tutor->profile->detail !!}
                        </p>
                    </div>




                    <!-- Comment Areas start -->
{{--                    <div class="card shadow rounded border-0 mt-4">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title mb-0">Reviews</h5>--}}

{{--                            <ul class="media-list list-unstyled mb-0">--}}
{{--                                <li class="mt-4">--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <a class="pe-3" href="#">--}}
{{--                                                <img src="{{asset('front/images/client/01.jpg')}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">--}}
{{--                                            </a>--}}
{{--                                            <div class="flex-1 commentor-detail">--}}
{{--                                                <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>--}}
{{--                                                <small class="text-muted">15th August, 2019 at 01:25 pm</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="mt-3">--}}
{{--                                        <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="mt-4">--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <a class="pe-3" href="#">--}}
{{--                                                <img src="{{asset('front/images/client/02.jpg')}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">--}}
{{--                                            </a>--}}
{{--                                            <div class="flex-1 commentor-detail">--}}
{{--                                                <h6 class="mb-0"><a href="javascript:void(0)" class="media-heading text-dark">Tammy Camacho</a></h6>--}}
{{--                                                <small class="text-muted">15th August, 2019 at 05:44 pm</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="mt-3">--}}
{{--                                        <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>--}}
{{--                                    </div>--}}
{{--                                </li>--}}


{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="card shadow rounded border-0 mt-4" id="hire_me">
                        <div class="card-body">
                            <h5 class="card-title mb-0">Let us know your requirements.</h5>

                            <form class="mt-3"  class="" method="post" action="{{route('inquiry.store')}}">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="tutor_id" value="{{$tutor->id}}">
                                    <input type="hidden" name="time_zone" id="time_zone">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control ps-5 @error('name') is-invalid @enderror" placeholder="Name" name="name" required="">
                                            </div>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control ps-5 @error('email_form') is-invalid @enderror" placeholder="Email" name="email_form" required="">
                                            </div>
                                            @error('email_form')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="phone" class="fea icon-sm icons"></i>
                                                <input type="tel" name="phone" class="form-control ps-5 @error('phone') is-invalid @enderror" placeholder="Phone no." required="">
                                            </div>
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Inquiry <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <select class="select2 form-select ps-5 form-control  @error('study_type') is-invalid @enderror" multiple="multiple" name="study_type[]" required="required" aria-label="Default select example">
                                                    <option selected value="nazra">Nazra</option>
                                                    <option value="hifz">Hifz</option>
                                                    <option value="tajweed">Tajweed</option>
                                                </select>                                            </div>
                                            @error('study_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-12">
                                        <div class="send d-grid">
                                            <button type="submit" class="btn btn-primary">Submit Inquiry</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Work Detail -->



@endsection
@section('js')

    <script>
        $(document).ready(function () {

            var d = new Date();
            var n = d.getTimezoneOffset();

            $('#time_zone').val(n);
        });
    </script>

@endsection
