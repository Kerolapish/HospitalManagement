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
                <a href="{{ url('/Book/BookProfile', $data->first()) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <div class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                    <li class="nav-item {{ (request()->is('Book/BookRegister')) ? 'menu-open' : '' }} {{ (request()->is('Book/BookTotal')) ? 'menu-open' : '' }}">
                        <a class="nav-link {{ (request()->is('Book/BookRegister')) ? 'active' : '' }} {{ (request()->is('Book/BookTotal')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Book
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/Book/BookRegister" class="nav-link {{ (request()->is('Book/BookRegister')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register Book</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Book/BookTotal" class="nav-link {{ (request()->is('Book/BookTotal')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Book List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ (request()->is('Book/AuthorList')) ? 'menu-open' : '' }} {{ (request()->is('Book/registerAuthor')) ? 'menu-open' : '' }}">
                        <a class="nav-link {{ (request()->is('Book/AuthorList')) ? 'active' : '' }} {{ (request()->is('Book/registerAuthor')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Author
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/Book/registerAuthor" class="nav-link {{ (request()->is('Book/registerAuthor')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Register Author</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Book/AuthorList" class="nav-link {{ (request()->is('Book/AuthorList')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Author List</p>
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
