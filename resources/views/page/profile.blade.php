<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LibMan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="\dashboard">Admin Panel</a></li>
              <li class="breadcrumb-item"><a href="{{ url ('profile' , $data -> first())}}">Profile</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="\dist\img\user4-128x128.jpg"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{Auth::user()->name }}</h3>
                
                  <p class="text-muted text-center">{{Auth::user()->role }}</p>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="card">
                <div class="card-header">
                    Log Out
                </div>
                    <div class="card-body">
                        <div class="form-group">
                           Log out your account from this device<br><br>
                        </div> 
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('logout')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-danger float-right">LOGOUT</button>
                        </form>
                    </div>    
            </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Profile Information
                    </div>
                    <form action="{{ url('updateInfo' , $data->first())}}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                Update your account's profile information and email address <br><br>
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{Auth::user() -> name}}">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{Auth::user() -> email}}">
                                </div>
                            </div> 
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark float-right">SAVE</button>
                        </div>    
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">
                        Change Password
                    </div>
                    <form action="{{ route('change-password') }}" method="POST">
                       <div class="card-body">
                        <div class="form-group">
                          Ensure your account is using a long, random password to stay secure <br><br>
                          @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                          @endforeach 
                                @csrf
                                <div class="form-group">
                                    <label for="name">Current Password</label>
                                    <input type="password" class="form-control" name="current_password">
                                </div>
                                <div class="form-group">
                                    <label for="Email">New Password</label>
                                    <input type="password" class="form-control" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Confirm Password</label>
                                    <input type="password" class="form-control" name="new_confirm_password"> 
                                </div>
                            </div> 
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark float-right">CHANGE</button>
                        </div>    
                    </form>
                </div>
            </div>
            <!-- /.col -->
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
