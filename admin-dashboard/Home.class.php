<?php

namespace AdminDashboard;

require_once(realpath(dirname(__FILE__) . "/DataBase.php"));

use DataBase\DataBase;

class Home
{

    public function index()
    {
        $db = new DataBase();

        // article
        $articles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `created_at` DESC LIMIT 0,7 ;")->fetchAll();
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();


        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();


        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // Sliders
        $textSliders = $db->select('SELECT * FROM `sliders` ORDER BY `id` DESC ;')->fetchAll();
        $bSliders = $db->select("SELECT * FROM `articles` WHERE (`bslider` = 'yes') ORDER BY `id` DESC;")->fetchAll();
        $sSliders = $db->select("SELECT * FROM `articles` WHERE (`sslider` = 'yes') ORDER BY `id` DESC;")->fetchAll();
        $videoSliders = $db->select("SELECT * FROM articles WHERE id IN (SELECT article_id FROM videosliders ORDER BY `sort`)")->fetchAll();

        // Special Categories
        $specialCategories = $db->select("SELECT * FROM `categories` WHERE (`special` = 'yes');")->fetchAll();
        $firstArticleInCats = $db->select("SELECT * FROM `articles` WHERE `cat_id` = ? AND (`special` = 'yes');", [$specialCategories[0]['id']])->fetchAll();
        $secondArticleInCats = $db->select("SELECT * FROM `articles` WHERE `cat_id` = ? AND (`special` = 'yes') ;", [$specialCategories[1]['id']])->fetchAll();

        $firstCat = $db->select("SELECT `topcategories`.`name`,`topcategories`.`cat_id`,`articles`.`title`,`articles`.`image`,`articles`.`created_at`,`articles`.`type`,`articles`.`id` FROM `topcategories` JOIN `toparticles` ON `topcategories`.id=`toparticles`.topcat_id JOIN `articles` ON `toparticles`.article_id=`articles`.id WHERE topcategories.id = 1 ;")->fetchAll();
        $secoundCat = $db->select("SELECT `topcategories`.`name`,`topcategories`.`cat_id`,`articles`.`title`,`articles`.`image`,`articles`.`created_at`,`articles`.`type`,`articles`.`id` FROM `topcategories` JOIN `toparticles` ON `topcategories`.id=`toparticles`.topcat_id JOIN `articles` ON `toparticles`.article_id=`articles`.id WHERE topcategories.id = 2 ;")->fetchAll();
        $thirdCat = $db->select("SELECT `topcategories`.`name`,`topcategories`.`cat_id`,`articles`.`title`,`articles`.`image`,`articles`.`created_at`,`articles`.`type`,`articles`.`id` FROM `topcategories` JOIN `toparticles` ON `topcategories`.id=`toparticles`.topcat_id JOIN `articles` ON `toparticles`.article_id=`articles`.id WHERE topcategories.id = 3 ;")->fetchAll();


        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();

        //header
        $headerTitle = "متن صفحه اصلی";


        require_once(realpath(dirname(__FILE__) . "/../template/app/index.php"));
    }

    public function show($id)
    {
        $db = new DataBase();
        $article = $db->select("SELECT * FROM `articles` WHERE `id` = ? ORDER BY `id` DESC ;", [$id])->fetch();
        $username = $db->select("SELECT * FROM `users` WHERE `id` = ?;", [$article['user_id']])->fetch();
        $commentsCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `article_id` = ?;", [$id])->fetch();
        $comments = $db->select("SELECT *,( SELECT `username` FROM `users` WHERE `users`.`id` = `comments`.`user_id`) as `username` FROM `comments` WHERE `article_id` = ? and `status` = 'approved' ORDER BY `created_at` DESC ;", [$id])->fetchAll();
        $db->update('articles', $id, ['view'], [$article['view'] + 1]);
        $gallery = $db->select("SELECT * FROM `articleimages` WHERE `article_id` = ? ORDER BY `id` ;", [$id])->fetchAll();


        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();

        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();

        // popular article
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        //header
        $headerTitle = $article['title'] . " | نام وبسایت";

        require_once(realpath(dirname(__FILE__) . "/../template/app/show-article.php"));
    }

    public function categoryPage($id)
    {
        $db = new DataBase();

        $splitId = explode(",", $id);
        $id = $splitId[0];
        $page = $splitId[1];

        $limitS = (($page - 1) * 10);

        // article
        $articles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles WHERE (articles.cat_id = ?) ORDER BY `created_at` DESC LIMIT $limitS,10;", [$id])->fetchAll();
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();
        $category = $db->select("SELECT `name`,`id` FROM `categories` WHERE `id` = ? ORDER BY `id` DESC ;", [$id])->fetch();
        $categoryCount = $db->select("SELECT COUNT(*) FROM `articles` WHERE `cat_id` = ? ORDER BY `id` DESC ;", [$id])->fetch();

        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();

        //header
        $headerTitle = $category['name'] . " | نام وبسایت";


        require_once(realpath(dirname(__FILE__) . "/../template/app/show-category-p.php"));
    }

    public function category($id)
    {
        $db = new DataBase();


        // article
        $articles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles WHERE (articles.cat_id = ?)  ORDER BY `created_at` DESC LIMIT 0,10;", [$id])->fetchAll();
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();
        $category = $db->select("SELECT `name`,`id` FROM `categories` WHERE `id` = ? ORDER BY `id` DESC ;", [$id])->fetch();
        $categoryCount = $db->select("SELECT COUNT(*) FROM `articles` WHERE `cat_id` = ? ORDER BY `id` DESC ;", [$id])->fetch();

        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();

        //header
        $headerTitle = $category['name'] . " | نام وبسایت";


        require_once(realpath(dirname(__FILE__) . "/../template/app/show-category.php"));
    }

    public function commentStore($request)
    {
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] != null) {
                $db = new DataBase();
                $db->insert('comments', ['user_id', 'article_id', 'comment'], [$_SESSION['user'], $request['article_id'], $request['comment']]);
                $this->redirectBack();
            } else
                $this->redirectBack();
        } else
            $this->redirectBack();
    }

    public function searchBar($request)
    {
        $db = new DataBase();
        $searhkey = $request['search'];

        // search
        $searchRes = $db->select("SELECT * FROM articles WHERE title LIKE '%$searhkey%';")->fetchAll();
        $searchResCount = $db->select("SELECT COUNT(*) FROM articles WHERE title LIKE '%$searhkey%';")->fetch();

        // article
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();

        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();

        //header
        $headerTitle = " جست و جو " . $searhkey . " | نام وبسایت";


        require_once(realpath(dirname(__FILE__) . "/../template/app/show-search.php"));
    }

    public function news($page)
    {
        $db = new DataBase();
        $page = $page;
        $limitS = (($page - 1) * 10);

        // article
        $articles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles WHERE (articles.cat_id = 8) OR (articles.cat_id = 9) OR (articles.cat_id = 14) ORDER BY `created_at` DESC LIMIT $limitS,10;")->fetchAll();
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();
        $categoryCount = $db->select("SELECT COUNT(*) FROM `articles`  WHERE (articles.cat_id = 8) OR (articles.cat_id = 9) OR (articles.cat_id = 10);")->fetch();


        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();
        $headName = "اخبــــار";
        $headNameE = "news";

        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();

        //header
        $headerTitle = "اخبار نام وبسایت";


        require_once(realpath(dirname(__FILE__) . "/../template/app/parent-category.php"));
    }

    public function archive($page)
    {
        $db = new DataBase();
        $page = $page;
        $limitS = (($page - 1) * 10);

        // article
        $articles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles WHERE (articles.cat_id = 11) OR (articles.cat_id = 12) OR (articles.cat_id = 13) OR (articles.cat_id = 15) ORDER BY `created_at` DESC LIMIT $limitS,10;")->fetchAll();
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();
        $categoryCount = $db->select("SELECT COUNT(*) FROM `articles`  WHERE (articles.cat_id = 11) OR (articles.cat_id = 12) OR (articles.cat_id = 13);")->fetch();


        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();
        $headName = "آرشیـــو مراسمـــات";
        $headNameE = "archive";

        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();

        //header
        $headerTitle = "آرشیو نام وبسایت";


        require_once(realpath(dirname(__FILE__) . "/../template/app/parent-category.php"));
    }

    public function contact()
    {
        $db = new DataBase();
        // menus
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ORDER BY `sort`;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ORDER BY `sort`;')->fetchAll();

        // SideBar
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();
        $loc1Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc1") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc2Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc2") AND (`status` = "enable") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $loc3Articles = $db->select('SELECT * FROM `articles` WHERE (`location` = "loc3") ORDER BY `created_at` DESC LIMIT 0,6 ;')->fetchAll();
        $sideBanner = $db->select("SELECT * FROM `sidebanners`;")->fetch();

        // image gallery
        $recentGallery = $db->select("SELECT image FROM `articleimages`  WHERE (`status` = 'enable') ORDER BY `id` DESC LIMIT 0,9;")->fetchAll();

        // category
        $categories = $db->select("SELECT categories.*, (SELECT COUNT(*) FROM articles WHERE articles.cat_id = categories.id) AS categories_count FROM categories  ORDER BY `id` DESC LIMIT 0,6 ;")->fetchAll();

        // article
        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

        //header
        $headerTitle = "درباره - آدرس - شماره تماس نام وبسایت";


        require_once(realpath(dirname(__FILE__) . "/../template/app/contact.php"));
    }

    public function landing()
    {
        //header
        $headerTitle = "ارتباط با ما | نام وبسایت";

        require_once(realpath(dirname(__FILE__) . "/../template/app/landing.php"));
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

}