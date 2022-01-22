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
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره</th>
                                        <th>نام بخش</th>
                                        <th>اطلاعات وارد شده</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>نام و نام خانوادگی</td>
                                        <td><?= $user['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>کدملی</td>
                                        <td><?= $user['idcode'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>تلفن همراه</td>
                                        <td><?= $user['phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>شغل پدر</td>
                                        <td><?= $user['parentjob'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>مهارت ها</td>
                                        <td><?= $user['skills'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>رمز عبور</td>
                                        <td>**غیر قابل نمایش**</td>
                                    </tr>
                                    <hr>
                                    <tr>
                                        <td>7</td>
                                        <td>تلفن همراه پدر</td>
                                        <td><?= $user['parentphone'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>تلفن ثابت</td>
                                        <td><?= $user['landlinephone'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>تاریخ تولد</td>
                                        <td><?= $user['born'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>تحصیلات</td>
                                        <td><?= $user['education'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>عکس</td>
                                        <td><img src="https://domain.ir/<?= $user['image'] ?>" alt="" width="150px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>تاریخ عضویت</td>
                                        <td><?= gregorian_to_jalali(date("Y", strtotime($user['created_at'])), date("m", strtotime($user['created_at'])), date("d", strtotime($user['created_at'])), '/') . " ساعت " . date("H:i", strtotime($user['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>تمایل به همکاری</td>
                                        <td><?php if ($user['cooperation'] == "yes") {
                                                echo "بلی";
                                            } elseif ($user['cooperation'] == "no") {
                                                echo "خیر";
                                            }; ?></td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>کد عضویت</td>
                                        <td><?= $user['membership'] ?></td>
                                    </tr>
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