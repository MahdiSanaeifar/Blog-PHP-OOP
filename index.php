<?php

//display error
define('DISPLAY_ERROR', true);
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain() . '/');

if (DISPLAY_ERROR) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

require_once("admin-dashboard/Category.class.php");
require_once("admin-dashboard/Article.class.php");
require_once("admin-dashboard/WebSetting.class.php");
require_once("admin-dashboard/User.class.php");
require_once("admin-dashboard/Auth.class.php");
require_once("admin-dashboard/CreateDB.php");
require_once("admin-dashboard/Menu.class.php");
require_once("admin-dashboard/Home.class.php");
require_once("admin-dashboard/Comment.class.php");
require_once("admin-dashboard/Dashboard.class.php");
require_once("admin-dashboard/ArticleImages.class.php");
require_once("admin-dashboard/Slider.class.php");
require_once("admin-dashboard/SpecialArticle.class.php");
require_once("admin-dashboard/SideBanner.class.php");

use AdminDashboard\Category;
use AdminDashboard\ArticleImages;
use AdminDashboard\User;
use AdminDashboard\Auth;
use AdminDashboard\WebSetting;
use AdminDashboard\Slider;
use AdminDashboard\SpecialArticle;
use AdminDashboard\SideBanner;
use AdminDashboard\Article;
use AdminDashboard\Comment;
use AdminDashboard\Menu;
use AdminDashboard\Dashboard;
use  DataBase\CreateDB;
use  DataBase\Home;

/*
 * to run database sql
 */
//$createDB= new CreateDB();
//$createDB->run();
//die();

//helpers
function asset($src)
{
    $domain = trim(currentDomain(), '/ ');
    $src = $domain . '/' . trim($src, '/ ');
    return $src;
}

function url($url)
{
    $domain = trim(currentDomain(), '/ ');
    $url = $domain . '/' . trim($url, '/ ');
    return $url;
}

function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}

function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}


function uri($uri, $class, $method, $requestMethod = 'GET')
{
    $values = array();
    $subURIs = explode('/', $uri);
    $request_uri = array_slice(explode('/', $_SERVER['REQUEST_URI']), 1);

    if ($request_uri[0] == "" or $request_uri[0] == "/")
        $request_uri[0] = "home";

    $braek = false;
    if (sizeof($request_uri) == sizeof($subURIs) and $_SERVER['REQUEST_METHOD'] == $requestMethod) {
        foreach (array_combine($subURIs, $request_uri) as $subURI => $request) {
            if ($subURI[0] == "{" and $subURI[strlen($subURI) - 1] == "}") {
                array_push($values, $request);
            } else {
                if ($subURI != $request) {
                    $braek = true;
                    break;
                }
            }
        }

    } else $braek = true;

    if (!$braek) {
        $class = "AdminDashboard\\" . $class;
        $object = new $class;
        if (sizeof($values) > 0)
            if ($requestMethod == 'POST')
                if (isset($_FILES)) {
                    $request = array_merge($_POST, $_FILES);
                    $object->$method($request, implode(',', $values));
                } else
                    $object->$method($_POST, implode(',', $values));
            else
                $object->$method(implode(',', $values));
        else
            if ($requestMethod == 'POST')
                if (isset($_FILES)) {
                    $request = array_merge($_POST, $_FILES);
                    $object->$method($request);
                    exit();
                } else
                    $object->$method($_POST);
            else
                $object->$method();
        exit();
    }
}


//Dashboard
uri('admin', 'Dashboard', 'index');

//category
uri('category', 'Category', 'index');
uri('category/show/{id}', 'Category', 'show');
uri('category/create', 'Category', 'create');
uri('category/store', 'Category', 'store', 'POST');
uri('category/edit/{id}', 'Category', 'edit');
uri('category/update/{id}', 'Category', 'update', 'POST');
uri('category/delete/{id}', 'Category', 'delete');

//article
uri('article', 'Article', 'index');
uri('article/show/{id}', 'Article', 'show');
uri('article/create', 'Article', 'create');
uri('article/store', 'Article', 'store', 'POST');
uri('article/edit/{id}', 'Article', 'edit');
uri('article/update/{id}', 'Article', 'update', 'POST');
uri('article/delete/{id}', 'Article', 'delete');

//menu
uri('menu', 'Menu', 'index');
uri('menu/show/{id}', 'Menu', 'show');
uri('menu/create', 'Menu', 'create');
uri('menu/store', 'Menu', 'store', 'POST');
uri('menu/edit/{id}', 'Menu', 'edit');
uri('menu/update/{id}', 'Menu', 'update', 'POST');
uri('menu/delete/{id}', 'Menu', 'delete');

//users
uri('user', 'User', 'index');
uri('user/permission/{id}', 'User', 'permission');
uri('user/edit/{id}', 'User', 'edit');
uri('user/update/{id}', 'User', 'update', 'POST');
uri('user/show/{id}', 'User', 'show');
uri('user/delete/{id}', 'User', 'delete');
uri('user/create', 'User', 'create');
uri('user/store', 'User', 'store', 'POST');

//web setting
uri('web-setting', 'WebSetting', 'index');
uri('web-setting/set', 'WebSetting', 'set');
uri('web-setting/store', 'WebSetting', 'store', 'POST');

//Auth
uri('login', 'Auth', 'login');
uri('check-login', 'Auth', 'checkLogin', 'POST');
uri('register', 'Auth', 'register');
uri('register/store', 'Auth', 'registerStore', 'POST');
uri('logout', 'Auth', 'logout');

//Home
uri('home', 'Home', 'index');
uri('contact', 'Home', 'contact');
uri('show-article/{id}', 'Home', 'show');
uri('show-category/{id}', 'Home', 'category');
uri('show-category/{id}/{page}', 'Home', 'categoryPage');
uri('comment-store', 'Home', 'commentStore', 'POST');
uri('search', 'Home', 'searchBar', 'POST');
uri('news/{page}', 'Home', 'news');
uri('archive/{page}', 'Home', 'archive');
uri('landing', 'Home', 'landing');

//Comments
uri('comment', 'Comment', 'index');
uri('comment/show/{id}', 'Comment', 'show');
uri('comment/approved/{id}', 'Comment', 'approved');


//gallery
uri('gallery', 'ArticleImages', 'index');
uri('gallery/delete/{id}', 'ArticleImages', 'delete');
uri('gallery/create/{id}', 'ArticleImages', 'create');
uri('gallery/store', 'ArticleImages', 'store', 'POST');
uri('gallery/edit/{id}', 'ArticleImages', 'edit');

//slider
uri('slider', 'Slider', 'index');
uri('slider-video', 'Slider', 'IndexVideo');
uri('slider/store-text', 'Slider', 'StoreTxt', 'POST');
uri('slider/store-image', 'Slider', 'StoreImage', 'POST');
uri('slider/store-video', 'Slider', 'StoreVideo', 'POST');

//special article
uri('special-article', 'SpecialArticle', 'index');
uri('special-article/store', 'SpecialArticle', 'store', 'POST');

//side banner
uri('side-banner', 'SideBanner', 'index');
uri('side-banner/store', 'SideBanner', 'store', 'POST');

//panel
uri('panel', 'Auth', 'panel');
uri('panel/update/{id}', 'Auth', 'userUpdate', 'POST');

include "template/app/404.php";
exit();