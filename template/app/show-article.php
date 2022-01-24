<?php
session_start();
require_once(realpath(dirname(__FILE__) . "/../app/layouts/head-tag.php"));
?>
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="news-details-layout1">
                    <div class="position-relative mb-30">
                        <img src="https://domain.ir/<?= $article['image'] ?>" width="730px" alt="news-details"
                             class="img-fluid">
                        <div class="topic-box-top-sm">
                            <div class="topic-box-sm color-cinnabar mb-20">
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
                    <h2 class="title-semibold-dark size-c30"><?= $article['title'] ?></h2>
                    <ul class="post-info-dark mb-30">
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"
                                   aria-hidden="true"></i><?= gregorian_to_jalali(date("Y", strtotime($article['created_at'])), date("m", strtotime($article['created_at'])), date("d", strtotime($article['created_at'])), '/'); ?>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-eye" aria-hidden="true"></i><?= $article['view'] ?></a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-comments"
                                   aria-hidden="true"></i><?php if ($commentsCount['COUNT(*)'] == "0") {
                                    echo "ندارد";
                                } else {
                                    echo $commentsCount['COUNT(*)'];
                                } ?></a>
                        </li>
                    </ul>
                    <p><?= $article['summary'] ?></p>
                    <p><?= $article['costumecode'] ?></p>
                    <p><?= $article['body'] ?></p>
                    <!-- Gallery Page Area Start Here -->
                    <section class="bg-body section-space-less4">
                        <div class="container">
                            <div class="row tab-space2 zoom-gallery">
                                <?php foreach ($gallery as $showGallery) { ?>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="gallery-layout-2 popup-icon-hover">
                                            <div class="img-overlay-70">
                                                <a class="" href="">
                                                    <img src="https://domain.ir/<?= $showGallery['image'] ?>"
                                                         alt="news" class="width-100 img-fluid" loading="lazy">
                                                </a>
                                                <a href="https://domain.ir/<?= $showGallery['image'] ?>"
                                                   class="ne-zoom img-popup-icon-layout2" title="نام وبسایت">
                                                    <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                    <!-- Gallery Page Area End Here -->

                    <div class="post-share-area mb-40 item-shadow-1">
                        <p>به اشتراک گذاری این مطلب!</p>
                        <ul class="social-default item-inline">
                            <li>
                                <a href="https://wa.me/?text=https://domain.ir/show-article/<?= $article['id'] ?>"
                                   class="btn-success">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/intent/tweet?url=https://domain.ir/show-article/<?= $article['id'] ?>"
                                   class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://t.me/share/url?url=https://domain.ir/show-article/<?= $article['id'] ?>"
                                   class="pinterest">
                                    <i class="fa fa-telegram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://eitaa.com/share/url?url=https://domain.ir/show-article/<?= $article['id'] ?>"
                                   class="rss">
                                    ایتا
                                </a>
                            </li>
                            <li>
                                <a href="https://gap.im/share/url?url=https://domain.ir/show-article/<?= $article['id'] ?>"
                                   class="google">
                                    گپ
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="comments-area">
                        <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20"><?php if ($commentsCount['COUNT(*)'] == "0") {
                                echo "دیدگاهی برای نمایش وجود ندارد";
                            } else {
                                echo $commentsCount['COUNT(*)'] . " دیدگاه";
                            } ?></h2>
                        <ul>
                            <?php foreach ($comments as $comment) { ?>
                                <li>
                                    <div class="media media-none-xs">
                                        <img src="https://domain.ir/public/app/img/news/personlogo.jpeg"
                                             width="120px" class="img-fluid rounded-circle" alt="comments">
                                        <div class="media-body comments-content media-margin30">
                                            <h3 class="title-semibold-dark">
                                                <a href="#"><?= $comment['username'] ?> ،
                                                    <span> <?= gregorian_to_jalali(date("Y", strtotime($comment['created_at'])), date("m", strtotime($comment['created_at'])), date("d", strtotime($comment['created_at'])), '/'); ?> </span>
                                                </a>
                                            </h3>
                                            <p><?= $comment['comment'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <div class="leave-comments">
                            <h2 class="title-semibold-dark size-xl mb-40">ارسال دیدگاه</h2>
                            <form action="https://domain.ir/comment-store" method="post">
                                <div class="row">
                                    <input name="article_id" type="hidden" value="<?= $id ?>">
                                    <div class="col-12">
                                        <div class="form-group">
                                        <textarea placeholder="متن پیام شما *" class="textarea form-control"
                                                  rows="5" cols="20" name="comment" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-none">
                                            <button type="submit" class="btn-ftg-ptp-45">ارسال دیدگاه</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
					<div class="alert alert-warning" role="alert">
                            <span><i class="fa fa-user" aria-hidden="true"></i> برای ارسال دیدگاه، لطفا ابتدا وارد شوید!</span>
                            <hr>
                            <div class="d-grid gap-2">
                                <a href="http://domain.ir/panel" class="btn btn-outline-dark btn-block" style="font-size:17px;">ورود به حساب کاربری</a>
                                <a href="http://domain.ir/register" class="btn btn-outline-success btn-block" style="font-size:17px">عضویت حساب کاربری جدید</a>
                            </div>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
            <?php
            require_once(realpath(dirname(__FILE__) . "/../app/layouts/sidebar.php"));
            ?>
        </div>
    </div>
</section>
<!-- News Details Page Area End Here -->
<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>

