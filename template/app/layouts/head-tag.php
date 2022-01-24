<!DOCTYPE html>
<html class="no-js" lang="fa">
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
};
include 'jdf.php';
$username = "";
if (isset($_SESSION['user'])) {
    $username = $db->select("SELECT * FROM `users` WHERE(`id` = '" . $_SESSION['user'] . "') ;")->fetch();
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index,follow">
    <title><?= $headerTitle ?></title>
    <meta name="description"
          content="توضیحات">
    <meta name="keywords"
          content="تگ">
    <meta property="og:site_name" content="نام وبسایت">
    <meta property="og:title" content="<?= $headerTitle ?>">
    <meta property="og:url" content="https://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:description"
          content="توضیحات">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fa_IR">
    <meta name="twitter:site" content="نام وبسایت">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= $headerTitle ?>">
    <meta name="twitter:description"
          content="توضیحات">
    <meta name="twitter:url" content="https://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:image" content="http://domain.ir/public/app/img/favicon.png">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://domain.ir/public/app/img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/css/main.css">
    <!-- Bootstrap rtl CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/css/bootstrap-rtl.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/css/animate.min.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="../../../public/app/css/font-awesome.min.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://domain.ir/public/app/vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/css/meanmenu.min.css">
    <!-- Nivo Slider CSS-->
    <link rel="stylesheet" href="https://domain.ir/public/app/vendor/slider/css/nivo-slider.css"
          type="text/css">
    <link rel="stylesheet" href="https://domain.ir/public/app/vendor/slider/css/preview.css" type="text/css"
          media="screen">
    <!-- Magnific CSS -->
    <link rel="stylesheet" type="text/css" href="https://domain.ir/public/app/css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/css/hover-min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://domain.ir/public/app/css/style.css">
    <!-- For IE -->
    <link rel="stylesheet" type="text/css" href="https://domain.ir/public/app/css/ie-only.css">
    <!-- Modernizr Js -->
    <script src="https://domain.ir/public/app/js/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!-- Preloader End Here -->
<div id="wrapper">
    <!-- Header Area Start Here -->
    <header>
        <div id="header-layout2" class="header-style7">
            <div class="header-top-bar">
                <div class="top-bar-top bg-primarytextcolor border-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <ul class="news-info-list text-center--md">
                                    <?php if (isset($_SESSION['user'])) { ?>
                                        <li>
                                            <i class="fa fa-user" aria-hidden="true"></i>خوش آمدید
                                            "<?= $username['username'] ?>"
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <i class="fa fa-user" aria-hidden="true"></i>شما وارد نشده اید
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block">
                                <ul class="header-social">
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
                                            <img src="https://domain.ir/public/app/img/social-logo/telegram-s.png"
                                                 alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://instagram.com/username">
                                            <img src="https://domain.ir/public/app/img/social-logo/instagram-s.png"
                                                 alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-menu-area bg-body border-bottom" id="sticker">
                <div class="container">
                    <div class="row no-gutters d-flex align-items-center">
                        <div class="col-lg-2 col-md-2 d-none d-lg-block">
                            <div class="logo-area">
                                <a href="https://domain.ir" class="img-fluid">
                                    <img src="https://domain.ir/public/app/img/logo/logo.png" alt="logo"
                                         class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block position-static min-height-none">
                            <div class="ne-main-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <?php foreach ($menus as $menu) { ?>
                                            <li><?php if ($menu['parent_id'] == null) { ?>
                                                    <a href="<?= $menu['url'] ?>"><?= $menu['name'] ?></a>
                                                <?php } ?>
                                                <?php if ($menu['submenu_count'] > 0) { ?>
                                                    <ul class="ne-dropdown-menu">
                                                        <?php foreach ($submenus as $submenu) {
                                                            if ($submenu['parent_id'] == $menu['id']) {
                                                                ?>
                                                                <li>
                                                                    <a href="<?= $submenu['url'] ?>"><?= $submenu['name'] ?></a>
                                                                </li>
                                                            <?php }
                                                        } ?>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 text-right position-static">
                            <div class="header-action-item on-mobile-fixed">
                                <ul>
                                    <li>
                                        <form id="top-search-form" class="header-search-dark"
                                              action="https://domain.ir/search" method="post">
                                            <input type="text" class="search-input" placeholder="جستجو ..." required=""
                                                   style="display: none;" name="search" id="search"
                                                   onfocusin="changeSub()">
                                            <button class="search-button" id="searchButton">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <script>
                                        function changeSub() {
                                            let button = document.getElementById("searchButton");
                                            button.classList.remove("search-button");
                                            button.setAttribute('type', 'submit');
                                        }
                                    </script>
                                    <li class="login_button">
                                        <?php if (!isset($_SESSION['user'])) { ?>
                                            <a href="https://domain.ir/panel" class="login-btn"><i class="fa fa-user"
                                                                                                   aria-hidden="true"></i><span
                                                        class="hidden-xs" style="color: black;">ورود</span></a>
                                        <?php } else { ?>
                                            <div id="side-menu-trigger"
                                                 class="offcanvas-menu-btn offcanvas-btn-repoint">
                                                <a href="#" class="menu-bar">
                                                    <img src="https://domain.ir/public/app/img/accountLogo.png"
                                                         style="background-color: white;border-radius: 100%;">
                                                </a>
                                                <a href="#" class="menu-times close">
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div>
                                        <?php } ?>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End Here -->