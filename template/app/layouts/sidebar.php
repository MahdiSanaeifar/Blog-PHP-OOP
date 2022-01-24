<div class="ne-sidebar sidebar-break-lg col-xl-4 col-lg-12">
    <div class="sidebar-box item-box-light-md">
        <div class="topic-border color-cinnabar mb-30">
            <div class="topic-box-lg color-cinnabar">در ارتباط باشید</div>
        </div>
        <ul class="stay-connected-color overflow-hidden">
            <li class="facebook">
                <a href="https://www.aparat.com/username">
                    <img src="https://domain.ir/public/app/img/social-logo/aparat.png" alt="">
                    <div class="connection-quantity">---</div>
                    <p>آپارات</p>
                </a>
            </li>
            <li class="twitter">
                <a href="https://t.me/username">
                    <img src="https://domain.ir/public/app/img/social-logo/telegram.png" alt="">
                    <!--                    <i class="fa fa-telegram" aria-hidden="true"></i>-->
                    <div class="connection-quantity">---</div>
                    <p>تلگرام</p>
                </a>
            </li>
            <li class="linkedin">
                <a href="https://sapp.ir/username">
                    <img src="https://domain.ir/public/app/img/social-logo/sorush.png" alt="">
                    <!--                    <i class="fa fa-telegram" aria-hidden="true"></i>-->
                    <div class="connection-quantity">---</div>
                    <p>سروش</p>
                </a>
            </li>
            <li class="rss">
                <a href="https://instagram.com/username">
                    <img src="https://domain.ir/public/app/img/social-logo/instagram.png" alt="">
                    <!--                    <i class="fa fa-instagram" aria-hidden="true"></i>-->
                    <div class="connection-quantity">---</div>
                    <p>اینستاگرام</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-box img-scale-animate mb-10 ie-full-width">
        <div class="ne-banner-layout1 img-scale-animate mb-10 sidebar-box item-box-light-md-less30 ie-full-width">
            <a href="#">
                <img src="https://domain.ir/<?= $sideBanner['image'] ?>" alt="ad" class="img-fluid" width="341px">
            </a>
        </div>
    </div>
    <div class="sidebar-box item-box-light-md-less30 ie-full-width">
        <ul class="btn-tab item-inline block-xs nav nav-tabs" role="tablist" style="display: grid;">
            <li class="nav-item">
                <a href="#popular" data-toggle="tab" aria-expanded="true" class="active">دارالقرآن امام حسین (ع)</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active show" id="recent">
                <div role="tabpanel" class="tab-pane fade active show" id="popular">
                    <div class="row">
                        <?php foreach ($loc3Articles as $loc3Articles) { ?>
                            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                <div class="position-relative">
                                    <a href="https://domain.ir/show-article/<?= $loc3Articles['id'] ?>"
                                       class="img-opacity-hover">
                                        <img src="https://domain.ir/<?= $loc3Articles['image'] ?>" alt="news"
                                             class="img-fluid width-100 mb-10" loading="lazy">
                                    </a>
                                    <h3 class="title-medium-dark size-sm mb-none">
                                        <a href="https://domain.ir/show-article/<?= $loc3Articles['id'] ?>"><?= $loc3Articles['title'] ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>