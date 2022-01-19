
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login - Life Quran</title>
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
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{asset('front/css/colors/default.css')}}" rel="stylesheet" id="color-opt">

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

<div class="back-to-home rounded d-none d-sm-block">
    <a href="{{route('index')}}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
</div>

<!-- Hero Start -->
<section class="bg-home d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="me-lg-5">
                    <img src="{{asset('front/images/user/login.svg')}}" class="img-fluid d-block mx-auto" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card login-page bg-white shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">Login</h4>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                        <form class="login-form p-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <input type="email" class="form-control ps-5" placeholder="Email" name="email" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                            <input type="password" name="password" class="form-control ps-5" placeholder="Password" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
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

                    </div>
                </div><!---->
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->



<!-- javascript -->
<script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
<!-- Icons -->
<script src="{{asset('front/js/feather.min.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('front/js/plugins.init.js')}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="{{asset('front/js/app.js')}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
</body>
</html>





