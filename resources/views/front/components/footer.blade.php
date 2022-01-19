<!-- Footer Start -->
<footer class="footer mobile-device">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-6 mb-2" >
                <div style="width: 90%;">
                    <a href="#" class="logo-footer" >
                        <img src="{{ asset($setting['logo_footer'] ?? '')  }}" class="footer-logo"  alt="">
                    </a>
                    <p class="mt-4">{{ $setting['footer_description'] ?? ''  }}</p>
                </div>

            </div><!--end col-->

            <div class="col-md-4 col-sm-6 col-6 mb-2">
                <h5 class="text-light footer-head">Company Information</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="{{route('index')}}" class="text-foot"><i class="uil uil-angle-right-b me-1"></i>Home</a></li>
                    <li><a href="{{route('about')}}" class="text-foot"><i class="uil uil-angle-right-b me-1"></i>About</a></li>
                    <li><a href="{{route('contact')}}" class="text-foot"><i class="uil uil-angle-right-b me-1"></i>Contact</a></li>
                </ul>
            </div><!--end col-->
            <div class="col-md-4 col-sm-6 col-6 mb-2">
                <h5 class="text-light footer-head">Contact</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="mailto:{{ $setting['email'] ?? ''  }}" class="text-foot">{{ $setting['email'] ?? ''  }}</a></li>
                    <li><a href="tel:{{ $setting['phone'] ?? ''  }}" class="text-foot">{{ $setting['phone'] ?? ''  }}</a></li>
                    <li>
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" data-type="iframe" class="video-play-icon text-foot lightbox">{{ $setting['address'] ?? ''  }}</a>
                    </li>
                </ul>
                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-2" >
                    <li class="list-inline-item social-icon-height mb-0"><a href="{{ $setting['facebook'] ?? ''  }}" target="_blank" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item social-icon-height mb-0"><a href="{{ $setting['instagram'] ?? ''  }}" target="_blank"  class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item social-icon-height mb-0"><a href="{{ $setting['twitter'] ?? ''  }}"  target="_blank" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item social-icon-height mb-0"><a href="{{ $setting['linkedin'] ?? ''  }}"  target="_blank" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                </ul>
            </div><!--end col-->


        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<footer class="footer footer-bar mobile-device">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-12 col-12">
                <div class="text-sm-start">
                    <p class="mb-0 text-center">© <script>document.write(new Date().getFullYear())</script> Life Quran <i class="mdi mdi-heart text-danger"></i> by <a href="http://deviotech.com/" target="_blank" class="text-reset">DevioTech</a>.</p>
                </div>
            </div><!--end col-->


        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->
<footer class="footer footer-bar mobile-footer-design fixed-bottom" style="position: fixed">
    <ul class="list-group list-group-horizontal" >
        <li class="list-group-item ul-footer-design" ><a title="Home"        href="{{route('index')}}" class="btn btn-icon btn-outline-primary" ><i data-feather="home" class="fea icon-sm icons"></i> </a></li>
        <li class="list-group-item ul-footer-design" ><a  title="About us"   href="{{route('about')}}" class="btn btn-icon btn-outline-primary" ><i data-feather="info" class="fea icon-sm icons"></i> </a></li>
        <li class="list-group-item ul-footer-design" ><a  title="Tutors"     href="{{route('tutors')}}" class="btn btn-icon btn-outline-primary" ><i data-feather="user-plus" class="fea icon-sm icons"></i> </a></li>
        <li class="list-group-item ul-footer-design" ><a  title="Contact us" href="{{route('contact')}}" class="btn btn-icon btn-outline-primary" ><i data-feather="mail" class="fea icon-sm icons"></i> </a></li>
    </ul>

</footer>

