<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/head-tag.php"));
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .input-group-text {
        display: flex;
        color: #e53935;
    }
</style>

<div class="card card-body login-form">
    <div class="card-header">
        <h2 class="card-title">فرم عضویت در نام وبسایت</h2>
    </div>
    <form role="form" action="https://domain.ir/register/store" method="post"
          enctype="multipart/form-data">
        <?php
        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        if ($httpReferer == 'https://domain.ir/register') { ?>
            <div><small class="form-text text-danger">خطا*</small></div>
        <?php } ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>نام و نام خانوادگی<span style="color: red;">*</span> :</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="fa fa-user input-group-text"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="نام و نام خانوادگی" name="username"
                                   id="username" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>کدملی<span style="color: red;">*</span> :</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="fa fa-bullseye input-group-text"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="کدملی" name="idcode" id="idcode"
                                   onkeyup="onlyNumberKey(this)" onfocusout="checkIdCode(this)" required="">
                        </div>
                        <span id="result"></span>
                    </div>
                    <script>
                        function checkIdCode(event) {
                            let val = event.value;

                            if (val == "" || val == " " || val.length < 6) {
                                document.getElementById("result").innerHTML = "<p class='badge bg-warning'>لطفا کد ملی خود را به شکل درست وارد نمایید</p>";
                            } else {
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        document.getElementById("result").innerHTML = xhr.responseText;
                                    }
                                }
                                xhr.open("POST", "/template/auth/print.php", true);
                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhr.send("req=" + val);
                            }

                        };
                    </script>

                    <div class="form-group">
                        <label>شماره تلفن همراه<span style="color: red;">*</span> :</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="fa fa-phone input-group-text"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="شماره تلفن همراه" name="phone"
                                   id="phone" required="" onkeyup="onlyNumberKey(this)">
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>تاریخ تولد <span style="color: red;">*</span>:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="fa fa-calendar input-group-text"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="مثال: ۱۳۸۶/۱/۱۲" name="born" id="born">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>جنسیت<span style="color: red;">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="fa fa-check input-group-text"></span>
                            </div>
                            <select class="form-select" aria-label="Default select example" style="color:red;"
                                    name="gender" id="gender" required="">
                                <option value="" selected>لطفا یک مورد را انتخاب کنید</option>
                                <option value="boy">آقا</option>
                                <option value="girl">خانم</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        function passwordCheck(event) {
                            document.getElementById("result2").innerHTML = "<div class='bg-warning text-dark'>لطفا توجه داشته باشید این رمزعبور برای ورود های شما به سایت، مورد استفاده قرار می گیرد، لطفا آن را به خاطر بسپارید.</div>";
                        };
                    </script>
                </div>
            </div>
        </div>
        <div class="form-group ">
            <div class="input-group">
                <button type="submit" class="btn btn-primary btn-block"
                        style="width: inherit;padding: 0px;font-size: 20px;">ثبت نام
                </button>
            </div>
        </div>
    </form>
    <div class="card-footer">
        <div class="social-auth-links ">
            <a href="https://domain.ir/panel" class="text-center">من قبلا ثبت نام کرده ام (برای ورود کلیک
                کنید)</a>
        </div>
    </div>
</div>


<script>
    $("#onToggle").click(function () {
        $("#toggleDiv").slideToggle();
    });
</script>

<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>
<script>
    <?php
    $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
    ?>
    <?php if($httpReferer == 'https://domain.ir/register'){ ?>
    swal({
        title: "مشکلی در عضویت وجود دارد",
        text: "لطفا از صحت اطلاعات وارد شده اطمینان حاصل فرمائید",
        icon: "error",
        button: "متوجه شدم",
        dangerMode: true,
    });
    <?php }?>

</script>