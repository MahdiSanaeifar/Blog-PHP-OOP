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
                        <h1>مدیریت بخش اسلایدر ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت بخش اسلایدر ها</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <form role="form" method="post"
                                  action="https://domain.ir/slider/store-text"
                                  enctype="multipart/form-data">
                                <div class="card-header">
                                    <h3 class="card-title">اسلایدر متن</h3>
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
                                            <th>متن اسلایدر</th>
                                            <th>لینک اسلایدر</th>
                                        </tr>
                                        <?php $count = 1;
                                        foreach ($sliders as $slider) { ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td>
                                                <textarea type="text" id="text<?=$count?>" name="text<?=$count?>" rows="3"
                                                          class="form-control"><?= $slider['text'] ?></textarea>
                                                </td>
                                                <td><textarea type="text" id="text_url<?=$count?>" name="text_url<?=$count?>" rows="3"
                                                              class="form-control"><?= $slider['url'] ?></textarea>
                                                </td>
                                            </tr>
                                        <?php $count++;} ?>


                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="col-6">
                        <div class="card">
                            <form role="form" method="post"
                                  action="https://domain.ir/slider/store-image"
                                  enctype="multipart/form-data">
                                <div class="card-header">
                                    <h3 class="card-title">اسلایدر عکس</h3>
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
                                            <th>متن اسلایدر</th>
                                            <th>شماره آیدی پست</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>اسلایدر بزرگ ۱</td>
                                            <td>
                                                <select class="form-control" id="bslider1" name="bslider1">
                                                    <?php foreach ($articles as $article) { ?>
                                                        <option value="<?php echo $article['id'] ?>" <?php if ($article['id'] == $bSliders[0]['id']) {
                                                            echo "selected";
                                                        } ?>><?php echo $article['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>اسلایدر بزرگ ۲</td>
                                            <td>
                                                <select class="form-control" id="bslider2" name="bslider2">
                                                    <?php foreach ($articles as $article) { ?>
                                                        <option value="<?php echo $article['id'] ?>" <?php if ($article['id'] == $bSliders[1]['id']) {
                                                            echo "selected";
                                                        } ?>><?php echo $article['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>اسلایدر بزرگ ۳</td>
                                            <td>
                                                <select class="form-control" id="bslider3" name="bslider3">
                                                    <?php foreach ($articles as $article) { ?>
                                                        <option value="<?php echo $article['id'] ?>" <?php if ($article['id'] == $bSliders[2]['id']) {
                                                            echo "selected";
                                                        } ?>><?php echo $article['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>اسلایدر کوچک ۱</td>
                                            <td>
                                                <select class="form-control" id="sslider1" name="sslider1">
                                                    <?php foreach ($articles as $article) { ?>
                                                        <option value="<?php echo $article['id'] ?>" <?php if ($article['id'] == $sSliders[0]['id']) {
                                                            echo "selected";
                                                        } ?>><?php echo $article['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>اسلایدر کوچک ۲</td>
                                            <td>
                                                <select class="form-control" id="sslider2" name="sslider2">
                                                    <?php foreach ($articles as $article) { ?>
                                                        <option value="<?php echo $article['id'] ?>" <?php if ($article['id'] == $sSliders[1]['id']) {
                                                            echo "selected";
                                                        } ?>><?php echo $article['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>اسلایدر کوچک ۳</td>
                                            <td>
                                                <select class="form-control" id="sslider3" name="sslider3">
                                                    <?php foreach ($articles as $article) { ?>
                                                        <option value="<?php echo $article['id'] ?>" <?php if ($article['id'] == $sSliders[2]['id']) {
                                                            echo "selected";
                                                        } ?>><?php echo $article['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>اسلایدر کوچک ۴</td>
                                            <td>
                                                <select class="form-control" id="sslider4" name="sslider4">
                                                    <?php foreach ($articles as $article) { ?>
                                                        <option value="<?php echo $article['id'] ?>" <?php if ($article['id'] == $sSliders[3]['id']) {
                                                            echo "selected";
                                                        } ?>><?php echo $article['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        let active = document.getElementById("home-session1");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>