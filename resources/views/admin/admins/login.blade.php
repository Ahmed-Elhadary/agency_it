<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/velonic/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 01:30:13 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Login page | Kid-Guard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/css-ar/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('assets/css-ar/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css-ar/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body class="authentication-page">

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">
                    <div class="card-header p-4 bg-primary">
                        <h4 class="text-white text-center mb-0 mt-0">Task Manager</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.post')}}" class="p-2" method="post">
                            {{method_field('POST')}}
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email Address :</label>
                                <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter e-mail address">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password :</label>
                                <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                            </div>
                            <div class="form-group row text-center mt-4 mb-4">
                                <div class="col-12">
                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end card-body -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
</body>
</html>
