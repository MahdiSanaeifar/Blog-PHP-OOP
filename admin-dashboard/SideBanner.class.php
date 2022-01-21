<?php

namespace AdminDashboard;
require_once("Admin.class.php");
require_once(realpath(dirname(__FILE__) . "/DataBase.php"));

use DataBase\DataBase;

class SideBanner extends Admin
{

    public function index()
    {
        require_once(realpath(dirname(__FILE__) . "/../template/admin/side-banner/index.php"));
    }

    public function store($request)
    {
        $db = new DataBase();
        $sideBanners = $db->select('SELECT * FROM `sidebanners` ORDER BY `id` DESC ;')->fetch();
        if ($sideBanners != null) {
            $this->removeImage($sideBanners['image']);
            $db->delete('sidebanners', $sideBanners['id']);
        }
        $request['banner'] = $this->saveImage($request['banner'], 'side-banner');
        if ($request['banner']) {
            $sendData = array("image" => $request['banner'], "status" => "enable", "sort" => "1");
            $db->insert('sidebanners', array_keys($sendData), $sendData);
        } else {
            $this->redirectBack();
        }
        $this->redirect('side-banner');
    }

    public function update($request, $id)
    {
        $db = new DataBase();
        if ($request['cat_id'] != null) {
            if ($request['image']['tmp_name'] != null) {
                $article = $db->select("SELECT * FROM `articles` WHERE (`id` = ?); ", [$id])->fetch();
                $this->removeImage($article['image']);
                $request['image'] = $this->saveImage($request['image'], 'article-image');
            } else {
                unset($request['image']);
            }
            $request = array_merge($request, array('user_id' => $_SESSION['user']));
            $db->update('articles', $id, array_keys($request), $request);
            $this->redirect('article');
        } else {
            $this->redirectBack();
        }
    }


    public function delete($id)
    {
        $db = new DataBase();
        $article = $db->select("SELECT * FROM `articles` WHERE (`id` = ?); ", [$id])->fetch();
        $this->removeImage($article['image']);

        $db->delete('articles', $id);
        $this->redirectBack();
    }

}