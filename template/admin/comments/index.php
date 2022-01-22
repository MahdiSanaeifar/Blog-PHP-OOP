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
                        <h1>مدیریت نظرات کاربران ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت نظرات کاربران</li>
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
                                <h3 class="card-title">نظرات</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره</th>
                                        <th>نــام</th>
                                        <th>پست</th>
                                        <th>تاریخ</th>
                                        <th>متن</th>
                                        <th>وضعیت</th>
                                        <th>مدیریت</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach ($comments as $comment) {
                                        ?>
                                        <tr>
                                            <td><?= $counter ?></td>
                                            <td><?= $comment['username'] ?></td>
                                            <td><?= $comment['articlename'] ?></td>
                                            <td><?= gregorian_to_jalali(date("Y", strtotime($comment['created_at'])), date("m", strtotime($comment['created_at'])), date("d", strtotime($comment['created_at'])), '/') . " ساعت " . date("H:i", strtotime($comment['created_at'])); ?></td>
                                            <td><?= $comment['comment'] ?></td>
                                            <td>
                                                <?php
                                                if ($comment['status'] == "unseen")
                                                    echo "<span class='badge badge-danger'>مشاهده نشده</span>";
                                                elseif ($comment['status'] == "seen")
                                                    echo "<span class='badge badge-warning'>تایید نشده</span>";
                                                elseif ($comment['status'] == "approved")
                                                    echo "<span class='badge badge-success'>تایید شده</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($comment['status'] == 'seen') { ?>
                                                    <a role="button" class="btn btn-sm btn-success text-white"
                                                       href="https://domain.ir/comment/approved/<?php echo $comment['id']; ?>">تایید
                                                        شود</a>
                                                <?php } else { ?>
                                                    <a role="button" class="btn btn-sm btn-warning text-white"
                                                       href="https://domain.ir/comment/approved/<?php echo $comment['id']; ?>">تایید
                                                        نشود</a>
                                                <?php } ?>
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
        let active = document.getElementById("comment");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>