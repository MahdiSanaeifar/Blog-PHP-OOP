<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/head-tag.php"));
?>
    <!-- News Feed Area Start Here -->
    <section class="container">
        <div class="bg-body-color ml-15 pr-15 mb-10 mt-10">
            <div class="row no-gutters d-flex align-items-center">
                <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                    <div class="topic-box">اطلاعیه ها</div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-8 col-7">
                    <div class="feeding-text-light2">
                        <ol id="sample" class="ticker">
                            <?php foreach ($textSliders as $textSlider) { ?>
                                <li>
                                    <a href="<?= $textSlider['url']; ?>"><?= $textSlider['text'] ?></a>
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News Feed Area End Here -->
    <!-- Slider Area Start Here -->
    <section class="section-space-bottom">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-xl-8 col-lg-12">
                    <div class="main-slider1 img-overlay-slider">
                        <div class="bend niceties preview-1">
                            <div id="ensign-nivoslider-3" class="slides">
                                <?php $count = 1;
                                foreach ($bSliders as $bSlider) { ?>
                                    <img src="https://domain.ir/<?= $bSlider['image'] ?>" alt="slider"
                                         title="#slider-direction-<?= $count ?>">
                                    <?php $count++;
                                } ?>
                            </div>
                            <!-- direction 1 -->
                            <?php $count = 1;
                            foreach ($bSliders as $bSlider) { ?>
                                <div id="slider-direction-<?= $count ?>" class="t-cn slider-direction">
                                    <div class="slider-content s-tb slide-<?= $count ?>">
                                        <div class="title-container s-tb-c">
                                            <div class="text-right pl-50 pl20-xs">
                                                <div class="topic-box-sm color-cinnabar mb-20"><?php
                                                    if ($bSlider['type'] == "voice") {
                                                        echo "صوتی";
                                                    } elseif ($bSlider['type'] == "video") {
                                                        echo "ویدئویی";
                                                    } elseif ($bSlider['type'] == "picture") {
                                                        echo "تصویری";
                                                    } else {
                                                        echo "خبر";
                                                    }
                                                    ?></div>
                                                <div class="post-date-light d-none d-sm-block">
                                                    <ul>
                                                        <li>
                                                            <span>برای</span>
                                                            <a href="#">
                                                                <?php
                                                                if ($bSlider['location'] == "loc3") {
                                                                    echo "loc1";
                                                                } elseif ($bSlider['location'] == "loc2") {
                                                                    echo "loc2";
                                                                } else {
                                                                    echo "loc3";
                                                                }
                                                                ?>
                                                            </a>
                                                        </li>
                                                        <li>
                                                                <span>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </span><?= gregorian_to_jalali(date("Y", strtotime($bSlider['created_at'])), date("m", strtotime($bSlider['created_at'])), date("d", strtotime($bSlider['created_at'])), '/'); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a href="https://domain.ir/show-article/<?= $bSlider['id'] ?>">
                                                    <div class="slider-title">
                                                        <?= $bSlider['title'] ?>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $count++;
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="item-box-light-md-less30 ie-full-width">
                        <div class="row">
                            <?php foreach ($sSliders as $sSlider) { ?>
                                <div class="media mb-25 col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                    <a class="img-opacity-hover"
                                       href="https://domain.ir/show-article/<?= $sSlider['id'] ?>">
                                        <img src="https://domain.ir/<?= $sSlider['image'] ?>"
                                             width="124px" alt="news" class="img-fluid">
                                    </a>
                                    <div class="media-body media-padding5">
                                        <div class="post-date-dark">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span><?= gregorian_to_jalali(date("Y", strtotime($sSlider['created_at'])), date("m", strtotime($sSlider['created_at'])), date("d", strtotime($sSlider['created_at'])), '/'); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-medium-dark size-md mb-none">
                                            <a href="https://domain.ir/show-article/<?= $sSlider['id'] ?>"><?= $sSlider['title'] ?></a>
                                        </h3>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider Area End Here -->
    <!-- Popular Area Start Here -->
    <section class="section-space-bottom">
        <div class="container">
            <div class="item-box-light-md-less10">
                <div class="ne-isotope-all">
                    <div class="topic-border color-cinnabar mb-30">
                        <div class="topic-box-lg color-cinnabar">دسته بندی های ویژه</div>
                        <div class="isotope-classes-tab isotop-btn">
                            <a href="https://www.domain.ir/show-category/<?= $firstCat[0]['cat_id'] ?>" class="current"
                               data-filter=".category1<?= $firstCat[0]['cat_id'] ?>"><?= $firstCat[0]['name'] ?></a>
                            <a href="https://www.domain.ir/show-category/<?= $secoundCat[0]['cat_id'] ?>"
                               data-filter=".category2<?= $secoundCat[0]['cat_id'] ?>"><?= $secoundCat[0]['name'] ?></a>
                            <a href="https://www.domain.ir/show-category/<?= $thirdCat[0]['cat_id'] ?>"
                               data-filter=".category3<?= $thirdCat[0]['cat_id'] ?>"><?= $thirdCat[0]['name'] ?></a>
                        </div>
                        <script>
                        </script>
                        <div class="more-info-link">
                            <a href="https://www.domain.ir/">بیشتر
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row tab-space5 featuredContainer">
                        <?php foreach ($firstCat as $firstCat) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 category1<?= $firstCat['cat_id'] ?>">
                                <div class="img-overlay-70 img-scale-animate mb-10">
                                    <img src="https://www.domain.ir/<?= $firstCat['image'] ?>" alt="news"
                                         class="img-fluid width-100">
                                    <div class="topic-box-top-sm">
                                        <div class="topic-box-sm color-cod-gray mb-20"><?php
                                            if ($firstCat['type'] == "voice") {
                                                echo "صوتی";
                                            } elseif ($firstCat['type'] == "video") {
                                                echo "ویدئویی";
                                            } elseif ($firstCat['type'] == "picture") {
                                                echo "تصویری";
                                            } else {
                                                echo "خبر";
                                            }
                                            ?></div>
                                    </div>
                                    <div class="mask-content-xs">
                                        <div class="post-date-light d-none d-md-block">
                                            <ul>
                                                <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?= gregorian_to_jalali(date("Y", strtotime($firstCat['created_at'])), date("m", strtotime($firstCat['created_at'])), date("d", strtotime($firstCat['created_at'])), '/'); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-medium-light size-lg">
                                            <a href="https://www.domain.ir/show-article/<?= $firstCat['id'] ?>"><?= $firstCat['title'] ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php foreach ($secoundCat as $secoundCat) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 category2<?= $secoundCat['cat_id'] ?>">
                                <div class="img-overlay-70 img-scale-animate mb-10">
                                    <img src="https://www.domain.ir/<?= $secoundCat['image'] ?>" alt="news"
                                         class="img-fluid width-100">
                                    <div class="topic-box-top-sm">
                                        <div class="topic-box-sm color-cod-gray mb-20"><?php
                                            if ($secoundCat['type'] == "voice") {
                                                echo "صوتی";
                                            } elseif ($secoundCat['type'] == "video") {
                                                echo "ویدئویی";
                                            } elseif ($secoundCat['type'] == "picture") {
                                                echo "تصویری";
                                            } else {
                                                echo "خبر";
                                            }
                                            ?></div>
                                    </div>
                                    <div class="mask-content-xs">
                                        <div class="post-date-light d-none d-md-block">
                                            <ul>
                                                <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?= gregorian_to_jalali(date("Y", strtotime($secoundCat['created_at'])), date("m", strtotime($secoundCat['created_at'])), date("d", strtotime($secoundCat['created_at'])), '/'); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-medium-light size-lg">
                                            <a href="https://www.domain.ir/show-article/<?= $secoundCat['id'] ?>"><?= $secoundCat['title'] ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php foreach ($thirdCat as $thirdCat) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 category3<?= $thirdCat['cat_id'] ?>">
                                <div class="img-overlay-70 img-scale-animate mb-10">
                                    <img src="https://www.domain.ir/<?= $thirdCat['image'] ?>" alt="news"
                                         class="img-fluid width-100">
                                    <div class="topic-box-top-sm">
                                        <div class="topic-box-sm color-cod-gray mb-20">
                                            <?php
                                            if ($thirdCat['type'] == "voice") {
                                                echo "صوتی";
                                            } elseif ($thirdCat['type'] == "video") {
                                                echo "ویدئویی";
                                            } elseif ($thirdCat['type'] == "picture") {
                                                echo "تصویری";
                                            } else {
                                                echo "خبر";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="mask-content-xs">
                                        <div class="post-date-light d-none d-md-block">
                                            <ul>
                                                <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?= gregorian_to_jalali(date("Y", strtotime($thirdCat['created_at'])), date("m", strtotime($thirdCat['created_at'])), date("d", strtotime($thirdCat['created_at'])), '/'); ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-medium-light size-lg">
                                            <a href="https://www.domain.ir/show-article/<?= $thirdCat['id'] ?>"><?= $thirdCat['title'] ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Area End Here -->
    <!-- Latest Articles Area Start Here -->
    <section class="section-space-bottom-less30">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12 mb-30">
                    <div class="item-box-light-md-less30 ie-full-width">
                        <div class="topic-border color-cinnabar mb-30">
                            <div class="topic-box-lg color-cinnabar">آخرین مطالب</div>
                        </div>
                        <div class="row">
                            <?php foreach ($articles as $article) { ?>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="media media-none--md mb-30">
                                        <div class="position-relative width-40">
                                            <a href="https://domain.ir/show-article/<?= $article['id'] ?>"
                                               class="img-opacity-hover">
                                                <img src="https://domain.ir/<?= $article['image'] ?>"
                                                     alt="news" class="img-fluid">
                                            </a>
                                            <div class="topic-box-top-xs">
                                                <div class="topic-box-sm color-cod-gray mb-20">
                                                    <?php
                                                    if ($article['type'] == "voice") {
                                                        echo "صوتی";
                                                    } elseif ($article['type'] == "video") {
                                                        echo "ویدئویی";
                                                    } elseif ($article['type'] == "picture") {
                                                        echo "تصویری";
                                                    } else {
                                                        echo "خبر";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-body p-mb-none-child media-margin30">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>برای</span>
                                                        <a href="#">
                                                            <?php
                                                            if ($article['location'] == "loc3") {
                                                                echo "loc1";
                                                            } elseif ($article['location'] == "loc2") {
                                                                echo "loc2";
                                                            } else {
                                                                echo "loc3";
                                                            }
                                                            ?>
                                                        </a>
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
                                            <p><?= $article['summary']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                require_once(realpath(dirname(__FILE__) . "/../app/layouts/sidebar.php"));
                ?>
            </div>
        </div>
    </section>
    <!-- Latest Articles Area End Here -->
    <!-- Videos Area Start Here -->
    <section class="bg-secondary-body section-space-default">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-border color-cinnabar mb-30 width-100">
                        <div class="topic-box-lg color-cinnabar">ویدئو های ویژه</div>
                    </div>
                </div>
            </div>
            <div class="ne-carousel nav-control-top2 color-white2" data-loop="true" data-items="3" data-margin="10"
                 data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false"
                 data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                 data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                 data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2"
                 data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="3" data-r-large-nav="true"
                 data-r-large-dots="false">
                <?php foreach ($videoSliders as $videoSlider) { ?>
                    <div class="img-overlay-70-c">
                        <div class="mask-content-sm">
                            <div class="topic-box-sm color-cod-gray mb-20"><?php
                                if ($videoSlider['type'] == "voice") {
                                    echo "صوتی";
                                } elseif ($videoSlider['type'] == "video") {
                                    echo "ویدئویی";
                                } elseif ($videoSlider['type'] == "picture") {
                                    echo "تصویری";
                                } else {
                                    echo "خبر";
                                }
                                ?></div>
                            <h3 class="title-medium-light">
                                <a href="https://domain.ir/show-article/<?= $videoSlider['id'] ?>"><?= $videoSlider['title'] ?></a>
                            </h3>
                        </div>
                        <div class="text-center">
                            <a class="play-btn"
                               href="https://domain.ir/show-article/<?= $videoSlider['id'] ?>">
                                <img src="https://domain.ir/public/app/img/banner/play.png" alt="play"
                                     class="img-fluid">
                            </a>
                        </div>
                        <img src="https://domain.ir/<?= $videoSlider['image'] ?>" alt="news"
                             class="img-fluid width-100" loading="lazy">
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Videos Area Start Here -->
    <!-- Category Area Start Here -->
    <section class="bg-body section-space-less10">
        <div class="container">
            <div class="row tab-space5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-grayscale-hover text-center mb-10">
                        <img src="https://domain.ir/public/index/ozv.jpg" alt="news"
                             class="img-fluid width-100">
                        <div class="content p-30-r">
                            <h3 class="title-regular-light size-lg">
                                <a href="https://domain.ir/register">عضویت در وبسایت</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-grayscale-hover text-center mb-10">
                        <img src="https://domain.ir/public/index/moarefi.jpg" alt="news"
                             class="img-fluid width-100">
                        <div class="content p-30-r">
                            <h3 class="title-regular-light size-lg">
                                <a href="https://domain.ir/contact">معرفی وبسایت</a>
                            </h3>
                            <div class="post-date-light d-block d-sm-none d-md-block">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-grayscale-hover text-center mb-10">
                        <img src="https://domain.ir/public/index/nashrieh.jpg" alt="news"
                             class="img-fluid width-100">
                        <div class="content p-30-r">
                            <h3 class="title-regular-light size-lg">
                                <a href="#">کاتالوگ وبسایت</a>
                            </h3>
                            <div class="post-date-light d-block d-sm-none d-md-block">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>زمستان ۱۳۹۸
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-grayscale-hover text-center mb-10">
                        <img src="https://domain.ir/public/index/resaneh.jpg" alt="news"
                             class="img-fluid width-100">
                        <div class="content p-30-r">
                            <h3 class="title-regular-light size-lg">
                                <a href="https://domain.ir/show-article/48">مسيول IT</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-grayscale-hover text-center mb-10">
                        <img src="https://domain.ir/public/index/loc3.jpg" alt="news"
                             class="img-fluid width-100">
                        <div class="content p-30-r">
                            <h3 class="title-regular-light size-lg">
                                <a href="https://domain.ir/show-category/9">مدیر فروش</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-grayscale-hover text-center mb-10">
                        <img src="https://domain.ir/public/article-gallery/2021-11-23-18-49-06IMAGE%201400-09-02%2022:17:32.jpeg"
                             alt="news"
                             class="img-fluid width-100" style="width=363px;height:243px">
                        <div class="content p-30-r">
                            <h3 class="title-regular-light size-lg">
                                <a href="https://domain.ir/show-category/14">مدیربازرگانی</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Area End Here -->


<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>