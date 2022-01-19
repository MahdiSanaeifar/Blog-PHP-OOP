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
                        <h1>مدیریت پست ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت پست ها</li>
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
                                <h3 class="card-title">پست ها</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="https://domain.ir/article/create"
                                           class="btn btn-block btn-secondary">پست جدید</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره</th>
                                        <th>عنوان</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                        <th>توضیحات</th>
                                        <th>بازدید</th>
                                        <th>مدیریت</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach ($articles as $article) {
                                        ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $article['title'] ?></td>
                                            <td><?= gregorian_to_jalali(date("Y", strtotime($article['created_at'])), date("m", strtotime($article['created_at'])), date("d", strtotime($article['created_at'])), '/') . " ساعت " . date("H:i", strtotime($article['created_at'])); ?></td>
                                            <td>
                                                <?php
                                                if ($article['status'] == "enable")
                                                    echo "<span class='badge badge-success'>منتشر شده</span>";
                                                elseif ($article['status'] == "disable")
                                                    echo "<span class='badge badge-danger'>غیر فعال</span>";

                                                echo "<br>";

                                                if ($article['bslider'] == "yes")
                                                    echo "<span class='badge badge-danger'>اسلایدر بزرگ</span>";

                                                if ($article['sslider'] == "yes")
                                                    echo "<span class='badge badge-danger'>اسلایدر کوچک</span>";
                                                ?>
                                            </td>
                                            <td><?= $article['summary'] ?></td>
                                            <td><?= $article['view'] ?></td>
                                            <td>
                                                <a type="button"
                                                   href="https://domain.ir/article/edit/<?php echo $article['id']; ?>"
                                                   class="btn btn-block btn-outline-info btn-sm">ویرایش</a>
                                                <a type="button"
                                                   href="https://domain.ir/article/delete/<?php echo $article['id']; ?>"
                                                   class="btn btn-block btn-outline-danger btn-sm">حذف</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $counter++;
                                    } ?>
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
        let active = document.getElementById("posts");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>