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
                    <h1>افزودن منو جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">افزودن منو جدید</li>
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
                            <h3 class="card-title">لطفا اطلاعات خواسته شده را وارد نمایید</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" action="https://domain.ir/menu/store"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="عنوان  ...">
                                </div>
                                <div class="form-group">
                                    <label>آدرس</label>
                                    <input type="text" id="url" name="url" class="form-control"
                                           placeholder="ارسال به آدرس  ...">
                                </div>
                                <div class="form-group">
                                    <label>زیر مجموعه</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="">ندارد</option>
                                        <?php foreach($menus as $menu) { ?>
                                            <option value="<?= $menu['id'] ?>"><?= $menu['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>اولویت</label>
                                    <input type="text" id="sort" name="sort" class="form-control"
                                           placeholder="اولویت ترتیب  ...">
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
        let active = document.getElementById("menu");
        active.classList.add("active");
    </script>

    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
