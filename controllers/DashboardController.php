<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Status;
use app\models\Resproject;
use app\models\Resproperty;
use app\models\Comproject;
use app\models\Comproperty;
use app\models\Resprojectproperty;
use app\models\Resprojectproject;
use app\models\Resprojectimage;
use app\models\Resprojectamaneties;
use app\models\Resprojectgeolocation;
use app\models\Resprojectcost;
use app\models\Respropertyamaneties;
use app\models\Respropertygeolocation;
use app\models\Respropertyimage;
use app\models\Respropertycost;
use app\models\Respropertytype;
use app\models\Respropertyproject;
use app\models\Comprojectamaneties;
use app\models\Comprojectgeolocation;
use app\models\Comprojectproject;
use app\models\Comprojectoffice;
use app\models\Comprojectimage;
use app\models\Builder;
use app\models\Customer;
use app\models\Resprojctfeedback;
use app\models\Respropertyfeedback;
use app\models\Comprojectfeedback;
use app\models\Ownershiptype;
use app\models\Respropertyabout;
use app\models\Respropertyflattype;
use app\models\Respropertyparking;
use app\models\Respropertyfurnishedstatus;
use app\models\Commercialprojtype;
use app\models\Comprojectpreferred;
use app\models\Comprojectfurnishing;
use app\models\Generalfeedback;
use app\models\Resprojectmicrositedetails;
use app\models\Comprojectmicrositedetails;
use app\models\Followup;
use app\models\Resaleproperty;
use app\models\Resalepropertyimage;
use app\models\Searchproperty;
use app\models\Postproperty;



class DashboardController extends Controller {

    public function init() {
        if (Yii::$app->session['isLoggedIn'] != true) {
            return $this->redirect('index.php?r=site/login');
        }
        $this->layout = "dashboard";
    }

  public function actionIndex() {
        $connection = Yii::$app->db;
//
//////////----------------ALL DATA
        $date=date('Y-m-d');
//       $yesterday = date('Y-m-d ',strtotime("-1 days"));
//       $yesterday_start = date('Y-m-d 00:00:00',strtotime("-1 days"));
//        $yesterday_end = date('Y-m-d 23:59:59',strtotime("-1 days"));      
//          // $yesterday = date('Y-m-d',strtotime("-1 days"));
//      $lastWeek = date('Y-m-d',strtotime("-6 days"));
//      $lastWeek_start = date('Y-m-d 00:00:00',strtotime("-6 days"));
//      $lastMonth = date('Y-m-d',strtotime("-30 days"));
//      $lastMonth_start = date('Y-m-d 00:00:00',strtotime("-30 days"));
//        $model = new User();
//        $objUser = $model->findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
//
//    //------------------ Resproject Deatils
//       $objResproject = Resproject::find()->all();        
//       $countResproject=count($objResproject);
//      $ResprojectQuery1="SELECT *  FROM resproject WHERE added_date BETWEEN '$yesterday_start' AND '$yesterday_end' ";
//      $ResprojectQuery2="SELECT *  FROM resproject WHERE added_date BETWEEN '$lastWeek_start' AND '$yesterday_start' ";
//      $ResprojectQuery3="SELECT *  FROM resproject WHERE added_date BETWEEN '$lastMonth_start' AND '$yesterday_start' ";
//     $YesterdayResproject = $connection->createCommand($ResprojectQuery1)->queryAll();
//     $countYesterdayResproject = count($YesterdayResproject);
//     $LastWeekResproject = $connection->createCommand($ResprojectQuery2)->queryAll();
//     $countLastWeekResproject = count($LastWeekResproject);
//     $LastMonthResproject = $connection->createCommand($ResprojectQuery3)->queryAll();        
//     $countLastMonthResproject = count($LastMonthResproject);
//
////////////////--------------BUILDER DETAILS
//       $objBuilder = Builder::find()->all();
//       $countBuilder = count($objBuilder);
//      $BuilderQuery1="SELECT *  FROM builder WHERE addeddate BETWEEN '$yesterday_start' AND '$yesterday_end' ";
//      $BuilderQuery2="SELECT *  FROM builder WHERE addeddate BETWEEN '$lastWeek_start' AND '$yesterday_start' ";
//    $BuilderQuery3="SELECT *  FROM builder WHERE addeddate BETWEEN '$lastMonth_start' AND '$yesterday_start' ";
//     $YesterdayBuilder = $connection->createCommand($BuilderQuery1)->queryAll();
//     $countYesterdayBuilder = count($YesterdayBuilder);
//     $LastWeekBuilder = $connection->createCommand($BuilderQuery2)->queryAll();
//     $countLastWeekBuilder = count($LastWeekBuilder);
//     $LastMonthBuilder = $connection->createCommand($BuilderQuery3)->queryAll();        
//     $countLastMonthBuilder = count($LastMonthBuilder);
//
//
///////////----------------------CUSTOMER DETAILS
//        $objCustomer = Customer::find()->all();
//        $countCustomer = count($objCustomer);
//      $CustomerQuery1="SELECT *  FROM customer WHERE addeddate BETWEEN '$yesterday_start' AND '$yesterday_end' ";
//      $CustomerQuery2="SELECT *  FROM customer WHERE addeddate BETWEEN '$lastWeek_start' AND '$yesterday_start' ";
//      $CustomerQuery3="SELECT *  FROM customer WHERE addeddate BETWEEN '$lastMonth_start' AND '$yesterday_start' ";
//     $YesterdayCustomer = $connection->createCommand($CustomerQuery1)->queryAll();
//     $countYesterdayCustomer = count($YesterdayCustomer);
//     $LastWeekCustomer = $connection->createCommand($CustomerQuery2)->queryAll();
//     $countLastWeekCustomer = count($LastWeekCustomer);
//     $LastMonthCustomer = $connection->createCommand($CustomerQuery3)->queryAll();        
//     $countLastMonthCustomer = count($LastMonthCustomer);
//
//
/////////////--------------------RESALE PROPERTIES DETAILS
//        $objResaleproperty = Resaleproperty::find()->all();
//        $countResaleproperty = count($objResaleproperty);
//      $ResaleQuery1="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$yesterday_start' AND '$yesterday_end' ";
//      $ResaleQuery2="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$lastWeek_start' AND '$yesterday_start' ";
//      $ResaleQuery3="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$lastWeek_start' AND '$yesterday_start' ";
//     $YesterdayResale = $connection->createCommand($ResaleQuery1)->queryAll();
//     $countYesterdayResale = count($YesterdayResale);
//     $LastWeekResale = $connection->createCommand($ResaleQuery2)->queryAll();
//     $countLastWeekResale = count($LastWeekResale);
//     $LastMonthResale = $connection->createCommand($ResaleQuery3)->queryAll();        
//     $countLastMonthResale = count($LastMonthResale);
//
////////////////----------------COMPROJECT DETAILS
//        $objComproject = Comproject::find()->all();
//        $countComproject = count($objComproject);
//      $ComQuery1="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$yesterday_start' AND '$yesterday_end' ";
//      $ComQuery2="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$lastWeek_start' AND '$yesterday_start' ";
//      $ComQuery3="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$lastMonth_start' AND '$yesterday_start' ";
//     $YesterdayCom = $connection->createCommand($ComQuery1)->queryAll();
//     $countYesterdayCom = count($YesterdayCom);
//     $LastWeekCom = $connection->createCommand($ComQuery2)->queryAll();
//     $countLastWeekCom = count($LastWeekCom);
//     $LastMonthCom = $connection->createCommand($ComQuery3)->queryAll();        
//     $countLastMonthCom = count($LastMonthCom);
//
//////////////----------------GENERAL FEEDBACK DEATILS
//    $objGenfeedback = Generalfeedback::find()->all();
//    $countGeneralFeedback = count($objGenfeedback);
//    $GeneralFeednbackQuery1="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$yesterday_start' AND '$yesterday_end' ";
//      $GeneralFeednbackQuery2="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$lastWeek_start' AND '$yesterday_start' ";
//      $GeneralFeednbackQuery3="SELECT *  FROM resaleproperty WHERE added_date BETWEEN '$lastMonth_start' AND '$yesterday_start' ";
//     $YesterdayGeneralFeednback = $connection->createCommand($GeneralFeednbackQuery1)->queryAll();
//     $countYesterdayGeneralFeednback = count($YesterdayGeneralFeednback);
//     $LastWeekGeneralFeednback = $connection->createCommand($GeneralFeednbackQuery2)->queryAll();
//     $countLastWeekGeneralFeednback = count($LastWeekGeneralFeednback);
//     $LastMonthGeneralFeednback = $connection->createCommand($GeneralFeednbackQuery3)->queryAll();        
//     $countLastMonthGeneralFeednback = count($LastMonthGeneralFeednback);
//
/////////-------------------FOLLOWUP DETAILS
//  $query="SELECT f.* ,c.name AS customername,c.phone AS customerphone FROM
//         followup f, customer c WHERE f.customerid=c.id AND f.followupdate='$date'";
//         $objFollowup = $connection->createCommand($query)->queryAll();
//        $TotalProperties = $countResproject + $countResaleproperty + $countComproject;
//        $TotalPropertiesYesterday = $countYesterdayResproject + $countYesterdayResale + $countYesterdayCom;
//        $TotalPropertiesLastWeek = $countLastWeekResproject + $countLastWeekResale + $countLastWeekCom;
//        $TotalPropertiesLastMonth = $countLastMonthResproject + $countLastMonthResale + $countLastMonthCom;                        
//
//         $objLiveData = Searchproperty::find()->where(['status' => 'Active'])->all();
//         $objPostproperty = Postproperty::find()->all();
       
        return $this->render('index', [
//                    'objUser' => $objUser,
//                    'countResproject' => $countResproject,
//                    'countYesterdayResproject' => $countYesterdayResproject,
//                    'countLastWeekResproject' => $countLastWeekResproject,
//                    'countLastMonthResproject' => $countLastMonthResproject,
//                    'countBuilder' => $countBuilder,
//                    'countYesterdayBuilder' => $countYesterdayBuilder,
//                    'countLastWeekBuilder' => $countLastWeekBuilder,
//                    'countLastMonthBuilder' => $countLastMonthBuilder,
//                    'countCustomer' => $countCustomer,
//                    'countYesterdayCustomer' => $countYesterdayCustomer,
//                    'countLastWeekCustomer' => $countLastWeekCustomer,
//                    'countLastMonthCustomer' => $countLastMonthCustomer,
//                    'countResaleproperty' => $countResaleproperty,
//                    'countYesterdayResale' => $countYesterdayResale,
//                    'countLastWeekResale' => $countLastWeekResale,
//                    'countLastMonthResale' => $countLastMonthResale,
//                    'countComproject' => $countComproject,
//                    'countYesterdayCom' => $countYesterdayCom,
//                    'countLastWeekCom' => $countLastWeekCom,
//                    'countLastMonthCom' => $countLastMonthCom,
//                    'objFollowup' => $objFollowup,
                    'date' => $date,
//                    'yesterday' => $yesterday,
//                    'lastWeek' => $lastWeek,
//                    'lastMonth' => $lastMonth,
//                    'countGeneralFeedback' => $countGeneralFeedback,
//                    'countYesterdayGeneralFeednback' => $countYesterdayGeneralFeednback,
//                    'countLastWeekGeneralFeednback' => $countLastWeekGeneralFeednback,
//                    'countLastMonthGeneralFeednback' => $countLastMonthGeneralFeednback,
//                    'TotalProperties' => $TotalProperties,
//                    'TotalPropertiesYesterday' => $TotalPropertiesYesterday,
//                    'TotalPropertiesLastWeek' => $TotalPropertiesLastWeek,
//                    'TotalPropertiesLastMonth' => $TotalPropertiesLastMonth,
//                    'objLiveData' => $objLiveData,
//                    'objPostproperty' => $objPostproperty
        ]);
    }




    public function actionError() {
        return $this->render('error', [
        ]);
    }

}

// end of DashboardController.php
