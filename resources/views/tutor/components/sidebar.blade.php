<div class="widget">

    <div class="row mt-4">
        <div class="col-6 text-center">
            <i data-feather="user-plus" class="fea icon-ex-md text-primary mb-1"></i>
            <h5 class="mb-0">{{\App\Models\Inquiry::where('tutor_id',auth()->user()->id)->count()}}</h5>
            <p class="text-muted mb-0">Inquiries</p>
        </div><!--end col-->

        <div class="col-6 text-center">
            <i data-feather="users" class="fea icon-ex-md text-primary mb-1"></i>
            <h5 class="mb-0">454</h5>
            <p class="text-muted mb-0">Sessions</p>
        </div><!--end col-->
    </div><!--end row-->
</div>



<div class="widget mt-4">
    <ul class="list-unstyled sidebar-nav mb-0" id="navmenu-nav">
        <li class="navbar-item account-menu px-0 ">
            <a href="{{route('tutor.dashboard')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Dashboard</h6>
            </a>
        </li>
        <li class="navbar-item account-menu px-0 mt-2">
            <a href="{{route('tutor.profile')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Profile</h6>
            </a>
        </li>





        <li class="navbar-item account-menu px-0 mt-2">
            <a href="account-messages.html" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Messages</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2">
            <a href="account-payments.html" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Payments</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2">
            <a href="account-setting.html" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-setting"></i></span>
                <h6 class="mb-0 ms-2">Settings</h6>
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



