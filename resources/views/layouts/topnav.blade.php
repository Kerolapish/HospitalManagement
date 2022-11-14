<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="\dashboard" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form action="{{ route('logout')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <button class="btn btn-block btn-outline-info btn-xs">
                &nbsp; Log Out
            </form>
        </li>
    </ul>
</nav>
