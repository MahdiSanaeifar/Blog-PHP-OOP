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
                        <h1>مدیریت دسته بندی ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت دسته بندی ها</li>
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
                                <h3 class="card-title">دسته بندی ها</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="https://domain.ir/category/create"
                                           class="btn btn-block btn-secondary">دسته بندی جدید</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره</th>
                                        <th>نــام</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                        <th>مدیریت</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach ($categories as $category) {
                                        ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $category['name'] ?></td>
                                            <td><?= gregorian_to_jalali(date("Y", strtotime($category['created_at'])), date("m", strtotime($category['created_at'])), date("d", strtotime($category['created_at'])), '/') . " ساعت " . date("H:i", strtotime($category['created_at'])); ?></td>
                                            <td>
                                                <?php
                                                if ($category['showstatus'] == "yes")
                                                    echo "<span class='badge badge-success'>فعال</span>";
                                                elseif ($category['showstatus'] == "no")
                                                    echo "<span class='badge badge-danger'>غیر فعال</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <a type="button"
                                                   href="https://domain.ir/category/edit/<?php echo $category["id"] ?>"
                                                   class="btn btn-block btn-outline-info btn-sm">ویرایش</a>
                                                <a type="button"
                                                   href="https://domain.ir/category/delete/<?php echo $category["id"] ?>"
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
        let active = document.getElementById("categories");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>