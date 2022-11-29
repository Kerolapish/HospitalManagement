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
                            <h1 class="m-0">Author List</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="\dashboard">Admin Panel</a></li>
                                <li class="breadcrumb-item"><a href="/authorList">Author List</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Author List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Author Name</th>
                                        <th>Author Email</th>
                                        <th>Author Phone Number</th>
                                        <th>Total Book</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($author as $author)
                                        <tr>
                                            <td>{{ $author->authorName }}</td>
                                            @if ($author->haveComplete == false)
                                                <td colspan="2" style="text-align: center">Author not registered yet
                                                </td>
                                            @else
                                                <td>{{ $author->email }}</td>
                                                <td>{{ $author->phoneNo }}</td>
                                            @endif
                                            <td style="text-align: center">
                                                @php
                                                    $bookWritten = $book -> where('author_id', $author -> id);
                                                    $bookWritten = $bookWritten->count();
                                                @endphp
                                                {{ $bookWritten }}
                                            </td>
                                            <td>
                                                <form action="{{ url('deleteAuthor', $author->id) }}" method="POST"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                                                </form>

                                                <a class="btn btn-primary btn-xs"
                                                    href="{{ url('authorUpdate', $author->id) }}">Update</a>

                                                <a class="btn btn-info btn-xs"
                                                    href="{{ url('ViewBook', $author->id) }}">View Book</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($author->count() == 0)
                                        <tr>
                                            <td colspan="5" style="text-align: center">No record in database</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="5" style="text-align: center">Showing
                                                {{ $author->count() }} record(s) from database</td>
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
