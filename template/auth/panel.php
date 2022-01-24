<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/head-tag.php"));
?>

<div class="card-body login-form">
    <div class="col-12" style="padding: 10px;">
        <div class="nav nav-pills nav-pills col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active col" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" style="border-radius: 10px;"><i class="fa fa-dashboard"></i> داشبورد</a>
            <a class="nav-link col" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="border-radius: 10px;"><i class="fa fa-user-circle-o"></i> مشاهده اطلاعات</a>
            <!--<a class="nav-link disabled" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-comment"></i> نظرات من <span class="badge badge-secondary">بزودی</span></a>-->
            <a class="nav-link col" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" style="border-radius: 10px;"><i class="fa fa-sign-out"></i> خروج</a>
        </div>
    </div>
    <div class="col-12">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <?php if ($isLoggedIn) { ?>
                    <div class="jumbotron" style="border-radius: 10px;">
<h1 class="display-5" style="color: rgb(124, 0, 0);"><i class="fa fa-user"></i>
	<?php if ($user['gender'] == "boy") {
		echo "آقای";
	} else if ($user['gender'] == "girl") {
		echo "خانم";
	} ?> <?= $user['username'] ?> خوش آمدید
</h1>
                        <p>عضویت/ورود شما در وبسایت با موفقیت انجام شده است!</p>
                        <hr class="my-4">
                        <div class="alert alert-warning" role="alert">
                            <i class="fa fa-info-circle"></i>
                            کد عضویت شما در نام وبسایت - <a href="#" class="alert-link"><?= $user['membership'] ?></a> - می باشد؛ لطفا آن را به خاطر بسپارید.
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="jumbotron" style="border-radius: 10px;">
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-warning"></i>
                            لطفا ابتدا وارد شوید!
                        </div>

                        <hr>

<form action="https://domain.ir/check-login" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <label>کد ملی:</label>
                                    <input type="number" id="idcode" name="idcode" placeholder="برای مثال ۷۲" onkeyup="onlyNumberKey(this)">
                                </div>
                                <div class="col-6">
                                    <label>رمز عبور:</label>
                                    <input type="password" placeholder="رمز عبور" id="password" name="password">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <button type="submit" style="height:40px;width: -webkit-fill-available;" style="font-size: 30px;">ورود</button>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <a onclick="swal('لطفا با واحد مربوطه تماس حاصل فرمائید')" class="btn btn-outline-primary btn-lg btn-block" style="height: 40px;font-size: 19px;">فراموشی رمز عبور</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="register" class="btn btn-outline-danger btn-lg btn-block" style="height: 40px;font-size: 19px;">ثبت نام</a>
                                </div>
                            </div>
                        </form>


                    </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="jumbotron" style="border-radius: 10px;">
                    <?php if ($isLoggedIn) { ?>
                        <form role="form" method="post" action="https://domain.ir/panel/update/<?= $user['id'] ?>" enctype="multipart/form-data">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>عنوان</th>
                                            <th>مقدار</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>نام و نام خانوادگی</td>
                                            <td><input type="text" value="<?= $user['username'] ?>" placeholder="نام و نام خانوادگی" name="username" id="username" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>کدملی <span class="badge badge-secondary">غیر قابل تغییر</span></td>
                                            <td><input type="text" value="<?= $user['idcode'] ?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>تلفن همراه</td>
                                            <td><input type="text" value="<?= $user['phone'] ?>" placeholder="شماره تلفن همراه" name="phone" id="phone" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>مهارت و شغل پدر</td>
                                            <td><input type="text" value="<?= $user['skills'] ?>" placeholder="مهارت های شما" name="skills" id="skills" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>تلفن همراه پدر</td>
                                            <td><input type="text" value="<?= $user['parentphone'] ?>" placeholder="شماره تلفن همراه پدر" name="parentphone" id="parentphone" disabled></td>
                                        </tr>
										                                        <tr>
                                            <td>تاریخ تولد</td>
                                            <td><input type="text" value="<?= $user['born'] ?>" placeholder="تاریخ تولد" name="born" id="born" disabled></td>
                                        </tr>
										<tr>
                                            <td>تمایل به همکاری</td>
                                                                                        <td><select name="cooperation" id="cooperation" disabled>
                                                    <option value="">هیچکدام</option>
                                                    <option value="yes" <?php if ($user['cooperation'] == "yes") {
                                                                            echo "selected";
                                                                        } ?>>بلی</option>
                                                    <option value="no" <?php if ($user['cooperation'] == "no") {
                                                                            echo "selected";
                                                                        } ?>>خیر</option>
                                                </select>
                                            </td>
                                        </tr>
										<tr>
                                            <td>جنسیت</td>
                                              <td><select name="gender" id="gender" disabled>
                                                    <option value="">هیچکدام</option>
                                                    <option value="boy" <?php if ($user['gender'] == "boy") {
                                                                            echo "selected";
                                                                        } ?>>آقا</option>
                                                    <option value="girl" <?php if ($user['gender'] == "girl") {
                                                                            echo "selected";
                                                                        } ?>>خانم</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>تلفن ثابت</td>
                                            <td><input type="text" value="<?= $user['landlinephone'] ?>" placeholder="شماره تلفن ثابت" name="landlinephone" id="landlinephone" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>تحصیلات</td>
                                            <td><input type="text" value="<?= $user['education'] ?>" placeholder="تحصیلات" name="education" id="education" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>عکس</td>
                                            <td>بارگذاری نشده</td>
                                        </tr>
                                        <tr>
                                            <td>تاریخ عضویت</td>
                                            <td><input type="text" value="<?= gregorian_to_jalali(date("Y", strtotime($user['created_at'])), date("m", strtotime($user['created_at'])), date("d", strtotime($user['created_at'])), '/'); ?>" disabled></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width:100%;" disabled>ثبت اطلاعات</button>
                        </form>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-warning"></i>
                            لطفا ابتدا وارد شوید!
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="jumbotron" style="border-radius: 10px;">
                    <?php if ($isLoggedIn) { ?>
                        <h2>نظرات:</h2>
                        <?php
                        foreach ($comments as $comment) { ?>
                            <div class="alert alert-light" role="alert">
                                <?= $comment['comment'] ?>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-warning"></i>
                            لطفا ابتدا وارد شوید!
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="jumbotron" style="border-radius: 10px;">
                    <?php if ($isLoggedIn) { ?>
                        <p>لطفا بر روی دکمه زیر کلیک کنید</p>
                        <a href="https://domain.ir/logout" class="btn btn-danger btn-lg">خروج از حساب کاربری</a>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-warning"></i>
                            لطفا ابتدا وارد شوید!
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>