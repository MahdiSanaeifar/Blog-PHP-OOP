<!doctype html>
<?php
if (!isset($db)) {
    $db = new DataBase\DataBase();
}
include 'jdf.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>مدیریت وبسایت نام وبسایت</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://domain.ir/public/app/img/favicon.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../public/admin/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet"
          href="https://domain.ir/public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="https://domain.ir/public/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="https://domain.ir/public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="https://domain.ir/public/admin/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="../../../public/admin/dist/css/custom-style.css">
</head>
<?php
$unseenComments = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status` = 'unseen' ;")->fetch();
$username = $db->select("SELECT * FROM `users` WHERE(`id` = '" . $_SESSION['user'] . "') ;")->fetch();
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>

        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link disabled" data-toggle="dropdown" href="#">
                    <i class="fa fa-comments-o"></i>
                    <?php if ($unseenComments['COUNT(*)']) { ?>
                        <span class="badge badge-danger navbar-badge">
                       <?= $unseenComments['COUNT(*)'] ?>
						</span>
                    <?php } ?>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="https://domain.ir/public/app/img/accountLogo.png"
                                 alt="User Avatar" class="img-size-50 ml-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?= $username['username'] ?>
                                    <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">با من تماس بگیر لطفا...</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="https://domain.ir/public/admin/dist/img/user8-128x128.jpg"
                                 alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    پیمان احمدی
                                    <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">من پیامتو دریافت کردم</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link disabled" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i>
                    <!--<span class="badge badge-warning navbar-badge">15</span>-->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                        <span class="float-left text-muted text-sm">3 دقیقه</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                        <span class="float-left text-muted text-sm">12 ساعت</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                        <span class="float-left text-muted text-sm">2 روز</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="domain.ir" class="brand-link">
            <img src="https://domain.ir/public/admin/dist/img/logo/logo.jpg" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <?php if (isset($username['image'])) { ?>
                        <div class="image">
                            <img src="https://domain.ir/<?= $username['image'] ?>"
                                 class="img-circle elevation-2" alt="User Image">
                        </div>
                    <?php } ?>
                    <div class="info">
                        <a href="" class="d-block">اپراتور: <?= $username['username'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="https://domain.ir/admin" class="nav-link" id="dashbourd">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    داشبورد
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">مدیریت</li>
                        <li class="nav-item">
                            <a href="https://domain.ir/comment" class="nav-link" id="comment">
                                <i class="nav-icon fa fa-comment"></i>
                                <p>
                                    نظرات کاربران
                                    <?php if ($unseenComments['COUNT(*)']) { ?>
                                        <span class="right badge badge-danger">جدید <?= $unseenComments['COUNT(*)'] ?></span>
                                    <?php } ?>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="posts">
                                <i class="nav-icon fa fa-newspaper-o"></i>
                                <p>
                                    پست ها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="https://domain.ir/article/create" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>افزودن پست جدید</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://domain.ir/article" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>مدیریت پست ها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="menu">
                                <i class="nav-icon fa fa-th-list"></i>
                                <p>
                                    منو
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="https://domain.ir/menu/create" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>افزودن منو جدید</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://domain.ir/menu" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>مدیریت منو ها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="categories">
                                <i class="nav-icon fa fa-object-ungroup"></i>
                                <p>
                                    دسته بندی ها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="https://domain.ir/category/create" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>افزودن دسته بندی جدید</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://domain.ir/category" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>مدیریت دسته بندی ها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="https://domain.ir/user" class="nav-link" id="users">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    کاربران
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">مدیریت صفحه اصلی</li>
                        <li class="nav-item">
                            <a href="https://domain.ir/slider" class="nav-link" id="home-session1">
                                <i class="nav-icon fa fa-image"></i>
                                <p>
                                    اسلایدر های متن و عکس
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://domain.ir/special-article" class="nav-link" id="home-session2">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    دسته بندی های ویژه
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://domain.ir/slider-video" class="nav-link" id="home-session3">
                                <i class="nav-icon fa fa-video-camera"></i>
                                <p>
                                    اسلایدر ویدئو های ویژه
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">سایدبار</li>
                        <li class="nav-item">
                            <a href="https://domain.ir/side-banner" class="nav-link" id="side-banner">
                                <i class="nav-icon fa fa-calendar"></i>
                                <p>
                                    مدیریت بنر
                                    <span class="badge badge-info right">1</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">متفرقه</li>
                        <li class="nav-item">
                            <a href="https://domain.ir/web-setting" class="nav-link" id="websiteSetting">
                                <i class="nav-icon fa fa-gears"></i>
                                <p>تنظیمات سایت</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>