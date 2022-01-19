<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Life Quran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <meta name="author" content="" />
    <meta name="email" content="" />
    <meta name="website" content="" />
    <meta name="Version" content="v3.0.0" />
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($setting['favicon'] ?? '')  }}">
    <!-- Bootstrap -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- tobii css -->
    <link href="{{asset('front/css/tobii.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{asset('front/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Slider -->
    <link rel="stylesheet" href="{{asset('front/css/tiny-slider.css')}}"/>
    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{asset('front/css/colors/default.css')}}" rel="stylesheet" id="color-opt">
    @yield('css')
    <style>
        /*a:target{*/
        /*    outline: none!important;*/
        /*    border: none!important;*/
        /*    border: 0px!important;*/
        /*}*/
    </style>
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

    @yield('content')



<!-- Login Form Start -->
<div class="modal fade" id="login-popup" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalCenterTitle"  aria-modal="true" role="dialog">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content rounded shadow border-0">
            <div class="modal-body p-0">
                <div class="container-fluid px-0">
                    <div class="row align-items-center g-0">
                        <div class="col-lg-6 col-md-5">
                            <img src="{{asset('images/login.jpg')}}" class="img-fluid" alt="">
                        </div><!--end col-->

                        <div class="col-lg-6 col-md-7">
                            <form class="login-form p-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input type="email" class="form-control ps-5 @error('email') is-invalid @enderror" placeholder="Email" name="email" required="">
                                            </div>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" name="password" class="form-control ps-5 @error('password') is-invalid @enderror" placeholder="Password" required="">
                                            </div>
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember_me"  id="flexCheckDefault4">
                                                    <label class="form-check-label" for="flexCheckDefault4">Remember me</label>
                                                </div>
                                            </div>
                                            <p class="forgot-pass mb-0"><a href="{{route('password.email')}}" class="text-dark fw-bold">Forgot password ?</a></p>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Sign in</button>
                                        </div>
                                    </div><!--end col-->


                                </div><!--end row-->
                            </form>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

@if ($errors->first('email'))
    <input type="hidden" id="login_error" value="1">
@endif


@include('front.components.footer')
<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary  mobile-device back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->
<!-- javascript -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
<!-- SLIDER -->
<script src="{{asset('front/js/tiny-slider.js')}} "></script>
<!-- tobii js -->
<script src="{{asset('front/js/tobii.min.js')}} "></script>
<!-- Icons -->
<script src="{{asset('front/js/feather.min.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>

<script src="{{asset('front/js/plugins.init.js')}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="{{asset('front/js/app.js')}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

@yield('js')
<script>
    $(document).ready(function() {
        let login_error=$('#login_error').val();
        if(login_error=='1')
        {
            $('#login_button').click();
        }
    });
</script>
</body>
</html>
