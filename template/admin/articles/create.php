<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
<script src="https://cdn.tiny.cloud/1/zn2rn867fzgxtndy3suf1etouqs1nuwdsrouv6bxr19j017c/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
<script src="https://unpkg.com/jalaali-js/dist/jalaali.min.js"></script>
<script>
    window.addEventListener("load", e => {
        // slide toggle for date session
        $("#toggle").click(function () {
            $(".date-form").slideToggle();
        });
        // clear inputs value
        $("#resetDate").click(function () {
            clearDate();
        });
        // remove name and id attribute
        $("#inputDate").click(function () {
            chnageDateStatus();
        });
        // set today date to input[Date]
        document.getElementById("created_at").value = new Date().toDateInputValue();
        chnageDateStatus();
    });


    function chnageDateStatus() {
        let Ydate = $(".Ydate");
        let Mdate = $(".Mdate");
        let Ddate = $(".Ddate");
        let removeBtn = $("#resetDate");
        if (Ydate.attr("disabled") && Mdate.attr("disabled") && Ddate.attr("disabled")) {
            Ydate.removeAttr("disabled");
            Mdate.removeAttr("disabled");
            Ddate.removeAttr("disabled");
            removeBtn.removeClass("disabled");
            $("#statusDate").text("تاریخ فعال");
            console.log("has attr");

        } else {
            removeBtn.addClass('disabled');
            Ydate.prop('disabled', true);
            Mdate.prop('disabled', true);
            Ddate.prop('disabled', true);
            $("#statusDate").text("تاریخ غیر فعال");
            console.log("no attr");
        }
        let createdAtInput = $(".created_at");
        if (createdAtInput.attr("name") && createdAtInput.attr("id")) {
            createdAtInput.removeAttr("name");
            createdAtInput.removeAttr("id");
        } else {
            createdAtInput.attr('name', 'created_at');
            createdAtInput.attr('id', 'created_at');
        }
    }

    function sendData() {
        let endpoint = 'https://farsicalendar.com/api/details/745742';
        $.ajax({
            url: endpoint,
            contentType: "application/json",
            dataType: 'json',
            success: function (result) {
                console.log(result['values']);
            }
        });
    }

    function convertDate() {
        let Ydate = $(".Ydate").val();
        let Mdate = $(".Mdate").val();
        let Ddate = $(".Ddate").val();
        if (Ydate !== "" && Mdate !== "" && Ddate !== "") {
            // create new input[DATE] value
            let dateInputVal = jalaali.toGregorian(parseInt(Ydate), parseInt(Mdate), parseInt(Ddate));
            let year = dateInputVal[Object.keys(dateInputVal)[0]];
            let mounth = dateInputVal[Object.keys(dateInputVal)[1]];
            let day = dateInputVal[Object.keys(dateInputVal)[2]];
            let finalDateInputVal = parseInt(year) + "-" + ("0" + parseInt(mounth)).slice(-2) + "-" + ("0" + parseInt(day)).slice(-2);
            $("input[type='date']").val(finalDateInputVal);

        } else {

        }
    }

    function clearDate() {
        // resat inputs value
        $(".Ydate").val("1400");
        $(".Mdate").val("1");
        $(".Ddate").val("1");
        document.getElementById("created_at").value = new Date().toDateInputValue();
    }

    Date.prototype.toDateInputValue = function () {
        let datastring = this.getFullYear() + "-" + ("0" + (this.getMonth() + 1)).slice(-2) + "-" + ("0" + this.getDate()).slice(-2);
        return datastring;
    };
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>افزودن پست جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">افزودن پست جدید</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">لطفا اطلاعات خواسته شده را وارد نمایید</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" action="https://domain.ir/article/store"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           placeholder="عنوان  ...">
                                </div>
                                <div class="form-group">
                                    <label>انتشار یا عدم انتشار</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="enable">انتشار</option>
                                        <option value="disable">عدم انتشار</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>دسته بندی</label>
                                    <select class="form-control" id="cat_id" name="cat_id">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>نوع پست</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="simple">ساده</option>
                                        <option value="video">ویدئو</option>
                                        <option value="picture">عکس</option>
                                        <option value="voice">صوت</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>موسسه</label>
                                    <select class="form-control" id="location" name="location">
                                        <option value="loc1">loc1</option>
                                        <option value="loc3">loc2</option>
                                        <option value="loc2">loc3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">عکس کاور</label>
                                    <input type="file" id="image" name="image"
                                           class="form-control-file btn btn-primary btn-file">
                                </div>

                                <div class="form-group">
                                    <label>کد مورد نظر</label>
                                    <input type="text" id="costumecode" name="costumecode" class="form-control"
                                           placeholder="کد مورد نظر  ...">
                                </div>


                                <a id="toggle" class="btn btn-outline-warning my-2 btn-block">انتخاب تاریخ قدیم</a>

                                <div class="form-group date-form" style="display: none;">
                                    <label>تاریخ انتشار</label>
                                    <div class="row form-group container">
                                        <input type="number" class="col form-control Ydate" placeholder="سال"
                                               oninput="convertDate()" value="1400">
                                        <input type="number" class="col form-control Mdate" placeholder="ماه"
                                               oninput="convertDate()" value="1" min="1" max="12">
                                        <input type="number" class="col form-control Ddate" placeholder="روز"
                                               oninput="convertDate()" value="1" min="1" max="31">
                                        <a id="inputDate" class="btn btn-outline-info col-2">فعال/غیرفعال</a>
                                        <a id="resetDate" class="btn btn-outline-danger col-1">حذف</a>
                                    </div>
                                    <div class="row form-group container">
                                        <input type="date" id="created_at" name="created_at"
                                               class="form-control col-9 created_at">
                                        <p class="col-3 btn-outline-warning" id="statusDate"></p>
                                    </div>
                                </div>

                                <div class="card-header bg-primary">
                                    <h3 class="card-title">نوشتاری</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>توضیحات کوتاه</label>
                                        <textarea class="form-control" rows="4" id="summary" name="summary"
                                                  placeholder="خلاصه ای از توضیحات  ..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>توضیحات تکمیلی</label>
                                        <textarea class="form-control" rows="4" id="body" name="body"
                                                  placeholder="توضیحات کامل ..."></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">ثبت اطلاعات</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
    <script>
        let active = document.getElementById("posts");
        active.classList.add("active");
    </script>
    <script>
        let counter = 1;

        function addImageIput() {
            $("#imageInputs").append("<tr id='trImage" + counter + "'>" +
                "<td>" + counter + "</td>" +
                "<td><input type='file' class='btn btn-primary btn-file' name=" + "Image" + counter + " id=" + "Image" + counter + "></td>" +
                "<td><button class='btn btn-outline-warning' id='rmImage" + counter + "'>حذف</button></td>" +
                "</tr>");
            $("#rmImage" + counter).click(function () {
                $(this).closest("tr").remove();
            });
            counter++;
        }
    </script>

    <?php
    require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
    ?>
