<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LibMan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="\plugins\fontawesome-free\css\all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="\dist\css\adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.topnav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Update Member Registration</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="\dashboard">Admin Panel</a></li>
                                <li class="breadcrumb-item"><a href="\#">Update Member</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Promote Member</h3>
                        </div>
                        <form action="{{ url('promoteMember' , $promotedUser->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">Name</label>

                                                <input type="text" class="form-control" name="memberName" disabled
                                                    placeholder="Enter member's name" value="{{$promotedUser->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Email">IC No.</label>
                                                <input type="text" class="form-control" name="memberIC" disabled
                                                    placeholder="Enter member's IC number" value="{{$promotedUser->email}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="birthDate">Role</label> 
                                                <select class="custom-select rounded-0" name="role">
                                                    <option selected disabled>Select new role</option>
                                                    <option>Admin Student</option>
                                                    <option>Admin Book</option>
                                                    <option>Superadmin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark float-right">PROMOTE</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="\plugins\jquery\jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="\plugins\bootstrap\js\bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="\dist\js\adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="\plugins\chart.js\Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="\dist\js\pages\dashboard3.js"></script>
</body>

</html>
