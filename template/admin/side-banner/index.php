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
                        <h1>مدیریت دسته بندی های خاص</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت دسته بندی های خاص</li>
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
                            <form role="form" method="post"
                                  action="https://domain.ir/side-banner/store"
                                  enctype="multipart/form-data">
                                <div class="card-header">
                                    <h3 class="card-title">انتخاب دسته بندی های خاص</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <button type="submit" class="btn btn-block btn-secondary">ثبت ویرایش
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>شماره</th>
                                            <th>آپلود</th>
                                        </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <input type="file" id="banner" name="banner" class="form-control-file btn btn-primary btn-file">
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        let active = document.getElementById("side-banner");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>