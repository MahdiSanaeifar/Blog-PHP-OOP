<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/head-tag.php"));
?>

    <!-- Breadcrumb Area Start Here -->
    <section class="breadcrumbs-area"
             style="background-image: url('https://domain.ir/public/app/img/banner/banner-2.png');">
        <div class="container">
            <div class="breadcrumbs-content">
                <h1><?= $category['name'] ?></h1>
                <ul>
                    <li>
                        <a href="#"><?= $categoryCount["COUNT(*)"] ?> مورد</a> -
                    </li>
                    <li>برای نمایش</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End Here -->
    <!-- Post Style 3 Page Area Start Here -->
    <section class="bg-body section-space-less30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">

                        <?php foreach ($articles as $article) { ?>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                <div class="media media-none--lg mb-30">
                                    <div class="position-relative width-40">
                                        <a href="https://domain.ir/show-article/<?= $article['id'] ?>"
                                           class="img-opacity-hover img-overlay-70">
                                            <img src="https://domain.ir/<?= $article['image'] ?>" alt="news"
                                                 class="img-fluid">
                                        </a>
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20"><?php
                                                if ($article['type'] == "voice") {
                                                    echo "صوتی";
                                                } elseif ($article['type'] == "video") {
                                                    echo "ویدئویی";
                                                } elseif ($article['type'] == "picture") {
                                                    echo "تصویری";
                                                } else {
                                                    echo "خبر";
                                                }
                                                ?></div>
                                        </div>
                                    </div>
                                    <div class="media-body p-mb-none-child media-margin30">
                                        <div class="post-date-dark">
                                            <ul>
                                                <li>
                                                    <span>برای</span>
                                                    <a href="#"><?php
                                                        if ($article['location'] == "loc3") {
                                                            echo "loc1";
                                                        } elseif ($article['location'] == "loc2") {
                                                            echo "loc2";
                                                        } else {
                                                            echo "loc3";
                                                        }
                                                        ?></a>
                                                </li>
                                                <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?= gregorian_to_jalali(date("Y", strtotime($article['created_at'])), date("m", strtotime($article['created_at'])), date("d", strtotime($article['created_at'])), '/'); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-semibold-dark size-lg mb-15">
                                            <a href="https://domain.ir/show-article/<?= $article['id'] ?>"><?= $article['title'] ?></a>
                                        </h3>
                                        <p><?= $article['summary'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row mt-20-r mb-30">
                        <div class="col-sm-6 col-12">
                            <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                                <ul>
                                    <?php
                                    $pageCounter = ceil($categoryCount["COUNT(*)"] / 10);
                                    for ($i = 1; $i <= $pageCounter; $i++) {
                                        ?>
                                        <li <?php if ($i == 1) {
                                            echo 'class="active"';
                                        } ?>>
                                            <a href="https://domain.ir/show-category/<?= $category['id'] ?>/<?= $i ?>"><?= $i ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="pagination-result text-left pt-10 text-center--xs">
                                <p class="mb-none">صفحه 1 از <?= $pageCounter ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                require_once(realpath(dirname(__FILE__) . "/../app/layouts/sidebar.php"));
                ?>
            </div>
        </div>
    </section>
    <!-- Post Style 3 Page Area End Here -->


<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>