<!-- Footer Area Start Here -->
<footer>
    <div class="footer-area-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h2 class="title-bold-light title-bar-left text-uppercase">مطالب پربازدید</h2>
                        <ul class="most-view-post">
                            <?php foreach ($popularArticles as $popularArticle) { ?>
                                <li>
                                    <div class="media">
                                        <a href="https://domain.ir/show-article/<?= $popularArticle['id'] ?>">
                                            <img src="https://domain.ir/<?= $popularArticle['image'] ?>"
                                                 width="100px" alt="post" class="img-fluid" loading="lazy">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="title-medium-light size-md mb-10">
                                                <a href="https://domain.ir/show-article/<?= $popularArticle['id'] ?>"><?= $popularArticle['title'] ?></a>
                                            </h3>
                                            <div class="post-date-light">
                                                <ul>
                                                    <li>
                                                                <span>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </span><?= gregorian_to_jalali(date("Y", strtotime($popularArticle['created_at'])), date("m", strtotime($popularArticle['created_at'])), date("d", strtotime($popularArticle['created_at'])), '/'); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h2 class="title-bold-light title-bar-left text-uppercase">دسته های محبوب</h2>
                        <ul class="popular-categories">
                            <?php foreach ($categories as $category) { ?>
                                <li>
                                    <a href="https://domain.ir/show-category/<?= $category['id'] ?>"><?= $category['name'] ?>
                                        <span><?= $category['categories_count'] ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <div class="footer-box">
                        <h2 class="title-bold-light title-bar-left text-uppercase">گالری مطالب</h2>
                        <ul class="post-gallery shine-hover ">
                            <?php foreach ($recentGallery as $footerGallery) { ?>
                                <li>
                                    <a href="#">
                                        <figure style="width:100px;height:57px;">
                                            <img src="https://domain.ir/<?= $footerGallery['image'] ?>"
                                                 width="100px" alt="post" class="img-fluid" loading="lazy">
                                        </figure>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="https://domain.ir" class="footer-logo img-fluid">
                        <img src="https://domain.ir/public/app/img/logo.png" alt="logo" class="img-fluid"
                             loading="lazy">
                    </a>
                    <p style="text-align: justify;font-size: 10px;text-align:center;">
                        توضیحات وبسایت
                    </p>
                    <ul class="footer-social">
                        <li>
                            <a href="https://www.aparat.com/username">
                                <img src="https://domain.ir/public/app/img/social-logo/aparat-s.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://gap.im/username">
                                <img src="https://domain.ir/public/app/img/social-logo/gap-s.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://eitaa.com/username">
                                <img src="https://domain.ir/public/app/img/social-logo/eitaa-s.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://rubika.ir/username">
                                <img src="https://domain.ir/public/app/img/social-logo/robika-s.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://sapp.ir/username">
                                <img src="https://domain.ir/public/app/img/social-logo/sorush-s.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://t.me/username">
                                <img src="https://domain.ir/public/app/img/social-logo/telegram-s.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/username">
                                <img src="https://domain.ir/public/app/img/social-logo/instagram-s.png" alt="">
                            </a>
                        </li>
                    </ul>
                    <p>تمامی حقوق این سایت متعلق به نام وبسایت می باشد.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End Here -->
<!-- Modal Start-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="title-login-form">ورود به حساب کاربری</div>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form action="https://domain.ir/check-login" method="post">
                        <?php
                        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
                        if ($httpReferer == 'https://domain.ir/login') {
                            ?>
                            <div><small class="form-text text-danger">مشکلی در ورود شما وجود دارد</small></div><?php
                        } ?>
                        <label>کدملی *</label>
                        <input type="number" id="idcode" name="idcode" class="form-control"
                               placeholder="کد ملی" onkeyup="onlyNumberKey(this)">
                        <script>
                            function onlyNumberKey(event) {
                                // console.log(event.value)
                                let inval = event.value;
                                let lastVal = inval.slice(-1);
                                if (!lastVal.match(/^[0-9]+$/)) {
                                    swal({
                                        text: "لطفا کیبورد خود را در حالت انگلیسی قرار بدهید",
                                        button: "متوجه شدم",
                                    });
                                    event.value = "";
                                }
                                ;
                            };
                        </script>
                        <label>رمز عبور *</label>
                        <input type="password" class="form-control" placeholder="رمز عبور" id="password"
                               name="password" required="">
                        <button type="submit" value="Login" required="">ورود</button>
                        <button class="form-cancel" type="submit" value="">انصراف</button>
                        <label class="lost-password">
                            <a href="https://domain.ir/register">عضویت در وبسایت</a>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End-->
<!-- Offcanvas Menu Start -->
<div id="offcanvas-body-wrapper" class="offcanvas-body-wrapper">
    <div id="offcanvas-nav-close" class="offcanvas-nav-close offcanvas-menu-btn">
        <a href="#" class="menu-times re-point">
            <span></span>
            <span></span>
        </a>
    </div>
    <div class="offcanvas-main-body">
        <ul id="accordion" class="offcanvas-nav panel-group">
            <li>
                <a>
                    <i class="fa fa-user" aria-hidden="true"></i><?= $username['username'] ?></a>
            </li>
            <?php if (isset($username['username']) && $username['permission'] == 'admin') { ?>
                <li>
                    <a href="https://domain.ir/admin">
                        <i class="fa fa-edit" aria-hidden="true"></i>ورود به پنل مدیریت</a>
                </li>
            <?php } ?>
            <li>
                <a href="https://domain.ir/logout">
                    <i class="fa fa-user-times" aria-hidden="true"></i>خروج از حساب</a>
            </li>
        </ul>
    </div>
</div>


<!-- Offcanvas Menu End -->
</div>
<!-- jquery-->
<script src="https://domain.ir/public/app/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<!-- Plugins js -->
<script src="https://domain.ir/public/app/js/plugins.js" type="text/javascript"></script>
<!-- Popper js -->
<script src="https://domain.ir/public/app/js/popper.js" type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="https://domain.ir/public/app/js/bootstrap.min.js" type="text/javascript"></script>
<!-- WOW JS -->
<script src="https://domain.ir/public/app/js/wow.min.js"></script>
<!-- Owl Cauosel JS -->
<script src="https://domain.ir/public/app/vendor/OwlCarousel/owl.carousel.min.js"
        type="text/javascript"></script>
<!-- Meanmenu Js -->
<script src="https://domain.ir/public/app/js/jquery.meanmenu.min.js" type="text/javascript"></script>
<!-- Srollup js -->
<script src="https://domain.ir/public/app/js/jquery.scrollUp.min.js" type="text/javascript"></script>
<!-- jquery.counterup js -->
<script src="https://domain.ir/public/app/js/jquery.counterup.min.js"></script>
<script src="https://domain.ir/public/app/js/waypoints.min.js"></script>
<!-- Nivo slider js -->
<script src="https://domain.ir/public/app/vendor/slider/js/jquery.nivo.slider.js"
        type="text/javascript"></script>
<script src="https://domain.ir/public/app/vendor/slider/home.js" type="text/javascript"></script>
<!-- Isotope js -->
<script src="https://domain.ir/public/app/js/isotope.pkgd.min.js" type="text/javascript"></script>
<!-- Magnific Popup -->
<script src="https://domain.ir/public/app/js/jquery.magnific-popup.min.js"></script>
<!-- Ticker Js -->
<script src="https://domain.ir/public/app/js/ticker.js" type="text/javascript"></script>
<!-- Custom Js -->
<script src="https://domain.ir/public/app/js/main.js" type="text/javascript"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>