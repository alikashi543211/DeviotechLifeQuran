@extends('layouts.front')
@section('title', $setting['home_title'] )
@section('meta')
    <meta name="description" content="{{$setting['home_meta_description'] }}" />
    <meta name="keywords" content="{{$setting['home_meta_tag'] }}" />
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <style>
        @media (max-width: 767px) {
            .main-bg-scroller
            {
                background: none !important;
                background: linear-gradient(to top, #99ff33 24%, #99ff99 87%) !important;
            }

        }
        .main-bg-scroller
        {
            background: url('{{asset($setting['home_banner'] ?? "")}}') center center;
        }

    </style>
@endsection
@section('content')



    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100  it-home main-bg-scroller">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6 col-12 mobile-device">
                    <div class="title-heading">

                        <h1 class="fw-bold text-white title-dark mt-2 mb-3">{{$setting['banner_heading']??''}}</h1>
                        <div class="mt-4 pt-2">
                            <a href="javascript:void(0)" class="btn btn-primary m-1"><i class="uil uil-phone"></i> Get in touch</a>
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="btn btn-icon btn-pills btn-primary m-1 lightbox"><i data-feather="video" class="icons"></i></a><small class="fw-bold text-uppercase text-light title-dark align-middle ms-1">Watch Now</small>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-5 col-md-6   mt-sm-0 pt-sm-0">
                    <div class="card shadow rounded border-0 ">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Let us know your requirements</h5>

                            <form class="login-form" method="post" action="{{route('inquiry.store')}}"  id="inquiry_form">
                                @csrf
                                <input type="hidden" name="time_zone" id="time_zone">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control ps-5 @error('name') is-invalid @enderror" placeholder="Name" name="name" required="">
                                            </div>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control ps-5 @error('email_form') is-invalid @enderror" placeholder="Email" name="email_form" required="">
                                            </div>
                                            @error('email_form')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <i data-feather="phone" class="fea icon-sm icons"></i>
                                                <input type="tel" name="phone" class="form-control ps-5 @error('phone') is-invalid @enderror" placeholder="Phone no." required="">
                                            </div>
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <div class="form-icon position-relative">--}}
{{--                                                <select class="form-select form-control @error('time_start') is-invalid @enderror" name="time_start" required="required" aria-label="Default select example">--}}
{{--                                                    <option disabled selected value="">Time Start</option>--}}
{{--                                                    @for($i = 1; $i < 23; $i++)--}}
{{--                                                        <option value="{{ $i }}:00">{{ $i }}:00</option>--}}
{{--                                                        <option value="{{ $i }}:30">{{ $i }}:30</option>--}}
{{--                                                    @endfor--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            @error('time_start')--}}
{{--                                            <span class="text-danger">{{ $message }}</span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <div class="form-icon position-relative">--}}
{{--                                                <select class="form-select form-control @error('time_end') is-invalid @enderror" name="time_end" required="required" aria-label="Default select example">--}}
{{--                                                    <option disabled selected value="">Time End</option>--}}
{{--                                                    @for($i = 1; $i < 23; $i++)--}}
{{--                                                        <option value="{{ $i }}:00">{{ $i }}:00</option>--}}
{{--                                                        <option value="{{ $i }}:30">{{ $i }}:30</option>--}}
{{--                                                    @endfor--}}
{{--                                                </select>--}}
{{--                                                @error('time_end')--}}
{{--                                                <span class="text-danger">{{ $message }}</span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label>Inquiry<span class="text-danger">*</span> </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="book" class="fea icon-sm icons"></i>
                                                <select class="select2 form-select ps-5 form-control  @error('study_type') is-invalid @enderror" multiple="multiple" name="study_type[]" required="required" aria-label="Default select example">
                                                    <option selected value="nazra">Nazra</option>
                                                    <option value="hifz">Hifz</option>
                                                    <option value="tajweed">Tajweed</option>
                                                </select>
                                            </div>
                                            @error('study_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <div class="form-icon position-relative">--}}
{{--                                                <select class="form-select form-control @error('no_of_students') is-invalid @enderror" name="no_of_students" required="required" aria-label="Default select example">--}}
{{--                                                    <option disabled selected value="">No of Students</option>--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="2">2</option>--}}
{{--                                                    <option value="3">3</option>--}}
{{--                                                    <option value="4">4</option>--}}
{{--                                                    <option value="5">5</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            @error('no_of_students')--}}
{{--                                            <span class="text-danger">{{ $message }}</span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button type="submit"  class="btn btn-primary">Submit Inquiry</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->

    <!-- End Hero -->

    <section class="section  pt-5 pb-5  bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center pb-2">
                        <h4 class="title mb-4">How do we works ?</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-4 mt-4 pt-2">
                    <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-presentation-edit d-block rounded h3 mb-0"></i>
                        </div>

                        <div class="card-body">
                            <h5 class="text-dark">Discussion</h5>
                            <p class="text-muted mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated</p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-md-5 pt-md-3 mt-4 pt-2">
                    <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-airplay d-block rounded h3 mb-0"></i>
                        </div>

                        <div class="card-body">
                            <h5 class="text-dark">Strategy & Testing</h5>
                            <p class="text-muted mb-0">Generators convallis odio, vel pharetra quam malesuada vel. Nam porttitor malesuada.</p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-md-5 pt-md-5 mt-4 pt-2">
                    <div class="card features feature-clean work-process bg-transparent d-none-arrow border-0 text-center">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-image-check d-block rounded h3 mb-0"></i>
                        </div>

                        <div class="card-body">
                            <h5 class="text-dark">Reporting</h5>
                            <p class="text-muted mb-0">Internet Proin tempus odio, vel pharetra quam malesuada vel. Nam porttitor malesuada.</p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->


    </section><!--end section-->


    <!-- Start -->
    <section class="section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mobile-device">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                            <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                <div class="card-body p-0">
                                    <img src="{{asset($setting['img_nazra']??'')}}" style="height: 320px;" class="img-fluid  w-100 " alt="work-image">
                                    <div class="overlay-work bg-dark"></div>
                                    <div class="content">
                                        <a href="{{route('tutors')}}?course=nazra" class="title text-white d-block fw-bold">Nazra</a>

                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-6 col-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                        <div class="card-body p-0">
                                            <img src="{{asset($setting['img_hifz'] ?? '')}}"  style="height: 280px;"   class="img-fluid  w-100 " alt="work-image">
                                            <div class="overlay-work bg-dark"></div>
                                            <div class="content">
                                                <a href="{{route('tutors')}}?course=hifz" class="title text-white d-block fw-bold">Hifz</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                    <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                        <div class="card-body p-0">
                                            <img src="{{asset($setting['img_tajweed'] ?? '')}}"  style="height: 280px;"  class="img-fluid w-100 " alt="work-image">
                                            <div class="overlay-work bg-dark"></div>
                                            <div class="content">
                                                <a href="{{route('tutors')}}?course=tajweed" class="title text-white d-block fw-bold">Tajweed</a>

                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->

                <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
                    <div class="ms-lg-4">
                        <div class="section-title">

                            <h4 class="title text-mob-center mb-4 mt-3">About us</h4>
                            <p class="text-muted para-desc" style="text-align: justify">{{$setting['who_we_are']??''}}</p>
                        </div>

                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->


    </section><!--end section-->
    <!-- End -->

    <section class="section  ">
        <div class="container-fluid ">
            <div class="rounded-md shadow-md py-5 position-relative" style="background: url('{{asset($setting['slider_background']??'front/images/3.jpg')}}') center center;">
                <div class="bg-overlay rounded-md"></div>
                <div class="container pt-0 pb-0 py-5">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-9 ">
                                    <div class="row">
                                        <div class="col-lg-12 pt-2 mt-2 text-center">
                                            <div class="tutor-slider" >
                                                @foreach($tutors as $tutor)
                                                    <div class="justify-content-center">
                                                        <img src="{{asset($tutor->avatar)}}" class="img-fluid avatar text-center  img-teacher-height  rounded-circle  shadow"  alt="">
                                                        <a href="{{route('tutorDetail',$tutor->slug)}}"  class="text-primary h6 mt-3 mb-0 text-capitalize">
                                                            {{$tutor->name}}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{--<div class="tiny-four-item">
                                                @foreach($tutors as $tutor)
                                                    <div class="tiny-slide">
                                                        <img src="{{asset($tutor->avatar)}}" class="img-fluid avatar  img-teacher-height  rounded-circle  shadow" alt="">
                                                        <a href="{{route('tutorDetail',$tutor->slug)}}" >
                                                            <h6 class="text-primary mt-2 mb-0 text-capitalize"> {{$tutor->name}}  </h6>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div><!--end owl carousel-->--}}
                                        </div><!--end col-->
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-6  pt-3 section-title text-center">
                                    <h2 class="fw-bold text-white title-dark mb-4 pb-2">We have world's <br> best tutors.</h2>
                                    <a href="{{route('tutors')}}" class="btn btn-primary">Browse more</a>
                                </div>
                            </div>

                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end slide-->
        </div>
    </section>


    <!-- Start -->
    <section class="section pt-0 padding-bottom-mob ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="video-solution-cta position-relative" style="z-index: 1;" >

                        <div class="content mt-md-5 mt-4">
                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <div class="section-title mb-4 pb-2">
                                        <h4 class="title mb-4">What Students Say ?</h4>
                                    </div>
                                </div><!--end col-->
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12  mt-4">
                                    <div class="testimonial-slider" >
                                        @foreach($testimonials as $testimonial)
                                            <div class="">
                                            <div class="d-flex client-testi m-2">
                                                <img src="{{asset($testimonial->image)}}" class="avatar avatar-small client-image rounded shadow" alt="">
                                                <div class="flex-1 content p-3 shadow rounded bg-white tiny-card-height position-relative">
                                                    <ul class="list-unstyled mb-0">
                                                            @for($i = 1; $i <= $testimonial->rating; $i++)
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            @endfor
                                                    </ul>
                                                    <p class="text-muted mt-2">
                                                        " {{$testimonial->review}} "</p>
                                                    <h6 class="text-primary text-capitalize">- {{$testimonial->name}} </h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div><!--end col-->
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row -->
            <div class="feature-posts-placeholder bg-light"></div>
        </div><!--end container-->
    </section><!--end section-->





@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
                var d = new Date();
                var n = d.getTimezoneOffset();
                $('#time_zone').val(n);


            $('#inquiry_form_submit').submit(function (e) {
                e.preventDefault();
                let url='{{route('inquiry.store')}}';


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
                        $('#inquiry_form').trigger("reset");
                        $('#inquiry_success').modal('show');
                    },
                    error: function(error){
                        console.log(error)
                        alert("Data Not Saved");
                    }
                });
            });
        })

    </script>
    <script>
        $(document).ready(function () {
            $('.tutor-slider').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                speed: 1000,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
            $('.testimonial-slider').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                speed: 1000,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        });
    </script>


@endsection
