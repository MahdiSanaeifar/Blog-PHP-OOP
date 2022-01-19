<?php

namespace AdminDashboard;
require_once("Admin.class.php");
require_once(realpath(dirname(__FILE__) . "/DataBase.php"));

use DataBase\DataBase;

class ArticleImages extends Admin
{

    public function index()
    {
        $db = new DataBase();
        $articleImages = $db->select('SELECT * FROM `articleimages` ORDER BY `id` DESC ;');
        require_once(realpath(dirname(__FILE__) . "/../template/admin/article-images/index.php"));
    }


    public function create($id)
    {
        $db = new DataBase();
        $articles = $db->select('SELECT * FROM `articles` ORDER BY `id` DESC ;');
        $Article = $db->select("SELECT * FROM `articles` WHERE `id` = ? ;", [$id])->fetch();
        require_once(realpath(dirname(__FILE__) . "/../template/admin/article-images/create.php"));

    }


    public function store($request)
    {
        $db = new DataBase();
        if ($request['article_id'] != null) {
            $imagees = $db->select('SELECT * FROM `articleimages` WHERE (`article_id` = ?) ORDER BY `id` ;', [$request['article_id']])->fetchAll();
            if ($imagees != null) {
                foreach ($imagees as $imagee) {
                    $this->removeImage($imagee['image']);
                    $db->delete('articleimages', $imagee['id']);
                }
            }
            for ($count = 1; $count <= 50; $count++) {
                if (isset($request['Image' . $count])) {
                    $sendData = array("article_id" => $request['article_id'], "image" => $request['Image' . $count]);
                    $sendData['image'] = $this->saveImage($sendData['image'], 'article-gallery');
                    if ($sendData['image']) {
                        $db->insert('articleimages', array('article_id', 'image'), array($sendData['article_id'], $sendData['image']));
                    }
                }
            }
        }
        $this->redirectBack();
    }


    public function edit($id)
    {
        $db = new DataBase();
        $articles = $db->select('SELECT * FROM `articles` ORDER BY `id` DESC ;');
        $article = $db->select("SELECT * FROM `articles` WHERE `id` = ? ;", [$id])->fetch();
        require_once(realpath(dirname(__FILE__) . "/../template/admin/article-images/edit.php"));
    }

    public function delete($id)
    {
        $db = new DataBase();
        $articleImages = $db->select("SELECT * FROM `articleimages` WHERE (`id` = ?); ", [$id])->fetch();
        $this->removeImage($articleImages['image']);

        $db->delete('articleimages', $id);
        $this->redirectBack();
    }

}