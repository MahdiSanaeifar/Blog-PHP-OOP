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
                    <h1>ویرایش تنظیمات اسلایدر ها</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">ویرایش تنظیمات اسلایدر ها</li>
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
                                  action="https://domain.ir/slider/store"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>متن اسلایدر ۱</label>
                                    <textarea type="text" id="textslider1" name="textslider1" rows="2"
                                              class="form-control"><?php if ($HomeSession1['textslider1'] != null) echo $HomeSession1['textslider1']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>لینک اسلایدر ۱</label>
                                    <textarea type="text" id="textsliderurl1" name="textsliderurl1" rows="2"
                                              class="form-control"><?php if ($HomeSession1['textsliderurl1'] != null) echo $HomeSession1['textsliderurl1']; ?></textarea>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>متن اسلایدر ۲</label>
                                    <textarea type="text" id="textslider2" name="textslider2" rows="2"
                                              class="form-control"><?php if ($HomeSession1['textslider2'] != null) echo $HomeSession1['textslider2']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>لینک اسلایدر ۲</label>
                                    <textarea type="text" id="textsliderurl2" name="textsliderurl2" rows="2"
                                              class="form-control"><?php if ($HomeSession1['textsliderurl2'] != null) echo $HomeSession1['textsliderurl2']; ?></textarea>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>متن اسلایدر ۳</label>
                                    <textarea type="text" id="textslider3" name="textslider3" rows="2"
                                              class="form-control"><?php if ($HomeSession1['textslider3'] != null) echo $HomeSession1['textslider3']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>لینک اسلایدر ۳</label>
                                    <textarea type="text" id="textsliderurl3" name="textsliderurl3" rows="2"
                                              class="form-control"><?php if ($HomeSession1['textsliderurl3'] != null) echo $HomeSession1['textsliderurl3']; ?></textarea>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>اسلایدر بزرگ شماره ۱</label>
                                    <select class="form-control" id="b_article1" name="b_article1">
                                        <?php foreach ($articles as $article) { ?>
                                            <option value="<?php echo $article['id'] ?>" <?php if ($HomeSession1['b_article1']==$article['id']){echo "selected";} ?>><?php echo $article['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>اسلایدر بزرگ شماره ۱</label>
                                    <select class="form-control" id="b_article2" name="b_article2">
                                        <?php foreach ($articles as $article) { ?>
                                            <option value="<?php echo $article['id'] ?>" <?php if ($HomeSession1['b_article2']==$article['id']){echo "selected";} ?>><?php echo $article['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>اسلایدر بزرگ شماره ۱</label>
                                    <select class="form-control" id="b_article3" name="b_article3">
                                        <?php foreach ($articles as $article) { ?>
                                            <option value="<?php echo $article['id'] ?>" <?php if ($HomeSession1['b_article3']==$article['id']){echo "selected";} ?>><?php echo $article['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>اسلایدر کوچک شماره ۱</label>
                                    <select class="form-control" id="s_article1" name="s_article1">
                                        <?php foreach ($articles as $article) { ?>
                                            <option value="<?php echo $article['id'] ?>" <?php if ($HomeSession1['s_article1']==$article['id']){echo "selected";} ?>><?php echo $article['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>اسلایدر کوچک شماره ۲</label>
                                    <select class="form-control" id="s_article2" name="s_article2">
                                        <?php foreach ($articles as $article) { ?>
                                            <option value="<?php echo $article['id'] ?>" <?php if ($HomeSession1['s_article2']==$article['id']){echo "selected";} ?>><?php echo $article['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>اسلایدر کوچک شماره ۳</label>
                                    <select class="form-control" id="s_article3" name="s_article3">
                                        <?php foreach ($articles as $article) { ?>
                                            <option value="<?php echo $article['id'] ?>" <?php if ($HomeSession1['s_article3']==$article['id']){echo "selected";} ?>><?php echo $article['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>اسلایدر کوچک شماره ۴</label>
                                    <select class="form-control" id="s_article4" name="s_article4">
                                        <?php foreach ($articles as $article) { ?>
                                            <option value="<?php echo $article['id'] ?>" <?php if ($HomeSession1['s_article4']==$article['id']){echo "selected";} ?>><?php echo $article['title']; ?></option>
                                        <?php } ?>
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
        let active = document.getElementById("home-session1");
        active.classList.add("active");
    </script>
    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
