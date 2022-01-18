<?php

namespace AdminDashboard;

class Admin
{

    function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
    }

    protected function redirect($url)
    {
        //$prtocol= stripos($_SERVER['SERVER_PROTOCOL'],'https')=== true ? 'https://' : 'http://';
        $prtocol = 'https://';
        header("Location: " . $prtocol . $_SERVER['HTTP_HOST'] . "/" . $url);
    }


    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    protected function saveImage($image, $imagePath, $imagename = null)
    {
        if ($imagename)
            $imagename = $imagename . "." . substr($image['type'], 6, strlen($image['type']));
        else
            $imagename = date('Y-m-d-H-i-s') . explode('.', $image['name'])[0] . "." . substr($image['type'], 6, strlen($image['type']));
        $imagetemp = $image['tmp_name'];

        $imagePath = "public/" . $imagePath . "/";

        if (is_uploaded_file($imagetemp)) {
            if (move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                return $imagePath . $imagename;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    protected function removeImage($path)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/" . $path;
        unlink($path);
    }

}
