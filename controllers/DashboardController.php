<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Userroles;
use app\models\Status;
use app\models\Organisation;

class DashboardController extends Controller {

    public $enableCsrfValidation = false;
    public $userid = '';
    public $base_path = 'C:\wamp\www\kiwings/';

    public function init() {
        if (Yii::$app->session['isLoggedIn'] != true) {
            return $this->redirect('index.php?r=site/login');
        }
        $this->layout = "dashboard";
    }

    public function actionIndex() {
        if ((Yii::$app->session['role'] === 'Admin')) {
//        $objUserroles = Userroles::find()->where(['user_id' => Yii::$app->session['userid']])->one();
            return $this->render('dashboard-admin', [
//                        'objUserroles' => $objUserroles
            ]);
        } else if ((Yii::$app->session['role'] === 'Employee')) {
            return $this->render('dashboard-employee', [
            ]);
        }
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }

    public function actionGetallprojectandcustomercount() {
        $arrCount['status'] = FALSE;
        $arrJSON = array();
        $arrCount = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;

        //  Count list
        $objResidential = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                         ')->queryAll();
        $objCrm = $connection->createCommand('Select c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                          ')->queryAll();
        $objResale = $connection->createCommand('Select r.id,r.ownername,r.added_date,r.contact,r.location,
                                    r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                        ')->queryAll();

//         --- Inactive list
        $objResaleInactive = $connection->createCommand('Select r.id,r.ownername,r.added_date,r.contact,r.location,
                                    r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                       where r.statusid = ' . 1 . '  ORDER BY `added_date` DESC ')->queryAll();
        $objResidentialInactive = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                         where r.statusid = ' . 1 . '  ORDER BY `addeddate` DESC ')->queryAll();
        $objCrmInactive = $connection->createCommand('Select c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        where c.statusid = ' . 1 . '  ORDER BY `addeddate` DESC ')->queryAll();
//         --- Active list
        $objResaleActive = $connection->createCommand('Select r.id,r.ownername,r.added_date,r.contact,r.location,
                                    r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                       where r.statusid = ' . 2 . '   ')->queryAll();
        $objResidentialActive = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                         where r.statusid = ' . 2 . '   ')->queryAll();
        $objCrmActive = $connection->createCommand('Select c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        where c.statusid = ' . 2 . '  ORDER BY `addeddate` DESC ')->queryAll();

        $ResCount = count($objResidential);
        $CrmCount = count($objCrm);
        $ResaleCount = count($objResale);

//        active acount
        $objResaleActive = count($objResaleActive);
        $objResidentialActive = count($objResidentialActive);
        $objCrmActive = count($objCrmActive);
//        inactive count
        $objResaleInactive = count($objResaleInactive);
        $objResidentialInactive = count($objResidentialInactive);
        $objCrmInactive = count($objCrmInactive);
        if ($ResCount || $ResCount) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['rescount'] = $ResCount;
            $arrTemp['crmcount'] = $CrmCount;
            $arrTemp['resalecount'] = $ResaleCount;
            $arrTemp['resaleactive'] = $objResaleActive;
            $arrTemp['resactive'] = $objResidentialActive;
            $arrTemp['crmactive'] = $objCrmActive;
            $arrTemp['resaleinactive'] = $objResaleInactive;
            $arrTemp['resinactive'] = $objResidentialInactive;
            $arrTemp['crminactive'] = $objCrmInactive;
            $arrCount[] = $arrTemp;
        }
        $arrJSON['data'] = $arrCount;
        echo json_encode($arrJSON);
    }

    public function actionGetalltodaycallcustomerlist() {
        $arrTodaycustomerList['status'] = FALSE;
        $arrJSON = array();
        $arrTodaycustomerList = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $TodayM = date("m");
        $TodayD = date("d");
        $objData = $connection->createCommand('Select c.id,f.followupdate,f.addeddate as fdate,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                         LEFT join `followup` f on f.crm_id = c.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.statusid = ' . 2 . ' ')->queryAll();
        foreach ($objData AS $objrow) {
            $M = date('m', strtotime($objrow['followupdate']));
            $D = date('d', strtotime($objrow['followupdate']));
            if ($TodayM == $M && $TodayD == $D) {
                $arrTemp = array();
                $arrTemp['status'] = TRUE;
                $arrTemp['id'] = $objrow['id'];
                $arrTemp['cname'] = $objrow['cname'];
                $arrTemp['cphone'] = $objrow['cphone'];
                $arrTemp['price'] = $objrow['price'];
                $arrTemp['location'] = $objrow['location'];
                $arrTemp['ptype'] = $objrow['ptype'];
                $arrTemp['followupdate'] = date('M-d,Y', strtotime($objrow['followupdate']));
                $arrTodaycustomerList[] = $arrTemp;
            }
        }
        $arrJSON['data'] = $arrTodaycustomerList;
        echo json_encode($arrJSON);
    }

}

// end of DashboardController.php
