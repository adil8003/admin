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
    <link rel="shortcut icon" href="img/favicon.ico">
	<script src="bower_components/jquery/jquery.min.js"></script>
</head>
<body>

<?php $this->beginBody() ?>
    <!-- topbar starts -->
	<?php if(!\Yii::$app->user->isGuest){ ?>
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>Admin </span></a>

            <!-- user dropdown starts -->
			<?php if(!\Yii::$app->user->isGuest){ ?>
            <!--<div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="login.php">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?r=site/logout">Logout</a></li>
                </ul>
            </div>
			-->
			<?php } ?>
            <!-- user dropdown ends -->

            <!--<ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query" type="text">
                    </form>
                </li>
            </ul>
			-->
        </div>
    </div>
	<?php } ?>
    <!-- topbar ends -->
	<div class="ch-container">
    <div class="row">
        <!-- left menu starts -->
		<?php if(!\Yii::$app->user->isGuest){ ?>
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="index.php?r=site/dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>
                        <li><a class="ajax-link" href="index.php?r=customers"><i class="glyphicon glyphicon-eye-open"></i><span> Customers</span></a></li>
                        <li><a class="ajax-link" href="index.php?r=property"><i class="glyphicon glyphicon-road"></i><span> Property</span></a></li>


                       <li class="nav-header hidden-md">Admin (In Progress)</li>
                        <li><a class="ajax-link" href="index.php?r=site/logout" ><i
                                    class="glyphicon glyphicon-log-out"></i><span> Logout</span></a></li>
                      <!--   <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Child Menu 1</a></li>
                                <li><a href="#">Child Menu 2</a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="calendar.html"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                        </li>
                        <li><a class="ajax-link" href="grid.html"><i
                                    class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                        <li><a href="tour.html"><i class="glyphicon glyphicon-globe"></i><span> Tour</span></a></li>
                        <li><a class="ajax-link" href="icon.html"><i
                                    class="glyphicon glyphicon-star"></i><span> Icons</span></a></li>
                        <li><a href="error.html"><i class="glyphicon glyphicon-ban-circle"></i><span> Error Page</span></a>
                        </li>
                        <li><a href="login.html"><i class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                     -->
						</li>

                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->
		<?php }else{ ?>
		<div class="row">
			<div class="col-md-12 center login-header">
				<h2>Welcome to Unique P.A.F.</h2>
			</div>
        </div>

		<noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>
	<?php } ?>
	<?php if(!\Yii::$app->user->isGuest){ ?>
	<div id="content" class="col-lg-10 col-sm-10">
        <!-- content starts -->
			<div>
				<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>

			</div>
		<div class=" row">
			<?= $content ?>
        </div>
    </div>
	<?php }else{ ?>
			<div class=" row">
			<?= $content ?>
        </div>
	<?php } ?>

	</div>
	</div>
    <hr>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">�</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <a href="http://office.tglobalsolutions.com" target="_blank">Demo Office </a> <?= date('Y') ?></p>
            <p class="pull-right"> Powered By:<a href="http://www.sancsvision.com" target="_blank"> SancsVision</a></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
