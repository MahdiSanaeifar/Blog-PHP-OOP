<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
<script src="https://cdn.tiny.cloud/1/zn2rn867fzgxtndy3suf1etouqs1nuwdsrouv6bxr19j017c/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ویرایش پست</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">ویرایش پست</li>
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
                                  action="https://domain.ir/article/update/<?php echo $id; ?>"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           placeholder="عنوان  ..." value="<?php echo $article['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>انتشار یا عدم انتشار</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="enable" <?php if ($article['status'] == "enable") echo 'selected'; ?>>
                                            انتشار
                                        </option>
                                        <option value="disable" <?php if ($article['status'] == "disable") echo 'selected'; ?>>
                                            عدم انتشار
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>دسته بندی</label>
                                    <select class="form-control" id="cat_id" name="cat_id">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?php echo $category['id'] ?>" <?php if ($category['id'] == $article['cat_id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>نوع پست</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="simple" <?php if ($article['type']=="simple"){echo "selected";} ?>>ساده</option>
                                        <option value="video" <?php if ($article['type']=="video"){echo "selected";} ?>>ویدئو</option>
                                        <option value="picture" <?php if ($article['type']=="picture"){echo "selected";} ?>>عکس</option>
                                        <option value="voice" <?php if ($article['type']=="voice"){echo "selected";} ?>>صوت</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>موسسه</label>
                                    <select class="form-control" id="location" name="location">
                                        <option value="loc1" <?php if ($article['location']=="loc1"){echo "selected";} ?>>loc1</option>
                                        <option value="loc3" <?php if ($article['location']=="loc3"){echo "selected";} ?>>loc3</option>
                                        <option value="loc2" <?php if ($article['location']=="loc2"){echo "selected";} ?>>loc2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">عکس کاور</label>
                                    <input type="file" id="image" name="image" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label>کد مورد نظر</label>
                                    <input type="text" id="costumecode" name="costumecode" class="form-control"
                                           placeholder="کد مورد نظر  ..." value="<?php echo $article['costumecode']; ?>">
                                </div>

                                <div class="card-header bg-primary">
                                    <h3 class="card-title">نوشتاری</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>توضیحات کوتاه</label>
                                        <textarea class="form-control" rows="4" id="summary" name="summary"
                                                  placeholder="خلاصه ای از توضیحات  ..."><?= $article['summary']?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>توضیحات تکمیلی</label>
                                        <textarea class="form-control" rows="4" id="body" name="body"
                                                  placeholder="توضیحات کامل ..."><?= $article['body']?></textarea>
                                    </div>
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
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
    <script>
        let active = document.getElementById("posts");
        active.classList.add("active");
    </script>
    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
