<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | صفحه ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/dist/css/custom-style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="https://domain.ir"><b>ورود به سایت</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

            <form action="https://domain.ir/check-login" method="post">
                <?php
                $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
                if($httpReferer == 'https://domain.ir/login'){?>
                    <div> <small class="form-text text-danger">خطا*</small> </div><?php
                }?>
                <div class="input-group mb-3">
                    <input type="number" id="idcode" name="idcode" class="form-control" placeholder="کدملی" onkeyup="onlyNumberKey(this)" required="">
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="رمز عبور" id="password" name="password" required="">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
				 <script>
                        function onlyNumberKey(event) {
                            let inval = event.value;
                            let lastVal = inval.slice(-1);
                            console.log(inval.slice(-1));
                            if (!lastVal.match(/^[0-9]+$/)){
                                console.log("wrong!");
                                swal({
 									 text: "لطفا کیبورد خود را در حالت انگلیسی قرار بدهید",
 									 button: "متوجه شدم",
								});
                                event.value ="";
                            };
                        };
                    </script>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-primary">ورود</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#" onclick="swal('لطفا با واحد مربوطه تماس حاصل فرمائید')">رمز عبورم را فراموش کرده ام.</a>
            </p>
            <p class="mb-0">
                <a href="https://domain.ir/register" class="text-center">ثبت نام</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://domain.ir/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://domain.ir/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="https://domain.ir/public/admin/plugins/iCheck/icheck.min.js"></script>
	<!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    });
	<?php
	$httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
                if($httpReferer == 'https://domain.ir/login'){ ?>
                    swal({
 						 title: "مشکلی در ورود وجود دارد",
 						 text: "لطفا از صحت کدملی و رمز عبور اطمینان حاصل فرمائید",
 						 icon: "error",
					     button: "متوجه شدم",
						});
	<?php } ?>
</script>
</body>
</html>
