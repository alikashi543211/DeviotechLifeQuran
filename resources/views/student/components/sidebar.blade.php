
<div class="widget">
    <div class="col-lg-2 col-md-3 text-md-start text-center" style="position: absolute;top: -17%">
        <img src="{{asset(auth()->user()->avatar)}}" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
    </div><!--end col-->
</div>








<div class="widget " style="margin-top: 60px;">
    <ul class="list-unstyled  sidebar-nav mb-0" id="navmenu-nav">
        <li class="navbar-item account-menu px-0 ">
            <a href="{{route('student.dashboard')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Dashboard</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2">
            <a href="{{route('student.chat')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">chat</h6>
            </a>
        </li>


        <li class="navbar-item account-menu px-0 mt-2">
            <a href="{{route('student.inquiries')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Inquiries</h6>
            </a>
        </li>
        <li class="navbar-item account-menu px-0 mt-2">
            <a href="{{route('student.payments')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Payments</h6>
            </a>
        </li>
        <li class="navbar-item account-menu px-0 mt-2">
            <a href="{{route('student.profile')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Profile Setting</h6>
            </a>
        </li>





        <li class="navbar-item account-menu px-0 mt-2">
            <a href="javascript:;" onclick="document.getElementById('logout-form').submit()" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Logout</h6>
            </a>
            <form id="logout-form" class="d-none" method="post" action="{{ route('logout') }}">@csrf</form>
        </li>
    </ul>
</div>


