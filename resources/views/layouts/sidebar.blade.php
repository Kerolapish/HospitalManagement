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
                    <li class="nav-item {{ (request()->is('registerBook')) ? 'menu-open' : '' }} {{ (request()->is('totalBook')) ? 'menu-open' : '' }} {{ (request()->is('upload')) ? 'menu-open' : '' }} {{ (request()->is('updateBookView/*')) ? 'menu-open' : '' }}">
                        <a class="nav-link {{ (request()->is('registerBook')) ? 'active' : '' }} {{ (request()->is('totalBook')) ? 'active' : '' }} {{ (request()->is('upload')) ? 'active' : '' }} {{ (request()->is('updateBookView/*')) ? 'active' : '' }}" >
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Book
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/registerBook" class="nav-link {{ (request()->is('registerBook')) ? 'active' : '' }} {{ (request()->is('upload')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register Book</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/totalBook" class="nav-link {{ (request()->is('totalBook')) ? 'active' : '' }} {{ (request()->is('updateBookView/*')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Book List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ (request()->is('registerAuthor')) ? 'menu-open' : '' }} {{ (request()->is('authorList')) ? 'menu-open' : '' }} {{ (request()->is('registerAuthorNew')) ? 'menu-open' : '' }} {{ (request()->is('AuthorUpdateDetails/*')) ? 'menu-open' : '' }}">
                        <a class="nav-link {{ (request()->is('registerAuthor')) ? 'active' : '' }} {{ (request()->is('authorList')) ? 'active' : '' }} {{ (request()->is('registerAuthorNew')) ? 'active' : '' }} {{ (request()->is('AuthorUpdateDetails/*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Author<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/registerAuthor" class="nav-link {{ (request()->is('registerAuthor')) ? 'active' : '' }} {{ (request()->is('registerAuthorNew')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register Author</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/authorList" class="nav-link {{ (request()->is('authorList')) ? 'active' : '' }} {{ (request()->is('AuthorUpdateDetails/*')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Author List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/totalMember" class="nav-link {{ (request()->is('totalMember')) ? 'active' : '' }} {{ (request()->is('updateMember/*')) ? 'active' : '' }} {{ (request()->is('searchByUUID')) ? 'active' : '' }}">
                            <i class="far fa-id-card nav-icon"></i>
                            <p>Membership List</p>
                        </a>
                    </li>   
                    <li class="nav-item {{ (request()->is('issues')) ? 'menu-open' : '' }} {{ (request()->is('Issue')) ? 'menu-open' : '' }} {{ (request()->is('LostBook')) ? 'menu-open' : '' }} {{ (request()->is('issueHistory')) ? 'menu-open' : '' }} {{ (request()->is('registerNewIssue')) ? 'menu-open' : '' }} {{ (request()->is('issueReturned/*')) ? 'menu-open' : '' }} {{ (request()->is('Lost/*')) ? 'menu-open' : '' }} {{ (request()->is('recoverBook/*')) ? 'menu-open' : '' }}">
                        <a class="nav-link {{ (request()->is('issues')) ? 'active' : '' }} {{ (request()->is('Issue')) ? 'active' : '' }} {{ (request()->is('LostBook')) ? 'active' : '' }} {{ (request()->is('issueHistory')) ? 'active' : '' }} {{ (request()->is('registerNewIssue')) ? 'active' : '' }} {{ (request()->is('issueReturned/*')) ? 'active' : '' }} {{ (request()->is('Lost/*')) ? 'active' : '' }} {{ (request()->is('recoverBook/*')) ? 'active' : '' }}" >
                            <i class="nav-icon fas fa-receipt"></i>
                            <p>Book Issues<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/issues" class="nav-link {{ (request()->is('issues')) ? 'active' : '' }} {{ (request()->is('registerNewIssue')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register Issues</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Issue" class="nav-link {{ (request()->is('Issue')) ? 'active' : '' }} {{ (request()->is('issueReturned/*')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Issued List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/LostBook" class="nav-link {{ (request()->is('LostBook')) ? 'active' : '' }} {{ (request()->is('Lost/*')) ? 'active' : '' }} {{ (request()->is('recoverBook/*')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lost Book</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/issueHistory" class="nav-link {{ (request()->is('issueHistory')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Issue History</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/userManagement" class="nav-link {{ (request()->is('userManagement')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Management</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/documentation" class="nav-link">
                            <i class="far fas fa-file-invoice nav-icon"></i>
                            <p>API Documentation</p>
                        </a>
                    </li> 
            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
