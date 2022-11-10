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
    <script src="https://kit.fontawesome.com/48b4d892a8.js" crossorigin="anonymous"></script>
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
  @include('layouts.userSidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student Panel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="\dashboard">Student Panel</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <!-- Small boxes (Stat box) -->
        @if (Auth::User()->haveCompleteReg == 0)
        <a href="{{url('User/Profile')}}" style="color: black" >
            <div class="callout callout-danger" >
                <h5> Note:</h5>
                Plese complete your registration to access student panel
            </div>
        </a>
        @endif
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa-solid fa-clock-rotate-left"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Total Book Issued</span>
                    <span class="info-box-number">{{$historyTotal}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-receipt"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Current Book Issued</span>
                    <span class="info-box-number">{{$issuedCount}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-book"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Book Need To Be Return </span>
                    <span class="info-box-number">{{$bookASAPCount}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fa-regular fa-calendar-days"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Today Date</span>
                    @php
                        $date = date('d/m/y');
                    @endphp
                    <span class="info-box-number">{{$date}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if($bookASAPCount >= 1)
            <div class="callout callout-danger">
                <h5> Note:</h5>
                You have {{$bookASAPCount}} book(s) needs to be return immediately, please check <a href="{{ url('/User/BookIssued', Auth::user() -> id) }}">Book Issued</a> for more info
            </div>
            @endif
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Book List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Price</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book as $Library)  
                                    <tr>
                                        <td>{{ $Library->name }}</td>
                                        <td>{{ $Library->author }}</td>
                                        <td>{{ $Library->year }}</td>
                                        <td>RM {{ $Library->price }}</td>
                                        <td>{{ $Library -> Availability}}</td>
                                    </tr>
                                @endforeach
                                @if ($book -> count() == 0)
                                <tr>
                                    <td colspan="5" style="text-align: center">No record in database</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="5" style="text-align: center">Showing {{$book -> count()}} record(s) from database</td>
                                </tr>
                                @endif
                                </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

        

  <!-- Main Footer -->
    
</div>
<!-- ./wrapper -->
@include('layouts.footer')
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