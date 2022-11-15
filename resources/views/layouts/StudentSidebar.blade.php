<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="\dashboard" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Library Management </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('profile', $data->first()) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <div class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                    
                    <li class="nav-item">
                            <li class="nav-item">
                                <a href="/student/StudentMember" class="nav-link {{ (request()->is('student/StudentMember')) ? 'active' : '' }} {{ (request()->is('student/StudentUpdateView/*')) ? 'active' : '' }} {{ (request()->is('student/StudentrevokeMember/*')) ? 'active' : '' }} {{ (request()->is('student/StudentDelete/*')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Membership List</p>
                                </a>
                            </li>
                    </li>
                    <li class="nav-item">
                            <li class="nav-item">
                                <a href="/student/StudentRegIssue" class="nav-link {{ (request()->is('student/StudentRegIssue')) ? 'active' : '' }} {{ (request()->is('student/UploadNewIssue')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register Issues</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/student/StudentIssueList" class="nav-link {{ (request()->is('student/StudentIssueList')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Issued List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/student/StudentLost" class="nav-link {{ (request()->is('student/StudentLost')) ? 'active' : '' }} {{ (request()->is('student/StudentDeclareLost/*')) ? 'active' : '' }} {{ (request()->is('student/StudentRecoverBook/*')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lost Book</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/student/StudentIssuedHistory" class="nav-link {{ (request()->is('student/StudentIssuedHistory')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Issues History</p>
                                </a>
                            </li>
                        </ul>
                    </li>
            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
