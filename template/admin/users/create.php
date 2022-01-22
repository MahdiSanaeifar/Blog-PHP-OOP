<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ثبت کاربر جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">ویرایش کاربر</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<h1 style="color:red;">این صفحه در حال طراحی می باشد!</h1>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">لطفا اطلاعات خواسته شده را ویرایش نمایید</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" action="http://localhost/site-blog/user/update/<?php echo $id ?>"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>نام و نام خانوادگی</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?= $user['username']; ?>"
                                           placeholder="نام  ...">
                                </div>
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?= $user['email']; ?>"
                                           placeholder="ایمیل  ...">
                                </div>


                                <div class="form-group">
                                    <label>کدملی</label>
                                    <input type="text" id="idcode" name="idcode" class="form-control" value="<?= $user['idcode']; ?>"
                                           placeholder="کدملی  ...">
                                </div>
                                <div class="form-group">
                                    <label>تلفن همراه</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="<?= $user['phone']; ?>"
                                           placeholder="تلفن همراه  ...">
                                </div>
                                <div class="form-group">
                                    <label>شغل پدر</label>
                                    <input type="text" id="parentjob" name="parentjob" class="form-control" value="<?= $user['parentjob']; ?>"
                                           placeholder="شغل پدر  ...">
                                </div>
                                <div class="form-group">
                                    <label>مهارت ها</label>
                                    <input type="text" id="skills" name="skills" class="form-control" value="<?= $user['skills']; ?>"
                                           placeholder="مهارت ها  ...">
                                </div>
                                <div class="form-group">
                                    <label>تلفن پدر</label>
                                    <input type="text" id="parentphone" name="parentphone" class="form-control" value="<?= $user['parentphone']; ?>"
                                           placeholder="تلفن پدر  ...">
                                </div>
                                <div class="form-group">
                                    <label>تلفن ثابت</label>
                                    <input type="text" id="landlinephone" name="landlinephone" class="form-control" value="<?= $user['landlinephone']; ?>"
                                           placeholder="تلفن ثابت  ...">
                                </div>
                                <div class="form-group">
                                    <label>تولد</label>
                                    <input type="text" id="born" name="born" class="form-control" value="<?= $user['born']; ?>"
                                           placeholder="تولد  ...">
                                </div>
                                <div class="form-group">
                                    <label>تحصیلات</label>
                                    <input type="text" id="education" name="education" class="form-control" value="<?= $user['education']; ?>"
                                           placeholder="تحصیلات  ...">
                                </div>
                                <div class="form-group">
                                    <label>پسورد</label>
                                    <input type="text" id="password" name="password" class="form-control" value=""
                                           placeholder="**غیر قابل نمایش**">
                                </div>
                                <div class="form-group">
                                    <label>وضعیت</label>
                                    <select class="form-control" name="permission" id="permission">
                                        <option value="user" <?php if($user['permission']=='user') echo 'selected'; ?>>کاربر</option>
                                        <option value="admin" <?php if($user['permission']=='admin') echo 'selected'; ?>>مدیر</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">ثبت اطلاعات</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <script>
        let active = document.getElementById("users");
        active.classList.add("active");
    </script>
    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
