<?php

namespace AdminDashboard;
require_once("Admin.class.php");
require_once(realpath(dirname(__FILE__) . "/DataBase.php"));

use DataBase\DataBase;

class Auth extends Admin
{
    function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        //header title
        $headerTitle = "ورود به وبسایت | نام وبسایت";

        require_once(realpath(dirname(__FILE__) . "/../template/auth/login.php"));
    }

    public function checkLogin($request)
    {
        if (empty($request['idcode']) || empty($request['password'])) {
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE (`idcode` = ?); ", [$request['idcode']])->fetch();
            if ($user != null) {
                if (password_verify($request['password'], $user['password'])) {
                    $_SESSION['user'] = $user['id'];
                    $this->redirect('admin');
                } else {
                    $this->redirectBack();
                }
            } else {
                $this->redirectBack();
            }
        }
    }

    public function register()
    {
        $db = new DataBase();
        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `id` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `id` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `id` DESC LIMIT 0,6 ;')->fetchAll();
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();

        // article
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        //header
        $headerTitle = "عضویت | نام وبسایت";

        require_once(realpath(dirname(__FILE__) . "/../template/auth/register.php"));
    }


    public function registerStore($request)
    {
        if (empty($request['idcode']) || empty($request['idcode'])) {
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE (`idcode` = ?); ", [$request['idcode']])->fetch();
            if ($user != null) {
                $this->redirectBack();
            } else {
                if ($request['cooperation'] == "") {
                    unset($request['cooperation']);
                }

                // create password
                $seed = str_split('abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
                shuffle($seed);
                $rand = '';
                foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];
                $request['password'] = $request['idcode'] . $rand;
                $userPassword = $request['password'];

                $request['password'] = $this->hash($request['password']);
                $lastMembership = $db->select("SELECT membership FROM `users` ORDER BY id DESC LIMIT 1;")->fetch();
                $request['membership'] = $lastMembership['membership'] + 1;
                $db->insert('users', array_keys($request), $request);

                // send SMS & create data
                if ($request['gender'] == "boy") {
                    $gender = "آقای";
                } elseif ($request['gender'] == "girl") {
                    $gender = "خانم";
                }
                $code = $request['membership'];
                $seN1 = $gender . " " . $request['username'];
                $seN2 = "متن پیام";
                $seN3 = "کدعضویت:" . $code;
                $seN4 = " رمزعبور:" . $userPassword;
                $smsContent = $seN1 . $seN2 . $seN3 . "" . $seN4;
                if ($request['phone'][0] == "0") {
                    $smsPhone = ltrim($request['phone'], $request['phone'][0]);;
                } else {
                    $smsPhone = $request['phone'];
                }

                $class = new Auth();
                $class->sendSMS($smsContent, $smsPhone);

                $checkLogin = array('idcode' => $request['idcode'], 'password' => $userPassword);
                $class = new Auth();
                $class->checkLogin($checkLogin);
            }
        }
    }

    public function panel()
    {
        $db = new DataBase();
        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();

        // article
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        //header
        $headerTitle = "پنل کاربری | نام وبسایت";

        //panel
        $isLoggedIn = false;
        if (isset($_SESSION['user'])) {
            $isLoggedIn = true;
            $user = $db->select("SELECT * FROM `users` WHERE(`id` = '" . $_SESSION['user'] . "') ;")->fetch();
            $comments = $db->select("SELECT * FROM `comments` WHERE(`user_id` = '" . $_SESSION['user'] . "') ;")->fetchAll();
        }

        require_once(realpath(dirname(__FILE__) . "/../template/auth/panel.php"));
    }

    public function userUpdate($request, $id)
    {
        $db = new DataBase();
        $request['password'] = $this->hash($request['password']);
        $db->update('users', $id, array_keys($request), $request);
        $this->redirect('panel');
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('home');
    }

    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE `id` = ? ; ", [$_SESSION['user']])->fetch();
            if ($user != null) {
                if ($user['permission'] != 'admin') {
                    $this->redirect('panel');
                }
            } else {
                $this->redirect('panel');
            }
        } else {
            $this->redirect('panel');
        }
    }


    protected function redirect($url)
    {
        $prtocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
        header("Location: " . $prtocol . $_SERVER['HTTP_HOST'] . "/" . $url);
    }


    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function hash($string)
    {
        $hashString = password_hash($string, PASSWORD_DEFAULT);
        return $hashString;
    }

    /**
     * use https://farazsms.com to send SMS
     * @param $smsContent
     * @param $smsPhone
     */
    public function sendSMS($smsContent, $smsPhone)
    {
        // turn off the WSDL cache
        ini_set("soap.wsdl_cache_enabled", "0");
        try {
            $client = new \SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
            $user = ":username";
            $pass = ":password";
            $fromNum = ":number";
            $toNum = array($smsPhone, $smsPhone);
            $messageContent = $smsContent;
            $op = "send";
            //If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'

            $time = '';

            echo $client->SendSMS($fromNum, $toNum, $messageContent, $user, $pass, $time, $op);
            //ech $status;
        } catch (\SoapFault $ex) {
            echo $ex->faultstring;
        }
    }

}
