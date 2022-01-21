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
                    <h1>افزودن دسته بندی جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">افزودن دسته بندی جدید</li>
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
                            <form role="form" method="post" action="https://domain.ir/category/update/<?=$id?>"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?= $category['name']; ?>"
                                           placeholder="عنوان  ...">
                                </div>
                                <div class="form-group">
                                    <label>وضعیت نمایش</label>
                                    <select class="form-control" name="showstatus" id="showstatus">
                                        <option value="yes" <?php if ($category['showstatus'] == 'yes') echo 'selected'; ?>>فعال</option>
                                        <option value="no" <?php if ($category['showstatus'] == 'no') echo 'selected'; ?>>غیر فعال</option>
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
        let active = document.getElementById("categories");
        active.classList.add("active");
    </script>
    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
