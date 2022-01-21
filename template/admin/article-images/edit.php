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
                    <h1>ویرایش آلبوم عکس ها</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">ویرایش آلبوم عکس ها</li>
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
                            <h3 class="card-title">لطفا جهت اضافه کردن عکس جدید بر روی افزودن کلیک کنید</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" action="https://domain.ir/gallery/store"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>برای پست "<?= $article['title'] ?>"</label>
                                    <input type="text" name="article_id" id="article_id" value="<?= $article['id'] ?>"
                                           style="display: none">
                                </div>
                                <!--                                gallery image-->
                                <div class="card card-default">

                                    <!-- /.card-header -->
                                    <div class="card-body" style="display: block;">
                                        <div class="row">
                                            <button type="button" onclick="addImageIput()"
                                                    class="btn btn-block btn-default">افزودن
                                            </button>
                                            <table class="table table-bordered">
                                                <tbody id="imageInputs">
                                                <tr>
                                                    <th style="width: 10px">شماره</th>
                                                    <th>بارگزاری</th>
                                                    <th>مدیریت</th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--                                gallery image ended-->

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
    <script>
        let counter = 1;

        function addImageIput() {
            $("#imageInputs").append("<tr id='trImage" + counter + "'>" +
                "<td>" + counter + "</td>" +
                "<td><input type='file' class='btn btn-primary btn-file' name=" + "Image" + counter + " id=" + "Image" + counter + "></td>" +
                "<td><button class='btn btn-outline-warning' id='rmImage" + counter + "'>حذف</button></td>" +
                "</tr>");
            $("#rmImage" + counter).click(function () {
                $(this).closest("tr").remove();
            });
            counter++;
        }
    </script>
    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
