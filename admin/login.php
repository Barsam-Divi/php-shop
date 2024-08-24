<?php
     if (isset($_COOKIE['admin']))
{
    header("location:index.php?c=dashboard&a=index");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | صفحه ورود (2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- RTL style -->
    <link rel="stylesheet" href="assets/dist/css/rtl.css">
</head>
<body class="hold-transition login-page" dir="rtl">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="assets/index2.html" class="h1"><b>انلاین </b>شاپ</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">ورود</p>

            <form action="index.php?c=admin&a=login" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control inputBrClass" placeholder="ایمیل">
                    <div class="input-group-append">
                        <div class="input-group-text brClass">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control inputBrClass" placeholder="رمز ورود">
                    <div class="input-group-append">
                        <div class="input-group-text brClass">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                مرا به خاطر بسپار
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">ورود</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <p class="mb-1">
                <a href="forgot-password.html">من رمزم رو فراموش کردم</a>
            </p>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>

