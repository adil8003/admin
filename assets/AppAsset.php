<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //Bootstrap CSS
        "vendor/bootstrap-4.0/css/bootstrap.min.css",
        "vendor/bootstrap-4.0/css/bootstrap-theme.css",
        //font icon
        "vendor/font-awesome/css/elegant-icons-style.css",
        "vendor/font-awesome/css/font-awesome.min.css",
        //Custom styles
        "vendor/office/css/widgets.css",
        "vendor/office/css/office.css",
        // Select2
//        "vendor/select2-4.0.0/css/select2.min.css",
        "vendor/select2-4.0.0/css/select2.css",
        // DataTable
        // "vendor/datatable-1.10.9/css/jquery.dataTables.min.css",
        "vendor/datatable-1.10.9/css/dataTables.bootstrap.min.css",
        // foundation date time picker    
        "vendor/foundation-date-time-picker/css/foundation-datepicker.min.css",
        "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css",
        "vendor/morris.js-0.5.1/morris.css",
        "vendor/dropzone/dropzone.css",
        "vendor/dropzone/min/dropzone.min.css",
        //alertify
        "vendor/alertifyjs/css/alertify.css",
        "vendor/alertifyjs/css/themes/default.css",
        "vendor/jquery.datatables.yadcf.css",
    ];
    public $js = [
        //jquery
        //"vendor/jquery/jquery.js",
        "vendor/jquery/jquery-ui-1.10.4.min.js",
        //bootstrap
        "vendor/bootstrap-4.0/js/bootstrap.min.js",
        //nice scroll
        "vendor/nice-scroll/jquery.scrollTo.min.js",
        "vendor/nice-scroll/jquery.nicescroll.js",
        //validation
        "vendor/validate/jquery.validate.js",
        //alertify js
        "vendor/alertifyjs/alertify.js",
        //custom
        "vendor/office/js/office.js",
        // Select2
        "vendor/select2-4.0.0/js/select2.js",
//        "vendor/select2-4.0.0/js/select2.full.min.js",
        // DataTable
        "vendor/datatable-1.10.9/js/jquery.dataTables.min.js",
        "vendor/datatable-1.10.9/js/dataTables.bootstrap.min.js",
        // foundation date time picker    
        "vendor/foundation-date-time-picker/js/foundation-datepicker.min.js",
        "vendor/morris.js-0.5.1/morris.js",
        "vendor/dropzone/dropzone.js",
        "http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js",
        "vendor/nicEdit/nicEdit.js",
        "vendor/jquery.dataTables.yadcf.js",
    ];
    public $depends = [
            //'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];
}
