<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/head-tag.php"));
?>
<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area" style="background-image: url('https://domain.ir/public/app/img/banner/banner-2.png');">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>معرفی</h1>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- Contact Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">درباره ما</div>
                </div>
				<h2 class="title-semibold-dark size-xl"><strong>معرفی نام وبسایت</strong></h2>
				<p class="size-lg mb-40" style="text-align: justify;"><span lang="AR-SA" style="font-size: 15pt;">توضیحات</p>
                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">اطلاعات</div>
                </div>

				<ul class="address-info" loading="lazy">
					<iframe src="url" style="border:0;width:100%;height:310px;" allowfullscreen=""></iframe>
				</ul>
                <ul class="address-info">
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>آدرس</li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i><span class="ltr_text">شماره تماس</span></li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>user@yahoo.com</li>
                    <li>
                        <i class="fa fa-fax" aria-hidden="true"></i><span class="ltr_text"><a class="btn btn-success btn-lg" href="tel::phone">تماس</a></span></li>
                </ul>
                <div class="topic-border color-cod-gray mb-30">
                    <div class="topic-box-lg color-cod-gray">با ما در ارتباط باشید</div>
                </div>
                <form id="contact-form" class="contact-form">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" placeholder="نام" class="form-control" name="name" id="form-subject" data-error="فیلد نام الزامی است" required="" Disabled>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="email" placeholder="ایمیل" class="form-control ltr_input" name="email" id="form-email" data-error="فیلد ایمیل الزامی است" required="" Disabled>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea placeholder="پیام" class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="فیلد پیام الزامی است" required="" Disabled></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12">
                                <div class="form-group mb-none">
                                    <button type="submit" class="btn-ftg-ptp-56" Disabled>ارسال پیام</button>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12">
                                <div class="form-response"></div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <?php
            require_once(realpath(dirname(__FILE__) . "/../app/layouts/sidebar.php"));
            ?>
        </div>
    </div>
</section>
<!-- Contact Page Area End Here -->
<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>
