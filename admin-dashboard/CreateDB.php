<?php

namespace DataBase;

require_once(realpath(dirname(__FILE__) . "/DataBase.php"));

class CreateDB extends DataBase
{
    private $createTableQueries = array(
        "CREATE TABLE `categories` (
          `id` int(11) NOT NULL AUTO_INCREMENT ,
          `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `showstatus` enum('yes','no') COLLATE utf8_persian_ci NOT NULL DEFAULT 'yes',
          `special` enum('yes','no') COLLATE utf8_persian_ci NOT NULL DEFAULT 'no',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `users` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `idcode` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `phone` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `parentphone` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `landlinephone` varchar(100) COLLATE utf8_persian_ci,
          `born` varchar(100) COLLATE utf8_persian_ci,
          `education` varchar(100) COLLATE utf8_persian_ci,
          `parentjob` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `skills` varchar(200) COLLATE utf8_persian_ci,
          `image` varchar(200) COLLATE utf8_persian_ci,
          `email` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
          `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `permission` enum('user','admin') COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `email` (`email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `articles` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `summary` text COLLATE utf8_persian_ci NOT NULL,
          `body` text COLLATE utf8_persian_ci NOT NULL,
          `view` int(11) NOT NULL DEFAULT '0',
          `user_id` int(11)  NOT NULL,
          `cat_id` int(11)  NOT NULL,
          `image` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `status` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'disable',
          `bslider` enum('yes','no') COLLATE utf8_persian_ci NOT NULL DEFAULT 'no',
          `sslider` enum('yes','no') COLLATE utf8_persian_ci NOT NULL DEFAULT 'no',
          `special` enum('yes','no') COLLATE utf8_persian_ci NOT NULL DEFAULT 'no',
          `type` enum('simple','video','picture','voice') COLLATE utf8_persian_ci NOT NULL DEFAULT 'simple',
          `location` enum('loc1','loc2','loc3') COLLATE utf8_persian_ci NOT NULL DEFAULT 'loc1',
          `costumecode` text COLLATE utf8_persian_ci,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `comments` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `user_id` int(11) NOT NULL,
          `comment` text COLLATE utf8_persian_ci NOT NULL,
          `article_id` int(11)  NOT NULL,
          `status` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

        "CREATE TABLE `websetting` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `title` text COLLATE utf8_persian_ci DEFAULT NULL,
          `description` text COLLATE utf8_persian_ci DEFAULT NULL,
          `keywords` text COLLATE utf8_persian_ci DEFAULT NULL,
          `logo` text COLLATE utf8_persian_ci DEFAULT NULL,
          `icon` text COLLATE utf8_persian_ci DEFAULT NULL,
          `facebook` varchar(300) COLLATE utf8_persian_ci,
          `twitter` varchar(300) COLLATE utf8_persian_ci,
          `linkedin` varchar(300) COLLATE utf8_persian_ci,
          `instagram` varchar(300) COLLATE utf8_persian_ci,
          `telegram` varchar(300) COLLATE utf8_persian_ci,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
        "CREATE TABLE `menus` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `sort` int(11) NOT NULL,
          `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
          `url` varchar(300) COLLATE utf8_persian_ci NOT NULL,
          `parent_id` int(11) DEFAULT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
        "CREATE TABLE `articleimages` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `image` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `status` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'enable',
          `article_id` int(11)  NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
           PRIMARY KEY (`id`),
           FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
        "CREATE TABLE `sliders` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `text` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
          `url` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
           PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
        "CREATE TABLE `sidebanners` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `image` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `status` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'enable',
          `sort` int(11)  NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
           PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
		"CREATE TABLE `topcategories` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
          `cat_id` int(11)  NOT NULL,
          `status` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'enable',
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
           FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
           PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
        "CREATE TABLE `toparticles` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `article_id` int(11)  NOT NULL,
          `topcat_id` int(11)  NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
           FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
           FOREIGN KEY (`topcat_id`) REFERENCES `topcategories` (`id`),
           PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
        "CREATE TABLE `videosliders` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `article_id` int(11)  NOT NULL,
          `sort` int(11)  NOT NULL,
          `created_at` datetime NOT NULL,
          `updated_at` datetime DEFAULT NULL,
           PRIMARY KEY (`id`),
           FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
        ",
    );

    private $tableInitializes = array(
        ['table' => 'users', 'fields' => ['username', 'email', 'password', 'permission'], 'values' => ['admin', 'admin@gmail.com', '$2y$10$kUh4xMjKTXeNiy7jSIJO6.LOVBth9hQiPwMi0BgD.ao2uWBDn1OB.', 'admin']],
    );

    public function run()
    {
        foreach ($this->createTableQueries as $createTableQuery) {
            $this->createTable($createTableQuery);
        }
        foreach ($this->tableInitializes as $tableInitialize) {
            $this->insert($tableInitialize['table'], $tableInitialize['fields'], $tableInitialize['values']);
        }
    }

}








