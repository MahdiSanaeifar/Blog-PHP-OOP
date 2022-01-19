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
                        <h1>مدیریت منو ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت منو ها</li>
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
                                <h3 class="card-title">منو ها</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="https://domain.ir/menu/create"
                                           class="btn btn-block btn-secondary">منو جدید</a>
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
                                        <th>زیر مجموعه</th>
                                        <th>آدرس</th>
                                        <th>اولویت</th>
                                        <th>مدیریت</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach ($menus as $menu) {
                                        ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $menu['name'] ?></td>
                                            <td><?= $menu['created_at'] ?></td>
                                            <td><?= $menu['parent_id'];
                                                if ($menu['parent_id'] == null) echo "<span class='badge badge-danger'>ندارد</span>"; ?></td>
                                            <td><?= $menu['url'] ?></td>
                                            <td><?= $menu['sort'] ?></td>
                                            <td>
                                                <a type="button"
                                                   href="https://domain.ir/menu/edit/<?php echo $menu["id"] ?>"
                                                   class="btn btn-block btn-outline-info btn-sm">ویرایش</a>
                                                <a type="button"
                                                   href="https://domain.ir/menu/delete/<?php echo $menu["id"] ?>"
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
        let active = document.getElementById("menu");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>