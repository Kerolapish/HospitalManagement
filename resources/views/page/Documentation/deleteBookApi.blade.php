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
    <style>
        pre .hll {
            background-color: #ffc
        }

        pre {
            background: #f0f0f0
        }

        pre .c {
            color: #60a0b0;
            font-style: italic
        }

        pre .err {
            border: 1px solid red
        }

        pre .k {
            color: #007020;
            font-weight: 700
        }

        pre .o {
            color: #666
        }

        pre .ch {
            color: #60a0b0;
            font-style: italic
        }

        pre .cm {
            color: #60a0b0;
            font-style: italic
        }

        pre .cp {
            color: #007020
        }

        pre .cpf {
            color: #60a0b0;
            font-style: italic
        }

        pre .c1 {
            color: #60a0b0;
            font-style: italic
        }

        pre .cs {
            color: #60a0b0;
            background-color: #fff0f0
        }

        pre .gd {
            color: #a00000
        }

        pre .ge {
            font-style: italic
        }

        pre .gr {
            color: red
        }

        pre .gh {
            color: navy;
            font-weight: 700
        }

        pre .gi {
            color: #00a000
        }

        pre .go {
            color: #888
        }

        pre .gp {
            color: #c65d09;
            font-weight: 700
        }

        pre .gs {
            font-weight: 700
        }

        pre .gu {
            color: purple;
            font-weight: 700
        }

        pre .gt {
            color: #04d
        }

        pre .kc {
            color: #007020;
            font-weight: 700
        }

        pre .kd {
            color: #007020;
            font-weight: 700
        }

        pre .kn {
            color: #007020;
            font-weight: 700
        }

        pre .kp {
            color: #007020
        }

        pre .kr {
            color: #007020;
            font-weight: 700
        }

        pre .kt {
            color: #902000
        }

        pre .m {
            color: #40a070
        }

        pre .s {
            color: #4070a0
        }

        pre .na {
            color: #4070a0
        }

        pre .nb {
            color: #007020
        }

        pre .nc {
            color: #0e84b5;
            font-weight: 700
        }

        pre .no {
            color: #60add5
        }

        pre .nd {
            color: #555;
            font-weight: 700
        }

        pre .ni {
            color: #d55537;
            font-weight: 700
        }

        pre .ne {
            color: #007020
        }

        pre .nf {
            color: #06287e
        }

        pre .nl {
            color: #002070;
            font-weight: 700
        }

        pre .nn {
            color: #0e84b5;
            font-weight: 700
        }

        pre .nt {
            color: #062873;
            font-weight: 700
        }

        pre .nv {
            color: #bb60d5
        }

        pre .ow {
            color: #007020;
            font-weight: 700
        }

        pre .w {
            color: #bbb
        }

        pre .mb {
            color: #40a070
        }

        pre .mf {
            color: #40a070
        }

        pre .mh {
            color: #40a070
        }

        pre .mi {
            color: #40a070
        }

        pre .mo {
            color: #40a070
        }

        pre .sa {
            color: #4070a0
        }

        pre .sb {
            color: #4070a0
        }

        pre .sc {
            color: #4070a0
        }

        pre .dl {
            color: #4070a0
        }

        pre .sd {
            color: #4070a0;
            font-style: italic
        }

        pre .s2 {
            color: #4070a0
        }

        pre .se {
            color: #4070a0;
            font-weight: 700
        }

        pre .sh {
            color: #4070a0
        }

        pre .si {
            color: #70a0d0;
            font-style: italic
        }

        pre .sx {
            color: #c65d09
        }

        pre .sr {
            color: #235388
        }

        pre .s1 {
            color: #4070a0
        }

        pre .ss {
            color: #517918
        }

        pre .bp {
            color: #007020
        }

        pre .fm {
            color: #06287e
        }

        pre .vc {
            color: #bb60d5
        }

        pre .vg {
            color: #bb60d5
        }

        pre .vi {
            color: #bb60d5
        }

        pre .vm {
            color: #bb60d5
        }

        pre .il {
            color: #40a070
        }

        .highlight pre .hll {
            background-color: #49483e
        }

        .highlight pre {
            background: #272822;
            color: #f8f8f2;
        }

        .highlight pre .c {
            color: #75715e
        }

        .highlight pre .err {
            color: #960050;
            background-color: #1e0010
        }

        .highlight pre .k {
            color: #66d9ef
        }

        .highlight pre .l {
            color: #ae81ff
        }

        .highlight pre .n {
            color: #f8f8f2
        }

        .highlight pre .o {
            color: #f92672
        }

        .highlight pre .p {
            color: #f8f8f2
        }

        .highlight pre .ch {
            color: #75715e
        }

        .highlight pre .cm {
            color: #75715e
        }

        .highlight pre .cp {
            color: #75715e
        }

        .highlight pre .cpf {
            color: #75715e
        }

        .highlight pre .c1 {
            color: #75715e
        }

        .highlight pre .cs {
            color: #75715e
        }

        .highlight pre .gd {
            color: #f92672
        }

        .highlight pre .ge {
            font-style: italic
        }

        .highlight pre .gi {
            color: #a6e22e
        }

        .highlight pre .gs {
            font-weight: 700
        }

        .highlight pre .gu {
            color: #75715e
        }

        .highlight pre .kc {
            color: #66d9ef
        }

        .highlight pre .kd {
            color: #66d9ef
        }

        .highlight pre .kn {
            color: #f92672
        }

        .highlight pre .kp {
            color: #66d9ef
        }

        .highlight pre .kr {
            color: #66d9ef
        }

        .highlight pre .kt {
            color: #66d9ef
        }

        .highlight pre .ld {
            color: #e6db74
        }

        .highlight pre .m {
            color: #ae81ff
        }

        .highlight pre .s {
            color: #e6db74
        }

        .highlight pre .na {
            color: #a6e22e
        }

        .highlight pre .nb {
            color: #f8f8f2
        }

        .highlight pre .nc {
            color: #a6e22e
        }

        .highlight pre .no {
            color: #66d9ef
        }

        .highlight pre .nd {
            color: #a6e22e
        }

        .highlight pre .ni {
            color: #f8f8f2
        }

        .highlight pre .ne {
            color: #a6e22e
        }

        .highlight pre .nf {
            color: #a6e22e
        }

        .highlight pre .nl {
            color: #f8f8f2
        }

        .highlight pre .nn {
            color: #f8f8f2
        }

        .highlight pre .nx {
            color: #a6e22e
        }

        .highlight pre .py {
            color: #f8f8f2
        }

        .highlight pre .nt {
            color: #f92672
        }

        .highlight pre .nv {
            color: #f8f8f2
        }

        .highlight pre .ow {
            color: #f92672
        }

        .highlight pre .w {
            color: #f8f8f2
        }

        .highlight pre .mb {
            color: #ae81ff
        }

        .highlight pre .mf {
            color: #ae81ff
        }

        .highlight pre .mh {
            color: #ae81ff
        }

        .highlight pre .mi {
            color: #ae81ff
        }

        .highlight pre .mo {
            color: #ae81ff
        }

        .highlight pre .sa {
            color: #e6db74
        }

        .highlight pre .sb {
            color: #e6db74
        }

        .highlight pre .sc {
            color: #e6db74
        }

        .highlight pre .dl {
            color: #e6db74
        }

        .highlight pre .sd {
            color: #e6db74
        }

        .highlight pre .s2 {
            color: #e6db74
        }

        .highlight pre .se {
            color: #ae81ff
        }

        .highlight pre .sh {
            color: #e6db74
        }

        .highlight pre .si {
            color: #e6db74
        }

        .highlight pre .sx {
            color: #e6db74
        }

        .highlight pre .sr {
            color: #e6db74
        }

        .highlight pre .s1 {
            color: #e6db74
        }

        .highlight pre .ss {
            color: #e6db74
        }

        .highlight pre .bp {
            color: #f8f8f2
        }

        .highlight pre .fm {
            color: #a6e22e
        }

        .highlight pre .vc {
            color: #f8f8f2
        }

        .highlight pre .vg {
            color: #f8f8f2
        }

        .highlight pre .vi {
            color: #f8f8f2
        }

        .highlight pre .vm {
            color: #f8f8f2
        }

        .highlight pre .il {
            color: #ae81ff
        }
    </style>
</head>

<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.topNavDoc')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.docSideBar')

        <div class="content-wrapper px-4 py-2">
            <!-- Content Header (Page header) -->
            <div class="content px-2">
                <h3 id="quick-start">Delete Book Entries</h3>
                <div class="language-html highlighter-rouge">
                    <div class="highlight">
                        <pre class="highlight"><code><span class="na">DELETE</span><span class="nt"> | </span><span class="s"> http://hospitalmanagement.test/api/V1/Library/{bookId}</span></code></pre>
                    </div>
                </div>
                
                <h4 id="quick-start">Parameters</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 100px">Name</th>
                            <th style="width: 100px">Type</th>
                            <th style="width: 150px">Example</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>bookId</td>
                            <td>int</td>
                            <td>4</td>
                            <td>the ID of the author</td>
                        </tr>
                    </tbody>
                </table>

                <h4>Request Example</h4>
                <div class="language-html highlighter-rouge">
                    <div class="highlight">
                        <pre class="highlight"><code><span class="na">DELETE</span><span class="nt"> | </span><span class="s">http://hospitalmanagement.test/api/V1/Library/32</span></code></pre>
                    </div>
                    <p>If the request accepted, site will return 200</p>
                </div>
                
            </div>
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
