<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
        <!-- The fav icon -->
        <script src="/vendor/jquery/jquery.js"></script>
        <link rel="shortcut icon" href="img/favicon.ico">
    </head>
    <body>

<?php $this->beginBody() ?>
        <section id="container" class="">  <!-- container section start -->
            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>
                <!--logo start-->
                <a href="index.php?r=dashboard" class="logo">Unique Properties <span class="lite">And Finance</span></a>
                <!--logo end-->
                <div class="top-nav notification-row">
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">

                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a href="#">
                                <span class="profile-ava">
                                    <i class="icon_profile"></i>
                                </span>
                                <span class="username"><?php echo Yii::$app->session['username']; ?></span>
                            </a>
                        </li>
                        <!-- user login dropdown end -->

                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">
                        <input id="controller" type="hidden" value="" />
                        <li class="active">
                            <a class="" href="index.php?r=dashboard">
                                <i class="icon_house_alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- Property Start Admin, Employee-->
<?php if (Yii::$app->session['role'] == 'Admin' || Yii::$app->session['role'] == 'Employee') { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" class="index.php?r=property">
                                    <i class="icon_desktop"></i>
                                    <span>Property</span>
                                    <span class="menu-arrow arrow_carrot-right"></span>
                                </a>
                                <ul class="sub">
                                    <li><a class="" href="index.php?r=dashboard">Dashboard</a></li>
                                    <li><a class="" href="index.php?r=property/search">Search</a></li>
                                    <li><a class="" href="index.php?r=property/add">Add</a></li>
                                    <li><a class="" href="index.php?r=property/searchcustomer">Search Customer </a></li>
                                </ul>
                            </li>
<?php } ?>
                        <!-- Property End-->
                        <!-- FS Start Admin, Employee-->
<?php if (Yii::$app->session['role'] == 'Admin' || Yii::$app->session['role'] == 'Financial') { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" class="index.php?r=financialservices">
                                    <i class="icon_desktop"></i>
                                    <span>Fin. Services</span>
                                    <span class="menu-arrow arrow_carrot-right"></span>
                                </a>
                                <ul class="sub">
                                    <li><a class="" href="index.php?r=financialservices">Dashboard</a></li>
                                    <!--                          <li><a class="" href="index.php?r=financialservices/search">Investment</a></li>-->
                                    <li><a class="" href="index.php?r=financialservices/loan">Loan Small Content</a></li>
                                    <li><a class="" href="index.php?r=financialservices/loanlargecontent">Loan Large Content</a></li>
                                    <li><a class="" href="index.php?r=financialservices/financial">Fin. Small Content</a></li>
                                    <li><a class="" href="index.php?r=financialservices/financiallargecontent">Fin. Large Content</a></li>
                                </ul>
                            </li>
<?php } ?>
                        <!-- FS End-->
                        <!-- Property Start Admin, Employee-->
<?php if (Yii::$app->session['role'] == 'Admin' || Yii::$app->session['role'] == 'Website') { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" class="index.php?r=website">
                                    <i class="icon_desktop"></i>
                                    <span>Website</span>
                                    <span class="menu-arrow arrow_carrot-right"></span>
                                </a>
                                <ul class="sub">
                                    <li><a class="" href="index.php?r=website">Dashboard</a></li>
                                    <li><a class="" href="index.php?r=website/blog">Blog</a></li>
                                    <li><a class="" href="index.php?r=website/services">Services</a></li>
                                    <li><a class="" href="index.php?r=website/aboutus">About us</a></li>
                                </ul>
                            </li>
<?php } ?>
                        <!-- Property End-->
                        <!-- HR Start-->
<?php if (Yii::$app->session['role'] == 'Admin' || Yii::$app->session['role'] == 'HR') { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" class="index.php?r=humanresource">
                                    <i class="icon_desktop"></i>
                                    <span>Human Resource</span>
                                    <span class="menu-arrow arrow_carrot-right"></span>
                                </a>
                                <ul class="sub">
                                    <li><a class="" href="index.php?r=humanresource">Dashboard</a></li>
                                    <li><a class="" href="index.php?r=humanresource/recruitment">Recruitment</a></li>
                                    <li><a class="" href="index.php?r=humanresource/employee">Employee</a></li>
                                    <li><a class="" href="index.php?r=humanresource/attendence">Attendence</a></li>
                                    <!--<li><a class="" href="index.php?r=humanresource/financial">Financial Services</a></li>-->
                                    <li><a class="" href="index.php?r=humanresource/leave">Leave Mgmt </a></li>
                                </ul>
                            </li>
<?php } ?>
                        <!-- HR End-->
                        <li class="sub-menu">
                            <a href="javascript:;" class="index.php?r=actionitems">
                                <i class="icon_desktop"></i>
                                <span>Action Items</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="index.php?r=actionitems">Dashboard</a></li>
                                <li><a class="" href="index.php?r=actionitems/items">Task</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" class="index.php?r=employee">
                                <i class="icon_desktop"></i>
                                <span>Employee</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="index.php?r=employee">dashboard</a></li>
                                <li><a class="" href="index.php?r=employee/profile">Profile</a></li>
                                <li><a class="" href="index.php?r=employee/attendence">Attendence</a></li>
                                <li><a class="" href="index.php?r=employee/leave">Leave</a></li>
                            </ul>
                        </li>
                        <li >
                            <a class="" href="index.php?r=site/logout">
                                <i class="icon_house_alt"></i><span>Logout</span>
                            </a>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->


            <section id="main-content"><!--main content start-->
                <section class="wrapper"> <!--wraper start-->

<?= $content ?>

                </section><!--wrapper end-->
            </section><!--main content end-->
        </section>  <!-- container section end -->
        <!-- javascripts -->
        <script>
            $(document).ready(function () {
                var u = window.location.href;
                $('.sidebar-menu > li').each(function (k, v) {
                    $(this).removeClass('active');
                    var l = $(this).find('a').attr('class');
                    var i = u.indexOf(l);
                    if (i > 1) {
                        $(this).addClass('active');
                    }
                })
            });
        </script>
<?php $this->endBody() ?>
        <div id="dialog" title="">
            <p id="dialog-msg"></p>
        </div>
    </body>
</html>
<?php $this->endPage() ?>