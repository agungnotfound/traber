<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="text-decoration:none">
        <img src="{{asset('img/kab_tng.png')}}" alt="Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light"> <b>SI - TRABER</b> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.profile.edit')}}" class="nav-link"><i class="nav-icon fa fa-user-circle"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.wajib-pajak.index')}}" class="nav-link"><i class="nav-icon fas fa-copy"></i>
                        <p>Management Berkas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link"><i class="nav-icon fa fa-users"></i>
                        <p>Management User</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="nav-icon fa fa-power-off" aria-hidden="true"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>