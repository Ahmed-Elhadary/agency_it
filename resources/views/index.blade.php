<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/admin/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/admin/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Task-Manger
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/admin/assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/admin/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse" style="overflow: hidden">
<!-- Navbar -->
<!-- End Navbar -->
<div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(/admin/assets/img/login.jpg)"></div>
    <div class="content">
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-login card-plain">
                    <form class="form" method="post" action="{{ route('admin.post') }}">
                        @csrf
                        <div class="card-header text-center">
                            <div class="logo-container">
                                <img src="/admin/assets/img/now-logo.png" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="input-group no-border input-lg" style="margin-bottom: 0 !important;">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="{{__('lang.name')}}">

                            </div>
                            @error('email')
                            <span class="focus-input100 text-danger" style="margin-top: -10px">
                                {{$message}}
                            </span>
                            @enderror
                            <div class="input-group no-border input-lg mt-1" style="margin-bottom: 0 !important;">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                </div>
                                <input type="password" name="password" placeholder="{{__('lang.password')}}" class="form-control" />
                            </div>
                            @error('password')
                            <span class="focus-input100 text-danger" style="margin-top: -10px">
                                {{$message}}
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary btn-round btn-lg">{{__('lang.login')}}</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="/admin/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/admin/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/admin/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="/admin/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="/admin/assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
</body>

</html>
