<?php
if (isset($_COOKIE['user']))
{
    header("location:index.php?c=dashboard&a=index");
}
?>
<!DOCTYPE html>
<html lang="fa" dir = rtl>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">عضویت</h2>
                    <form action="index.php?c=user&a=register" method="POST" class="register-form" >
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="first_name" id="name" placeholder="نام"/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="last_name" id="lastname" placeholder="نام خانوادگی"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="ایمیل شما"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="رمز عبور"/>
                            <p>رمز عبور باید بین 12 تا 8 حروف باشد و دارای عدد یاشد</p>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_password" id="re_pass" placeholder=" تکرار رمز عبور"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>  با تمام قوانین <a href="assets/#" class="term-service">شما موافق هستم</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="ثبت نام"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="assets/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">من حساب دارم</a>
                </div>
            </div>
        </div>
    </section>



</div>

<!-- JS -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>