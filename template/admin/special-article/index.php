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
                        <h1>مدیریت دسته بندی های خاص</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیریت دسته بندی های خاص</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="card card-info card-outline collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">
                        دسته بندی اول
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i> باز / بسته
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    <div class="mb-3">
                        <form role="form" method="post" action="https://domain.ir/special-article/store" enctype="multipart/form-data">
                            <table class="table table-hover">
                                <input type="text" name="storeNum" id="storeNum" value="first" style="display: none;">
                                <tr>
                                    <th>نام بخش</th>
                                    <th>مقدار</th>
                                    <th>عنوان انتخاب شده</th>
                                </tr>
                                <tr>
                                    <td>متن دسته بندی</td>
                                    <td><input type="text" name="category" id="category" value="<?php if (isset($firstCat[0]['name'])) echo $firstCat[0]['name'] ?>"></td>
                                    <td>----</td>
                                </tr>
                                <tr>
                                    <td>انتخاب دسته بندی</td>
                                    <td>
                                        <input type="text" id="cat_id" name="cat_id" list="Category" value="<?php if (isset($firstCat[0]['cat_id'])) echo $firstCat[0]['cat_id'] ?>">
                                        <datalist id="Category">
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
                                            <?php } ?>
                                        </datalist>
                                    </td>
                                    <td>---</td>
                                </tr>
                                <tr>
                                    <td>پست اول</td>
                                    <td>
                                        <input type="text" id="article1" name="article1" list="article" value="<?php if (isset($firstCat[0]['id'])) echo $firstCat[0]['id'] ?>" onchange="checkName(this,1)">
                                    </td>
                                    <td>
                                        <p id="result1"><?php if (isset($firstCat[0]['title'])) echo $firstCat[0]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست دوم</td>
                                    <td>
                                        <input type="text" id="article2" name="article2" list="article" value="<?php if (isset($firstCat[1]['id'])) echo $firstCat[1]['id'] ?>" onchange="checkName(this,2)">
                                    </td>
                                    <td>
                                        <p id="result2"><?php if (isset($firstCat[1]['title'])) echo $firstCat[1]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست سوم</td>
                                    <td>
                                        <input type="text" id="article3" name="article3" list="article" value="<?php if (isset($firstCat[2]['id'])) echo $firstCat[2]['id'] ?>" onchange="checkName(this,3)">
                                    </td>
                                    <td>
                                        <p id="result3"><?php if (isset($firstCat[2]['title'])) echo $firstCat[2]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست چهارم</td>
                                    <td>
                                        <input type="text" id="article4" name="article4" list="article" value="<?php if (isset($firstCat[3]['id'])) echo $firstCat[3]['id'] ?>" onchange="checkName(this,4)">
                                    </td>
                                    <td>
                                        <p id="result4"><?php if (isset($firstCat[3]['title'])) echo $firstCat[3]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست پنجم</td>
                                    <td>
                                        <input type="text" id="article5" name="article5" list="article" value="<?php if (isset($firstCat[4]['id'])) echo $firstCat[4]['id'] ?>" onchange="checkName(this,5)">
                                    </td>
                                    <td>
                                        <p id="result5"><?php if (isset($firstCat[4]['title'])) echo $firstCat[4]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست ششم</td>
                                    <td>
                                        <input type="text" id="article6" name="article6" list="article" value="<?php if (isset($firstCat[5]['id'])) echo $firstCat[5]['id'] ?>" onchange="checkName(this,6)">
                                    </td>
                                    <td>
                                        <p id="result6"><?php if (isset($firstCat[5]['title'])) echo $firstCat[5]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <datalist id="article">
                                    <?php foreach ($articles as $article) { ?>
                                        <option value="<?php echo $article['id'] ?>"><?php echo $article['title']; ?></option>
                                    <?php } ?>
                                </datalist>
                            </table>
                            <tr>
                                <input type="submit" value="ثبت اطلاعات" class="btn btn-outline-info btn-block">
                            </tr>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card card-warning card-outline collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">
                        دسته بندی دوم
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i> باز / بسته
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    <div class="mb-3">
                        <form role="form" method="post" action="https://domain.ir/special-article/store" enctype="multipart/form-data">
                            <table class="table table-hover">
                                <input type="text" name="storeNum" id="storeNum" value="secound" style="display: none;">
                                <tr>
                                    <th>نام بخش</th>
                                    <th>مقدار</th>
                                    <th>عنوان انتخاب شده</th>
                                </tr>
                                <tr>
                                    <td>متن دسته بندی</td>
                                    <td><input type="text" name="category" id="category" value="<?php if (isset($secoundCat[0]['name'])) echo $secoundCat[0]['name'] ?>"></td>
                                    <td>----</td>
                                </tr>
                                <tr>
                                    <td>انتخاب دسته بندی</td>
                                    <td>
                                        <input type="text" id="cat_id" name="cat_id" list="Category" value="<?php if (isset($secoundCat[0]['cat_id'])) echo $secoundCat[0]['cat_id'] ?>">
                                        <datalist id="Category">
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
                                            <?php } ?>
                                        </datalist>
                                    </td>
                                    <td>---</td>
                                </tr>
                                <tr>
                                    <td>پست اول</td>
                                    <td>
                                        <input type="text" id="article1" name="article1" list="article" value="<?php if (isset($secoundCat[0]['id'])) echo $secoundCat[0]['id'] ?>" onchange="checkName(this,7)">
                                    </td>
                                    <td>
                                        <p id="result7"><?php if (isset($secoundCat[0]['title'])) echo $secoundCat[0]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست دوم</td>
                                    <td>
                                        <input type="text" id="article2" name="article2" list="article" value="<?php if (isset($secoundCat[1]['id'])) echo $secoundCat[1]['id'] ?>" onchange="checkName(this,8)">
                                    </td>
                                    <td>
                                        <p id="result8"><?php if (isset($secoundCat[1]['title'])) echo $secoundCat[1]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست سوم</td>
                                    <td>
                                        <input type="text" id="article3" name="article3" list="article" value="<?php if (isset($secoundCat[2]['id'])) echo $secoundCat[2]['id'] ?>" onchange="checkName(this,9)">
                                    </td>
                                    <td>
                                        <p id="result9"><?php if (isset($secoundCat[2]['title'])) echo $secoundCat[2]['title'];
                                                        else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست چهارم</td>
                                    <td>
                                        <input type="text" id="article4" name="article4" list="article" value="<?php if (isset($secoundCat[3]['id'])) echo $secoundCat[3]['id'] ?>" onchange="checkName(this,10)">
                                    </td>
                                    <td>
                                        <p id="result10"><?php if (isset($secoundCat[3]['title'])) echo $secoundCat[3]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست پنجم</td>
                                    <td>
                                        <input type="text" id="article5" name="article5" list="article" value="<?php if (isset($secoundCat[4]['id'])) echo $secoundCat[4]['id'] ?>" onchange="checkName(this,11)">
                                    </td>
                                    <td>
                                        <p id="result11"><?php if (isset($secoundCat[4]['title'])) echo $secoundCat[4]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست ششم</td>
                                    <td>
                                        <input type="text" id="article6" name="article6" list="article" value="<?php if (isset($secoundCat[5]['id'])) echo $secoundCat[5]['id'] ?>" onchange="checkName(this,12)">
                                    </td>
                                    <td>
                                        <p id="result12"><?php if (isset($secoundCat[5]['title'])) echo $secoundCat[5]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <datalist id="article">
                                    <?php foreach ($articles as $article) { ?>
                                        <option value="<?php echo $article['id'] ?>"><?php echo $article['title']; ?></option>
                                    <?php } ?>
                                </datalist>
                            </table>
                            <tr>
                                <input type="submit" value="ثبت اطلاعات" class="btn btn-outline-warning btn-block">
                            </tr>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card card-danger card-outline collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">
                        دسته بندی سوم
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-plus"></i> باز / بسته
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                    <div class="mb-3">
                        <form role="form" method="post" action="https://domain.ir/special-article/store" enctype="multipart/form-data">
                            <table class="table table-hover">
                                <input type="text" name="storeNum" id="storeNum" value="third" style="display: none;">
                                <tr>
                                    <th>نام بخش</th>
                                    <th>مقدار</th>
                                    <th>عنوان انتخاب شده</th>
                                </tr>
                                <tr>
                                    <td>متن دسته بندی</td>
                                    <td><input type="text" name="category" id="category" value="<?php if (isset($thirdCat[0]['name'])) echo $thirdCat[0]['name'] ?>"></td>
                                    <td>----</td>
                                </tr>
                                <tr>
                                    <td>انتخاب دسته بندی</td>
                                    <td>
                                        <input type="text" id="cat_id" name="cat_id" list="Category" value="<?php if (isset($thirdCat[0]['cat_id'])) echo $thirdCat[0]['cat_id'] ?>">
                                        <datalist id="Category">
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
                                            <?php } ?>
                                        </datalist>
                                    </td>
                                    <td>---</td>
                                </tr>
                                <tr>
                                    <td>پست اول</td>
                                    <td>
                                        <input type="text" id="article1" name="article1" list="article" value="<?php if (isset($thirdCat[0]['id'])) echo $thirdCat[0]['id'] ?>" onchange="checkName(this,13)">
                                    </td>
                                    <td>
                                        <p id="result13"><?php if (isset($thirdCat[0]['title'])) echo $thirdCat[0]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست دوم</td>
                                    <td>
                                        <input type="text" id="article2" name="article2" list="article" value="<?php if (isset($thirdCat[1]['id'])) echo $thirdCat[1]['id'] ?>" onchange="checkName(this,14)">
                                    </td>
                                    <td>
                                        <p id="result14"><?php if (isset($thirdCat[1]['title'])) echo $thirdCat[1]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست سوم</td>
                                    <td>
                                        <input type="text" id="article3" name="article3" list="article" value="<?php if (isset($thirdCat[2]['id'])) echo $thirdCat[2]['id'] ?>" onchange="checkName(this,15)">
                                    </td>
                                    <td>
                                        <p id="result15"><?php if (isset($thirdCat[2]['title'])) echo $thirdCat[2]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست چهارم</td>
                                    <td>
                                        <input type="text" id="article4" name="article4" list="article" value="<?php if (isset($thirdCat[3]['id'])) echo $thirdCat[3]['id'] ?>" onchange="checkName(this,16)">
                                    </td>
                                    <td>
                                        <p id="result16"><?php if (isset($thirdCat[3]['title'])) echo $thirdCat[3]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست پنجم</td>
                                    <td>
                                        <input type="text" id="article5" name="article5" list="article" value="<?php if (isset($thirdCat[4]['id'])) echo $thirdCat[4]['id'] ?>" onchange="checkName(this,17)">
                                    </td>
                                    <td>
                                        <p id="result17"><?php if (isset($thirdCat[4]['title'])) echo $thirdCat[4]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>پست ششم</td>
                                    <td>
                                        <input type="text" id="article6" name="article6" list="article" value="<?php if (isset($thirdCat[5]['id'])) echo $thirdCat[5]['id'] ?>" onchange="checkName(this,18)">
                                    </td>
                                    <td>
                                        <p id="result18"><?php if (isset($thirdCat[5]['title'])) echo $thirdCat[5]['title'];
                                                            else echo "انتخاب نشده"; ?></p>
                                    </td>
                                </tr>
                                <datalist id="article">
                                    <?php foreach ($articles as $article) { ?>
                                        <option value="<?php echo $article['id'] ?>"><?php echo $article['title']; ?></option>
                                    <?php } ?>
                                </datalist>
                            </table>
                            <tr>
                                <input type="submit" value="ثبت اطلاعات" class="btn btn-outline-danger btn-block">
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function checkName(event, order) {
                    let val = event.value;
                    if (val == "" || val == " ") {
                        document.getElementById("result" + order).innerHTML = "<p style='color:red;'>انتخاب نشده</p>";
                    } else {
                        document.getElementById("result" + order).innerHTML = "<p style='color:green;'>انتخاب شده</p>";
                    }
                };
            </script>
        </div>
    </section>
        <!-- /.content -->
    </div>
    <script>
        let active = document.getElementById("home-session2");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>