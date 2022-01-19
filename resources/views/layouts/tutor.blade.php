
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Life Quran</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="email" content="" />
    <meta name="website" content="" />
    <meta name="Version" content="v3.0.0" />
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($setting['favicon'] ?? '')  }}">

    <!-- Bootstrap -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{asset('front/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/toastr.css') }}">

    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{asset('front/css/colors/default.css')}}" rel="stylesheet" id="color-opt">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    {{--    <link href="{{asset('admin/summarnote/summernote.min.css')}}" rel="stylesheet">--}}
=======
  

>>>>>>> 027d9749baa5d989bbd9d5fc3b2b033623f7f5bf
    @yield('css')
</head>

<body>
<!-- Loader -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div> -->
<!-- Loader -->

@include('front.components.header')

<!-- Hero Start -->
<section class="bg-profile d-table w-100 bg-primary" style="background: url('{{asset('front/images/account/bg.png')}}') center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 text-md-start text-center">
                                <img src="{{asset(auth()->user()->avatar)}}" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                            </div><!--end col-->

                            <div class="col-lg-10 col-md-9">
                                <div class="row align-items-end">
                                    <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0 text-capitalize">{{auth()->user()->name}}</h3>
                                        <small class="text-muted h6 me-2">Tutor</small>
                                        <ul class="list-inline mb-0 mt-1 mb-1">
                                            <li class="list-inline-item me-2"><a href="javascript:void(0)" class="text-muted" title="email"><i data-feather="mail" class="fea icon-sm me-2"></i>{{auth()->user()->email}}</a></li>
                                        </ul>
                                    </div><!--end col-->
{{--                                    <div class="col-md-5 text-md-end text-center">--}}
{{--                                        <a href="{{route('student.add.inquiry')}}" class="btn btn-outline-primary">New Inquiry</a>--}}
{{--                                    </div><!--end col-->--}}
                                </div><!--end row-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--ed container-->
</section><!--end section-->
<!-- Hero End -->


<!-- Profile Start -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 d-lg-block d-none">
                <div class="sidebar sticky-bar p-4 rounded shadow">
                    @include('tutor.components.sidebar')
                </div>
            </div><!--end col-->

            <div class="col-lg-8 col-12">
                @if(session('success'))
                    <div class="alert alert-success mb-5 alert-dismissible fade show" role="alert">
                        <strong>Well done!</strong> {{session('success')}}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                        <strong>Whops! </strong> {{session('error')}}..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @yield('content')
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Profile End -->







@include('front.components.footer')



<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script><!-- javascript -->
<script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
<!-- Icons -->
<script src="{{asset('front/js/feather.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<!-- Main Js -->
<script src="{{ asset('admin/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{asset('front/js/plugins.init.js')}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="{{asset('front/js/app.js')}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
        $(function () {
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

    });
</script>
<script>
    @if(session('success'))
    toastr.success("{{ session('success') }}");
    @elseif(session('error'))
    toastr.error("{{ session('error') }}");
    @endif
    // $('.dropify').dropify();
</script>


@yield('js')
</body>
</html>







