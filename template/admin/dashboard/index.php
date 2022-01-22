<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/head-tag.php"));
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">داشبورد</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="">خانه</a></li>
                            <li class="breadcrumb-item active">داشبورد</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $articleCount['COUNT(*)'] ?></h3>

                                <p>پست ها</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-newspaper-o"></i>
                            </div>
                            <a href="https://domain.ir/article" class="small-box-footer"> اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= $articlesViews['SUM(view)'] ?></h3>

                                <p>بازدید کل پست ها</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-eye"></i>
                            </div>
                            <a href="https://domain.ir/article" class="small-box-footer">اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= $userCount['COUNT(*)'] ?></h3>

                                <p>کاربران ثبت شده</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="https://domain.ir/user" class="small-box-footer">اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?= $commentsCount['COUNT(*)'] ?></h3>

                                <p>نظرات</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comment"></i>
                            </div>
                            <a href="https://domain.ir/comment" class="small-box-footer">اطلاعات بیشتر <i
                                        class="fa fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">
                                    <i class="fa fa-pie-chart mr-1"></i>
                                    فروش
                                </h3>
                                <ul class="nav nav-pills mr-auto p-2">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">نمودار</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">چارت</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart"
                                         style="position: relative; height: 300px;"></div>
                                    <div class="chart tab-pane" id="sales-chart"
                                         style="position: relative; height: 300px;"></div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">گفتگو</h3>

                                <div class="card-tools">
                                    <span data-toggle="tooltip" title="3 پیام جدید" class="badge badge-primary">3</span>
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="مخاصبین"
                                            data-widget="chat-pane-toggle">
                                        <i class="fa fa-comments"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i
                                                class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-left">نام</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img"
                                             src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg"
                                             alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            متن پیام آماده
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-right">نام</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img"
                                             src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg"
                                             alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            متن پیام آماده
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                </div>
                                <!--/.direct-chat-messages-->

                                <!-- Contacts are loaded here -->
                                <div class="direct-chat-contacts">
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            حسام موسوی
                            <small class="contacts-list-date float-left">1397/10/01</small>
                          </span>
                                                    <span class="contacts-list-msg">تا حالا کجا بودی ؟‌من...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            سارا فرهانی
                            <small class="contacts-list-date float-left">2/23/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">تا حالا منتظر تو بودم...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            نکیسا کیانی
                            <small class="contacts-list-date float-left">2/20/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">پس بیشتر صبر کن تا برگردم...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            رحمت موسوی
                            <small class="contacts-list-date float-left">2/10/2015</small>
                          </span>
                                                    <span class="contacts-list-msg"> حالتون چطورههههه !...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            جکسون عبداللهی
                            <small class="contacts-list-date float-left">1/27/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">عالیییییییییی...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                     src="https://domain.ir/public/admin/dist/img/user1-128x128.jpg">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            کتایون ریحانی
                            <small class="contacts-list-date float-left">1/4/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">بیخیالش پیداش میکنم...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                    </ul>
                                    <!-- /.contacts-list -->
                                </div>
                                <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..."
                                               class="form-control">
                                        <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!--/.direct-chat -->

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    لیست کارها
                                </h3>

                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list">
                                    <li>
                                        <!-- drag handle -->
                                        <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <!-- checkbox -->
                                        <input type="checkbox" value="" name="">
                                        <!-- todo text -->
                                        <span class="text">طراحی یک قالب زیبا</span>
                                        <!-- Emphasis label -->
                                        <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 دقیقه</small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">رسپانسیو کردن قالب مورد نظر</span>
                                        <small class="badge badge-info"><i class="fa fa-clock-o"></i> 4 ساعت</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">ارائه قالب برای استفاده بقیه</span>
                                        <small class="badge badge-warning"><i class="fa fa-clock-o"></i> 1 روز</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">بهینه سازی بخش های بوجود اومده</span>
                                        <small class="badge badge-success"><i class="fa fa-clock-o"></i> 3 روز</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">چک کردن پیام ها و نوتیفیکیشن ها</span>
                                        <small class="badge badge-primary"><i class="fa fa-clock-o"></i> 1 هفته</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">طراحی صفحه ایمیل جدید</span>
                                        <small class="badge badge-secondary"><i class="fa fa-clock-o"></i> 1 ماه</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> جدید
                                </button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- solid sales graph -->
                        <div class="card bg-info-gradient">
                            <div class="card-header no-border">
                                <h3 class="card-title">
                                    <i class="fa fa-th mr-1"></i>
                                    نمودار فروش
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart" id="line-chart" style="height: 250px;"></div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60"
                                               data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">سفارش ایمیلی</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60"
                                               data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">سفارش آنلاین</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60"
                                               data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">سفارش فیزیکی</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                        <!-- Calendar -->
                        <div class="card bg-success-gradient">
                            <div class="card-header no-border">

                                <h3 class="card-title">
                                    <i class="fa fa-calendar"></i>
                                    تقویم
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fa fa-bars"></i></button>
                                        <div class="dropdown-menu float-right" role="menu">
                                            <a href="#" class="dropdown-item">رویداد تازه</a>
                                            <a href="#" class="dropdown-item">حذف رویدادها</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">نمایش تقویم</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        let active = document.getElementById("dashbourd");
        active.classList.add("active");
    </script>
<?php
require_once(realpath(dirname(__FILE__) . "/../layouts/footer.php"));
?>