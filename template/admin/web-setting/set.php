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
                    <h1>ویرایش تنظیمات سایت</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">ویرایش تنظیمات سایت</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                            <form role="form" method="post"
                                  action="https://domain.ir/web-setting/store"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>تایتل</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="<?php if ($setting != null) echo $setting['title']; ?>"
                                           placeholder="تایتل  ...">
                                </div>
                                <div class="form-group">
                                    <label>دسکریپشن</label>
                                    <input type="text" id="description" name="description" class="form-control"
                                           value="<?php if ($setting != null) echo $setting['description']; ?>"
                                           placeholder="دسکریپشن  ...">
                                </div>
                                <div class="form-group">
                                    <label>کی وورد</label>
                                    <input type="text" id="keywords" name="keywords" class="form-control"
                                           value="<?php if ($setting != null) echo $setting['keywords']; ?>"
                                           placeholder="کی وورد  ...">
                                </div>
                                <div class="form-group">
                                    <label>لوگو</label>
                                    <?php if ($setting != null) { ?>
                                        <img style="width: 100px;"
                                             src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $setting['logo']; ?>"
                                             alt="">
                                    <?php } ?>
                                    <input type="file" id="logo" name="logo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>آیکن</label>
                                    <?php if ($setting != null) { ?>
                                        <img style="width: 100px;"
                                             src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $setting['icon']; ?>"
                                             alt="">
                                        <hr/>
                                    <?php } ?>
                                    <input type="file" id="icon" name="icon" class="form-control">
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
        let active = document.getElementById("websiteSetting");
        active.classList.add("active");
    </script>
    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
