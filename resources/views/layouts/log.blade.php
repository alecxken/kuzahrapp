<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KUZA REG/LOGIN Page</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">

    <!-- Linearicon Font -->
    <link rel="stylesheet" href="{{asset("assets/css/lnr-icon.css")}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/font-awesome.min.css")}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <!-- Main Wrapper -->
    <div class="inner-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox shadow-sm">
                    <div class="login-left">
                        <img class="img-fluid" src="/img/logo.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                          @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset("assets/js/jquery-3.2.1.min.js")}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset("assets/js/popper.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>

    <!-- Sticky sidebar JS -->
    <script src="{{asset("assets/plugins/theia-sticky-sidebar/ResizeSensor.js")}}"></script>
    <script src="{{asset("assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js")}}"></script>

    <!-- Custom Js -->
    <script src="{{asset("assets/js/script.js")}}"></script>

</body>

</html>