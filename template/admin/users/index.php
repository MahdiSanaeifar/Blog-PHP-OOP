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
                        <h1>مدیریت کاربران</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت کاربران</li>
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
                                <h3 class="card-title">کاربران</h3>
								<div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="https://domain.ir/user/create" class="btn btn-block btn-secondary">کاربر جدید</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره</th>
										<th>کدعضویت</th>
                                        <th>نــام</th>
                                        <th>تاریخ</th>
                                        <th>کدملی</th>
                                        <th>شمراه همراه</th>
                                        <th>وضعیت</th>
                                        <th>مدیریت</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach ($users as $user) {
                                        ?>
                                        <tr>
                                            <td><?= $counter ?></td>
											<td><?= $user['membership'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= gregorian_to_jalali(date("Y", strtotime($user['created_at'])), date("m", strtotime($user['created_at'])), date("d", strtotime($user['created_at'])), '/') . " ساعت " . date("H:i", strtotime($user['created_at'])); ?></td>
                                            <td><?= $user['idcode'] ?></td>
                                            <td><?= $user['phone'] ?></td>
                                            <td>
                                                <?php
                                                if ($user['permission'] == "admin")
                                                    echo "<span class='badge badge-danger'>مدیر</span>";
                                                elseif ($user['permission'] == "user")
                                                    echo "<span class='badge badge-secondary'>کاربر</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($user["permission"] == 'user') { ?>
                                                    <a role="button" class="btn btn-block btn-outline-success btn-sm"
                                                       href="https://domain.ir/user/permission/<?php echo $user["id"] ?>">ادمین بشود</a>
                                                <?php } else { ?>
                                                    <a role="button" class="btn btn-block btn-outline-success btn-sm"
                                                       href="https://domain.ir/user/permission/<?php echo $user["id"] ?>">ادمین نباشد</a>
                                                <?php } ?>
                                                <a role="button" class="btn btn-block btn-outline-warning btn-sm"
                                                   href="https://domain.ir/user/edit/<?php echo $user["id"] ?>">ویرایش</a>
                                                <a role="button" class="btn btn-block btn-outline-primary btn-sm"
                                                   href="https://domain.ir/user/show/<?php echo $user["id"] ?>">نمایش</a>
                                                <a role="button" class="btn btn-block btn-outline-danger btn-sm"
                                                   href="https://domain.ir/user/delete/<?php echo $user["id"] ?>" onclick="return  confirm('آیا از حذف این کاربر اطمینان دارید؟')">حذف</a>
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
        let active = document.getElementById("users");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>