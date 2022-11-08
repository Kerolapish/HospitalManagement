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
                    <h1 class="m-0">Book Issued</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="\dashboard">Student Panel</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/User/BookIssued', $data->first()) }}">Book Issued</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if (Auth::User()->haveCompleteReg == 0)
            <div class="callout callout-danger">
              <h5> Note:</h5>
              Plese complete your registration to access student panel
            </div>
            @else
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Book Issued</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Date Issued</th>
                                <th>Date Returned</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $Library)  
                                <tr>
                                    <td>{{ $Library -> bookName }}</td>
                                    <td>{{ $Library -> dateIssued }}</td>
                                    <td>{{ $Library -> dateReturn }}</td>
                                    @php
                                     $datetoday = new DateTime("now");
                                     $dateReturn = new DateTime($Library -> dateReturn);
                                     $dateDiff = $datetoday -> diff($dateReturn);
                                     if ($dateDiff -> days == 0){
                                        
                                        $status = "Please return the book today";

                                     } else if ($datetoday < $dateReturn && $dateDiff -> days <= 7){

                                        $status = "Please return the book in " . $dateDiff -> days . " days";

                                     }else {

                                        $status = "Please return the book immediately";
                                     }
                                    @endphp
                                    <td>{{$status}}</td>
                                </tr>
                            @endforeach
                            @if ($book -> count() == 0)
                            <tr>
                                <td colspan="5" style="text-align: center">You have no current issued book</td>
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
            @endif
            
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