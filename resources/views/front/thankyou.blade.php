@extends('layouts.front')
@section('title', 'Thank you')
@section('meta')
    <meta name="description" content="" />
    <meta name="keywords" content="" />
@endsection
@section('content')

    <!-- Hero Start -->
<section class="bg-home  bg-light d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center">
                    <div class="icon d-flex align-items-center justify-content-center bg-soft-primary rounded-circle mx-auto" style="height: 90px; width:90px;">
                        <i class="uil uil-thumbs-up align-middle h1 mb-0"></i>
                    </div>
                    <h1 class="my-4 fw-bold">Your Inquiry has been submitted.</h1>
                    <p class="text-muted para-desc mx-auto">Please Wait, admin will contact you soon.</p>
                    @if(Auth::check())
                        <a href="{{route('student.dashboard')}}" class="btn btn-soft-primary mt-3" style="margin-left: 10px;">Go To Dashboard</a>
                    @endif
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

@endsection
