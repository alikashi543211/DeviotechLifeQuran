<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="{{route('index')}}">
                <img src="{{ asset($setting['logo'] ?? '')  }}" class="l-dark logo-width"  alt="">
                <img src="{{ asset($setting['logo'] ?? '')  }}" class="l-light logo-width"  alt="">
            </a>
        </div>
        <ul class="buy-button list-inline mb-0">

        </ul><!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{route('index')}}" class="sub-menu-item">Home</a></li>
                <li><a href="{{route('about')}}" class="sub-menu-item">About</a></li>
                <li><a href="{{route('tutors')}}" class="sub-menu-item">Tutors</a></li>
                <li><a href="{{route('contact')}}" class="sub-menu-item">Contact</a></li>
                @if(Auth::check())
                    <li>
                        <a href="{{route('return.login')}}" id="dashboard" class="sub-menu-item text-primary"> Dashboard</a>
                    </li>
                @else
                    <li>
                        <button  id="login_button" data-bs-toggle="modal" data-bs-target="#login-popup" class="btn login-popup-show btn-primary mt-md-3 m-1"> Login </button>
                    </li>
                @endif
            </ul><!--end navigation menu-->

            <!--end login button-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
