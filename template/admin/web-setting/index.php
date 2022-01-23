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
                        <h1>مدیریت سایت</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت سایت</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">تنظیمات</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="https://domain.ir/web-setting/set"
                                           class="btn btn-block btn-secondary">ویرایش تنظیمات</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره</th>
                                        <th>نام بخش</th>
                                        <th>مقـــدار</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>تایتل</td>
                                        <td><?= $setting['title'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>دسکریپشن</td>
                                        <td><?= $setting['description'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>کی وورد</td>
                                        <td><?= $setting['keywords'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>لوگو</td>
                                        <td><img src="<?php echo $setting['logo']; ?>" alt="" width="100px" height="100px"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>آیکن</td>
                                        <td><img src="<?php echo $setting['icon']; ?>" alt="" width="100px" height="100px"></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        let active = document.getElementById("websiteSetting");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>