<?php

namespace AdminDashboard;
require_once("Admin.class.php");
require_once(realpath(dirname(__FILE__) . "/DataBase.php"));

use DataBase\DataBase;

class Slider extends Admin
{

    public function index()
    {
        $db = new DataBase();
        $sliders = $db->select("SELECT * FROM `sliders`;")->fetchAll();
        $articles = $db->select("SELECT * FROM `articles`;")->fetchAll();
        $bSliders = $db->select("SELECT `id` FROM `articles` WHERE (`bslider` = 'yes');")->fetchAll();
        $sSliders = $db->select("SELECT `id` FROM `articles` WHERE (`sslider` = 'yes');")->fetchAll();

        require_once(realpath(dirname(__FILE__) . "/../template/admin/slider/index.php"));
    }

    public function IndexVideo()
    {
        $db = new DataBase();
        $articles = $db->select("SELECT id,title FROM `articles` WHERE (`type` = 'video');")->fetchAll();
        $videoSliders = $db->select("SELECT * FROM `videosliders`;")->fetchAll();
        require_once(realpath(dirname(__FILE__) . "/../template/admin/slider/indexV.php"));
    }

    public function set()
    {
        $db = new DataBase();
        $HomeSession1 = $db->select("SELECT * FROM `sliders`;")->fetch();
        $articles = $db->select("SELECT * FROM `articles`;")->fetchAll();
        require_once(realpath(dirname(__FILE__) . "/../template/admin/slider/set.php"));
    }

    public function StoreVideo($request)
    {
        $db = new DataBase();

        $videoSliders = $db->select("SELECT `id` FROM `videosliders`;")->fetchAll();
        if ($videoSliders != null) {
            foreach ($videoSliders as $videoSlider) {
                $db->delete('videosliders', $videoSlider['id']);
            }
            $videoSliders = $db->select("SELECT `id` FROM `videosliders`;")->fetchAll();
        }

        for ($count = 1; $count <= 10; $count++) {

            if ($request['video' . $count] != "") {
                echo "<br>";
                echo "<br>";
                $sendData = array("article_id" => $request['video' . $count], "sort" => $request['sort' . $count]);
                $db->insert('videosliders', array_keys($sendData), $sendData);
                var_dump($sendData);
                echo "<br>";
                echo "<br>";
            }
        }
        $this->redirect('slider-video');
    }

    public function StoreTxt($request)
    {
        $db = new DataBase();
        $slider = $db->select("SELECT * FROM `sliders`;")->fetchAll();
        if ($slider != null) {
            for ($count = 1; $count < 4; $count++) {
                $sendData = array("text" => $request['text' . $count], "url" => $request['text_url' . $count]);
                $db->update('sliders', $count, array_keys($sendData), $sendData);
            }
        } else {
            for ($count = 1; $count < 4; $count++) {
                $sendData = array("text" => $request['text' . $count], "url" => $request['text_url' . $count]);
                $db->insert('sliders', array_keys($sendData), $sendData);
            }
        }
        $this->redirect('slider');
    }

    public function StoreImage($request)
    {
        $db = new DataBase();

        $bSliderArticles = $db->select("SELECT `id` FROM `articles` WHERE (`bslider` = 'yes');")->fetchAll();
        $sSliderArticles = $db->select("SELECT `id` FROM `articles` WHERE (`sslider` = 'yes');")->fetchAll();

        foreach ($bSliderArticles as $bsliderArticle) {
            $sendData = array("id" => $bsliderArticle['id'], "bslider" => "no");
            $db->update('articles', $bsliderArticle['id'], array_keys($sendData), $sendData);
        }
        if ($sSliderArticles != null) {
            foreach ($sSliderArticles as $ssliderArticle) {
                $sendData = array("id" => $ssliderArticle['id'], "sslider" => "no");
                $db->update('articles', $ssliderArticle['id'], array_keys($sendData), $sendData);
            }
        }


        $sendData = array("bslider" => "yes");
        for ($count = "1"; $count < 4; $count++) {
            $db->update('articles', $request['bslider' . $count], array_keys($sendData), $sendData);
        }
        $sendData = array("sslider" => "yes");
        for ($count = "1"; $count < 5; $count++) {
            $db->update('articles', $request['sslider' . $count], array_keys($sendData), $sendData);
        }
        $this->redirect('slider');
    }
}