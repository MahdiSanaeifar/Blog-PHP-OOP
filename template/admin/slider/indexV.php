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
                        <h1>مدیریت بخش اسلایدر ویدئو</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت بخش اسلایدر ویدئو</li>
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
                                  action="https://domain.ir/slider/store-video"
                                  enctype="multipart/form-data">
                                <div class="card-header">
                                    <h3 class="card-title">اسلایدر ویدئو های ویژه</h3>
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
                                            <th>انتخاب پست</th>
                                            <th>اولویت</th>
                                        </tr>
                                        <?php $i=0; for ($count=1;$count<=10;$count++) { ?>
                                            <tr>
                                                <td><?= $count ?>-</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control" id="video<?=$count?>" name="video<?=$count?>">
                                                            <option value="">ندارد</option>
                                                            <?php foreach ($articles as $article){ ?>
                                                                <option value="<?=$article['id']?>" <?php if ($videoSliders[$i]['article_id']==$article['id']){echo "selected";} ?>><?=$article['title']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="sort<?=$count?>" id="sort<?=$count?>" class="form-control" placeholder="ترتیب  ..." value="<?=$videoSliders[$i]['sort']?>"></td>
                                            </tr>
                                            <?php $i++;} ?>
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
        let active = document.getElementById("home-session3");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>