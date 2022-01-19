<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto mt-0"><a class="navbar-brand mt-0" style="padding-top: 10px;" href="">
                    <div class="brand-logo" style="background-image: url('{{ asset($setting['favicon'] ?? '')  }}');"></div>
                    <h2 class="brand-text mb-0"><img src="{{ asset($setting['logo'] ?? '')  }}" style="width: 120px;" alt=""></h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @routeis('admin.dashboard') active @endrouteis"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i>Dashboard</a></li>
             <li class="nav-item @routeis('admin.show.chat') active @endrouteis"><a href="{{ route('admin.show.chat') }}"><i class="feather icon-home"></i>chats</a></li>
            <li class="nav-item @routeis('admin.student.inquiries*') active @endrouteis "><a href="{{route('admin.student.inquiries')}}"><i class="feather icon-users"></i>Inquiries</a></li>
            <li class="nav-item @routeis('admin.inquiries.schedules*') active @endrouteis "><a href="{{route('admin.inquiries.schedules')}}"><i class="feather icon-users"></i>Schedule Requests</a></li>
            <li class="nav-item @routeis('admin.sessions.today*') active @endrouteis "><a href="{{route('admin.sessions.today')}}"><i class="feather icon-users"></i>Today Sessions</a></li>

            <li class=" navigation-header"><span>Payments</span></li>
            <li class="nav-item @routeis('admin.pending.payments*') active @endrouteis "><a href="{{route('admin.pending.payments')}}"><i class="feather icon-users"></i>Pending Payments</a></li>
            <li class=" navigation-header"><span>Others</span></li>
            <li class="nav-item @routeis('admin.testimonials*') active @endrouteis "><a href="{{route('admin.testimonials')}}"><i class="feather icon-users"></i>Testimonials</a></li>

            <li class="nav-item @routeis('admin.tutors*') active @endrouteis "><a href="{{route('admin.tutors')}}"><i class="feather icon-users"></i>Tutors</a></li>
{{--            <li class="nav-item @routeis('admin.students*') active @endrouteis "><a href="{{route('admin.students')}}"><i class="feather icon-users"></i>Students</a></li>--}}
            <li class="nav-item @routeis('admin.setting.index') active @endrouteis"><a href="{{ route('admin.setting.index') }}"><i class="feather icon-settings"></i>Settings</a></li>
            <li class="nav-item @routeis('admin.setting.meta.tags') active @endrouteis"><a href="{{ route('admin.setting.meta.tags') }}"><i class="feather icon-list"></i>Meta Tags</a></li>


            @can('browse_roles')
                <li class="nav-item @routeis('admin.roles.index') active @endrouteis"><a href="{{ route('admin.roles.index') }}"><i class="feather icon-zap"></i>Roles</a></li>
            @endcan

            @can('browse_teams')
                <li class="nav-item @routeis('admin.teams.index') active @endrouteis"><a href="{{ route('admin.teams.index') }}"><i class="feather icon-users"></i>Teams</a></li>
            @endcan




        </ul>
    </div>
</div>
