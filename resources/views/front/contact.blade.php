@extends('layouts.front')
@section('title', $setting['contact_title'])
@section('meta')
    <meta name="description" content="{{$setting['contact_meta_description']??''}}" />
    <meta name="keywords" content="{{$setting['contact_meta_tag']??''}}" />
@endsection
@section('content')




    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Contact us </h1>
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

    <!-- Start Contact -->
    <section class="section padding-bottom-mob">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-light border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">Phone</h5>
                            <p class="text-muted">{{$setting['banner_heading']??''}}</p>
                            <a href="tel:{{ $setting['phone'] ?? ''  }}" class="text-primary">{{ $setting['phone'] ?? ''  }}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card bg-light  border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">Email</h5>
                            <p class="text-muted">{{$setting['banner_description']??''}}</p>
                            <a href="mailto:{{ $setting['email'] ?? ''  }}" class="text-primary">{{ $setting['email'] ?? ''  }}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card bg-light  border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">Location</h5>
                            <p class="text-muted">{{ $setting['address'] ?? ''  }}</p>
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" data-type="iframe" class="video-play-icon text-primary lightbox">View on Google map</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 pt-2 pt-sm-0 order-2 order-md-1">
                    <div class="card shadow rounded border-0">
                        <div class="card-body py-5">
                            <h4 class="card-title">Get In Touch !</h4>
                            <div class="custom-form mt-3">
                                <form method="post" action="{{route('contact.inquiry')}}">
                                    @csrf
                                    <p id="error-msg" class="mb-0"></p>
                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" required id="name" type="text" class="form-control ps-5 @error('name') is-invalid @enderror" placeholder="Name :">
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="email"  required id="email" type="email" class="form-control ps-5 @error('email') is-invalid @enderror" placeholder="Email :">
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Contact No</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="phone" class="fea icon-sm icons"></i>
                                                    <input name="contact" required type="tel" id="contact" class="form-control ps-5 @error('contact') is-invalid @enderror" placeholder="Contact No :">
                                                </div>
                                                @error('contact')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Subject</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="book" class="fea icon-sm icons"></i>
                                                    <input name="subject" required id="subject" class="form-control ps-5 @error('subject') is-invalid @enderror" placeholder="subject :">
                                                </div>
                                                @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Message<span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                    <textarea name="message" required id="message" rows="4" class="form-control @error('message') is-invalid @enderror ps-5" placeholder="Message :"></textarea>
                                                </div>
                                                @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end custom-form-->
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-6 order-1 order-md-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <img src="{{asset('front/images/contact.svg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="card map border-0">
                        <div class="card-body p-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End contact -->



    @endsection
