<?php

namespace AdminDashboard;
require_once("Admin.class.php");
require_once(realpath(dirname(__FILE__) . "/DataBase.php"));

use DataBase\DataBase;

class SpecialArticle extends Admin
{

    public function index()
    {
        $db = new DataBase();
        $categories = $db->select("SELECT * FROM `categories`;")->fetchAll();
        $articles = $db->select("SELECT * FROM `articles` ORDER BY `id` DESC;")->fetchAll();

        $firstCat = $db->select("SELECT `topcategories`.`name`,`topcategories`.`cat_id`,`articles`.`title`,`articles`.`id` FROM `topcategories` JOIN `toparticles` ON `topcategories`.id=`toparticles`.topcat_id JOIN `articles` ON `toparticles`.article_id=`articles`.id WHERE topcategories.id = 1 ;")->fetchAll();
        $secoundCat = $db->select("SELECT `topcategories`.`name`,`topcategories`.`cat_id`,`articles`.`title`,`articles`.`id` FROM `topcategories` JOIN `toparticles` ON `topcategories`.id=`toparticles`.topcat_id JOIN `articles` ON `toparticles`.article_id=`articles`.id WHERE topcategories.id = 2 ;")->fetchAll();
        $thirdCat = $db->select("SELECT `topcategories`.`name`,`topcategories`.`cat_id`,`articles`.`title`,`articles`.`id` FROM `topcategories` JOIN `toparticles` ON `topcategories`.id=`toparticles`.topcat_id JOIN `articles` ON `toparticles`.article_id=`articles`.id WHERE topcategories.id = 3 ;")->fetchAll();

        require_once(realpath(dirname(__FILE__) . "/../template/admin/special-article/index.php"));
    }


    public function store($request)
    {
        $db = new DataBase();
        if ($request['storeNum'] == 'first') {
            $history = $db->select("SELECT `id` FROM `topcategories` WHERE (`id` = '1');")->fetch();
            if ($history) {
                $db->update('topcategories', '1', array('name', 'cat_id', 'status'), array($request['category'], $request['cat_id'], 'enable'));
                $lastarticles = $db->select("SELECT `id` FROM `toparticles` WHERE `topcat_id` = 1 ;")->fetchAll();
                foreach ($lastarticles as $lastarticle) {
                    $db->delete('toparticles', $lastarticle['id']);
                }
                for ($i = 1; $i <= 6; $i++) {
                    if ($request['article' . $i] != "") {
                        $db->insert('toparticles', array('article_id', 'topcat_id'), array($request['article' . $i], 1));
                    }
                }
            } else {
                $db->insert('topcategories', array('name', 'cat_id', 'status'), array($request['category'], $request['cat_id'], 'enable'));
                for ($i = 1; $i <= 6; $i++) {
                    if ($request['article' . $i] != "") {
                        $db->insert('toparticles', array('article_id', 'topcat_id'), array($request['article' . $i], 1));
                    }
                }
            }
        } elseif ($request['storeNum'] == 'secound') {
            $history = $db->select("SELECT `id` FROM `topcategories` WHERE (`id` = '2');")->fetch();
            if ($history) {
                $db->update('topcategories', '2', array('name', 'cat_id', 'status'), array($request['category'], $request['cat_id'], 'enable'));
                $lastarticles = $db->select("SELECT `id` FROM `toparticles` WHERE `topcat_id` = 2 ;")->fetchAll();
                foreach ($lastarticles as $lastarticle) {
                    $db->delete('toparticles', $lastarticle['id']);
                }
                for ($i = 1; $i <= 6; $i++) {
                    if ($request['article' . $i] != "") {
                        $db->insert('toparticles', array('article_id', 'topcat_id'), array($request['article' . $i], 2));
                    }
                }
            } else {
                $db->insert('topcategories', array('name', 'cat_id', 'status'), array($request['category'], $request['cat_id'], 'enable'));
                for ($i = 1; $i <= 6; $i++) {
                    if ($request['article' . $i] != "") {
                        $db->insert('toparticles', array('article_id', 'topcat_id'), array($request['article' . $i], 2));
                    }
                }
            }
        } elseif ($request['storeNum'] == 'third') {
            $history = $db->select("SELECT `id` FROM `topcategories` WHERE (`id` = '3');")->fetch();
            if ($history) {
                $db->update('topcategories', '3', array('name', 'cat_id', 'status'), array($request['category'], $request['cat_id'], 'enable'));
                $lastarticles = $db->select("SELECT `id` FROM `toparticles` WHERE `topcat_id` = 3 ;")->fetchAll();
                foreach ($lastarticles as $lastarticle) {
                    $db->delete('toparticles', $lastarticle['id']);
                }
                for ($i = 1; $i <= 6; $i++) {
                    if ($request['article' . $i] != "") {
                        $db->insert('toparticles', array('article_id', 'topcat_id'), array($request['article' . $i], 3));
                    }
                }
            } else {
                $db->insert('topcategories', array('name', 'cat_id', 'status'), array($request['category'], $request['cat_id'], 'enable'));
                for ($i = 1; $i <= 6; $i++) {
                    if ($request['article' . $i] != "") {
                        $db->insert('toparticles', array('article_id', 'topcat_id'), array($request['article' . $i], 3));
                    }
                }
            }
        } else {
        }
        $this->redirect('special-article');
    }

}