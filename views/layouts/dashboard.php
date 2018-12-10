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
        <script src="vendor/jquery/jquery.js"></script>
        <script type='text/javascript' src='js/common/common.js' ></script>
        <link rel="shortcut icon" href="img/favicon.ico">
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="danger">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                        </a>
                    </div>
                    <ul  class="nav" id="sidemenu">
                        <?php if (Yii::$app->session['role'] === 'Admin') { ?>
                            <li class="active">
                                <a class="" href="index.php?r=dashboard">
                                    <i class="ti-dashboard"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=crm">
                                    <i class="ti-user"></i>
                                    <p>C-R-M</p>
                                </a>
                            </li>
<!--                            <li class="sub-menu">
                                <a href="index.php?r=voicecall">
                                    <i class="ti-user"></i>
                                    <p>calling</p>
                                </a>
                            </li>-->
                            <li class="sub-menu">
                                <a href="index.php?r=users">
                                    <i class="ti-user"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=residential">
                                    <!--<i class="ti-blackboard"></i>-->
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                    <p>New Residential project</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=commercial">
                                    <!--<i class="ti-blackboard"></i>-->
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                    <p>Commercial project</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=resale">
                                    <i class="ti-exchange-vertical"></i>
                                    <p>RESALE</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=website/project">
                                    <i class="ti-help-alt"></i>
                                    <p>Post your project</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=website/web">
                                    <i class="ti-user"></i>
                                    <p>Website Customers</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=website">
                                    <i class="ti-image"></i>
                                    <p>website</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=profile">
                                    <i class="ti-face-smile"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=settings">
                                    <i class="ti-settings"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=task">
                                    <i class="ti-settings"></i>
                                    <p>Task</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=site/logout">
                                    <i class="ti-lock"></i>
                                    <p>Logout</p>
                                </a>
                            </li>

                        <?php } ?>
                        <?php if (Yii::$app->session['role'] === 'Employee') { ?>
                            <li class="active">
                                <a class="" href="index.php?r=dashboard">
                                    <i class="ti-dashboard"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=users/crm">
                                    <i class="ti-user"></i>
                                    <p>C-R-M</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=residential">
                                    <!--<i class="ti-blackboard"></i>-->
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                    <p>New Residential project</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=commercial">
                                    <!--<i class="ti-blackboard"></i>-->
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                    <p>Commercial project</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=resale">
                                    <i class="ti-exchange-vertical"></i>
                                    <p>RESALE</p>
                                </a>
                            </li>
<!--                            <li class="sub-menu">
                                <a href="index.php?r=website/project">
                                    <i class="ti-help-alt"></i>
                                    <p>Request Project from website</p>
                                </a>
                            </li>-->
                            <li class="sub-menu">
                                <a href="index.php?r=website/web">
                                    <i class="ti-user"></i>
                                    <p>website Customers</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=website">
                                    <i class="ti-image"></i>
                                    <p>website</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=profile">
                                    <i class="ti-face-smile"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=settings">
                                    <i class="ti-settings"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=task">
                                    <i class="ti-settings"></i>
                                    <p>Task</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=site/logout">
                                    <i class="ti-lock"></i>
                                    <p>Logout</p>
                                </a>
                            </li>

                        <?php } ?>

                        <?php if (Yii::$app->session['role'] === 'External employee') { ?>
                            <li class="active">
                                <a class="" href="index.php?r=dashboard">
                                    <i class="ti-dashboard"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="index.php?r=voicecall">
                                    <i class="ti-user"></i>
                                    <p>calling</p>
                                </a>
                            </li>
                            <!--                            <li class="sub-menu">
                                                            <a href="index.php?r=rent">
                                                                <i class="ti-blackboard"></i>
                                                                <p>RENT</p>
                                                            </a>
                                                        </li>
                                                        <li class="sub-menu">
                                                            <a href="index.php?r=resale">
                                                                <i class="ti-blackboard"></i>
                                                                <p>RESALE</p>
                                                            </a>
                                                        </li>
                                                        <li class="sub-menu">
                                                            <a href="index.php?r=residential">
                                                                <i class="ti-blackboard"></i>
                                                                <p>Residential</p>
                                                            </a>
                                                        </li>
                                                        <li class="sub-menu">
                                                            <a href="index.php?r=profile">
                                                                <i class="ti-face-smile"></i>
                                                                <p>Profile</p>
                                                            </a>
                                                        </li>-->
                            <li class="sub-menu">
                                <a href="index.php?r=site/logout">
                                    <i class="ti-lock"></i>
                                    <p>Logout</p>
                                </a>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="main-panel">  
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <div id="alert-msg" class="alert"> </div>
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Hi <?php echo Yii::$app->session['email']; ?> <span style="font-size: 15px;"> ( <?php echo Yii::$app->session['role']; ?>)</span></a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <!-- <alert></alert>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="ti-bell"></i>
                                        <p class="notification">5</p>
                                        <p>Notifications</p>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Notification 1</a></li>
                                        <li><a href="#">Notification 2</a></li>
                                        <li><a href="#">Notification 3</a></li>
                                        <li><a href="#">Notification 4</a></li>
                                        <li><a href="#">Another notification</a></li>
                                    </ul>
                                </li> -->
                                <!--  <li>
                                     <a href="index.php?r=site/logout">
                                         <i class="ti-lock"></i>
                                         <p>Logout</p>
                                     </a>
                                 </li> -->
                            </ul>

                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        <!--<div id="main-content">-->
                            <!--<section class="content">-->
                        <?= $content ?>
                        <!--</section>wrapper end-->
                        <!--</div>main content end-->
                    </div>
                </div>

            </div>
            <footer class="footer footercss hide">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Terms & Conditions
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; <?php echo $today = date("F j, Y"); ?>, made with <i class="fa fa-heart heart"></i> by <a href="https://www.imgapti.com">IMGAPTI</a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- javascripts -->
        <script>
            $(document).ready(function () {
                var strUrl = window.location.href;
                var curURl = getUrlMenu();
                var strLastUrl = strUrl.replace(curURl, '');
                var curText = getCurText(strLastUrl);
                $('#sidemenu li ').each(function (k, v) {
                    $(this).removeClass('active');
                    var txt = $(this).find('a p').html().trim().toLowerCase();
                    if (curText == txt) {
                        $(this).addClass('active');
                    }
                })
                function getCurText(strLastUrl) {
                    var curtext = 'dashboard';
                    var n = strLastUrl.indexOf('/');
                    var text = strLastUrl.substring(0, n != -1 ? n : strLastUrl.length);
                    switch (text) {
                        case 'course':
                            curtext = 'courses';
                            break;
                        case 'dashboard':
                            curtext = 'dashboard';
                            break;
                        case 'profile':
                            curtext = 'profile';
                            break;
                        case 'organisation':
                            curtext = 'organisations';
                            break;
                        case 'orgprofile':
                            curtext = 'organisation';
                            break;
                        case 'settings':
                            curtext = 'settings';
                            break;
                        case 'employeecourses':
                            curtext = 'course';
                            break;
                        case 'employeeorganisation':
                            curtext = 'organisation';
                            break;
                        case 'users':
                            curtext = 'users';
                            break;
                        case 'orgusers':
                            curtext = 'employees';
                            break;
                    }
                    return curtext;
                }
            });
        </script>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>