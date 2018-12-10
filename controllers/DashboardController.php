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
        } else {
            return $this->render('calling', [
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
        $objResidential = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price
                        from `residential` r 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                         ')->queryAll();
        $objCrm = $connection->createCommand('Select c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname 
                        from `crm` c 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                          ')->queryAll();
        $objResale = $connection->createCommand('Select r.id,r.ownername,r.added_date,r.contact,r.location,
                                    r.price
                        from `resale` r 
                        LEFT join `status` s on s.id = r.statusid 
                        ')->queryAll();

//         --- Inactive list
        $objResaleInactive = $connection->createCommand('Select r.id,r.ownername,r.added_date,r.contact,r.location,
                                    r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                       where r.statusid = ' . 1 . '  ORDER BY `added_date` DESC ')->queryAll();
        $objResidentialInactive = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price
                        from `residential` r 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                         where r.statusid = ' . 1 . '  ORDER BY `addeddate` DESC ')->queryAll();
        $objCrmInactive = $connection->createCommand('Select *
                        from `crm` c 
                        where c.customerstatusid = ' . 3 . '   ')->queryAll();
//         --- Active list
        $objResaleActive = $connection->createCommand('Select r.id,r.ownername,r.added_date,r.contact,r.location,
                                    r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                        where r.statusid = ' . 2 . '   ')->queryAll();

        $objResidentialActive = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price
                        from `residential` r 
                        where r.statusid = ' . 2 . '  ')->queryAll();

        $objResMostPopular = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price
                        from `residential` r 
                        where r.statusid = ' . 3 . '  ')->queryAll();

        $objResFeturedProjects = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price
                        from `residential` r 
                        where r.statusid = ' . 4 . '  ')->queryAll();

        $objResMostvaluable = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price
                        from `residential` r 
                        where r.statusid = ' . 5 . '  ')->queryAll();

        $objCrmActive = $connection->createCommand('Select c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price
                        from `crm` c 
                        where c.customerstatusid = ' . 2 . ' || c.customerstatusid = ' . 1 . '   ORDER BY `addeddate` DESC ')->queryAll();

        $ResCount = count($objResidential);
        $CrmCount = count($objCrm);
        $ResaleCount = count($objResale);
        $objMostPopularCount = count($objResMostPopular);
        $objResFeturedProjectsCount = count($objResFeturedProjects);
        $objResMostvaluableCount = count($objResMostvaluable);


//        active acount
        $objResaleActive = count($objResaleActive);
        $objResidentialActive = count($objResidentialActive);
        $objCrmActive = count($objCrmActive);
//        inactive count
        $objResaleInactive = count($objResaleInactive);
        $objResidentialInactive = count($objResidentialInactive);
        $objCrmInactive = count($objCrmInactive);
//        if ($ResCount != 0 || $ResCount != 0 ) {
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
        $arrTemp['mostpopular'] = $objMostPopularCount;
        $arrTemp['feturedprojects'] = $objResFeturedProjectsCount;
        $arrTemp['mostvaluable'] = $objResMostvaluableCount;
        $arrCount[] = $arrTemp;
//        }
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
        $objData = $connection->createCommand('Select c.id,f.followupdate,f.addeddate as fdate,c.finalstatus,
            c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                          LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                         LEFT join `followup` f on f.crm_id = c.id 
                         LEFT JOIN `propertytype` p on p.id = pt.propertytypeid    
                         LEFT join `customerstatus` cs on cs.id = c.customerstatusid 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.customerstatusid = ' . 2 . '  ||  c.customerstatusid = ' . 1 . '   GROUP BY f.id ')->queryAll();
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

    public function actionGetallcustomers() {
        $arrCustomer['status'] = FALSE;
        $arrJSON = array();
        $arrCustomer = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $connection = Yii::$app->db;
        $id = Yii::$app->session['userid'];
        $objData = $connection->createCommand('Select  c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
                        from `voicecall` c  
                        LEFT join `builders` b on c.builderid = b.id 
                        LEFT join `user` u on u.id = c.userid  
                        where c.statusid = ' . 2 . '')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['name'] = $objrow['name'];
            $arrTemp['mobile'] = $objrow['mobile'];
            $arrTemp['email'] = $objrow['email'];
            $arrTemp['bname'] = $objrow['bname'];
            $arrTemp['uemail'] = $objrow['uemail'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrCustomer[] = $arrTemp;
        }
        $arrJSON['data'] = $arrCustomer;
        echo json_encode($arrJSON);
    }

    public function actionGetallcustomerscontbyuserid() {
        $arrCustomer['status'] = FALSE;
        $arrJSON = array();
        $arrCustomer = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $connection = Yii::$app->db;
//        $objUsers = $connection->createCommand('Select *
//                        from `user` c  
//                        where c.id != ' . 1 . '  ')->queryAll();
//        $UserCount = count($objUsers);
//        foreach ($objUsers as $value) {
        $objData = $connection->createCommand('Select  c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
                        from `voicecall` c  
                        LEFT join `builders` b on c.builderid = b.id 
                        LEFT join `user` u on u.id = c.userid  
                        where    u.id = ' . 2 . '  ')->queryAll();
        $objData1 = $connection->createCommand('Select  c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
                        from `voicecall` c  
                        LEFT join `builders` b on c.builderid = b.id 
                        LEFT join `user` u on u.id = c.userid  
                        where    u.id = ' . 3 . '  ')->queryAll();
        $objData2 = $connection->createCommand('Select  c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
                        from `voicecall` c  
                        LEFT join `builders` b on c.builderid = b.id 
                        LEFT join `user` u on u.id = c.userid  
                        where    u.id = ' . 4 . '  ')->queryAll();
        $objData3 = $connection->createCommand('Select  c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
                        from `voicecall` c  
                        LEFT join `builders` b on c.builderid = b.id 
                        LEFT join `user` u on u.id = c.userid  
                        where    u.id = ' . 5 . '  ')->queryAll();
        $objData4 = $connection->createCommand('Select  c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
                        from `voicecall` c  
                        LEFT join `builders` b on c.builderid = b.id 
                        LEFT join `user` u on u.id = c.userid  
                        where    u.id = ' . 6 . '  ')->queryAll();
//            $objData1 = $connection->createCommand('Select  c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
//                        from `voicecall` c  
//                        LEFT join `builders` b on c.builderid = b.id 
//                        LEFT join `user` u on u.id = c.userid  
//                        where    u.id = ' . $value['id'] . '  limit ' . $UserCount . ' ')->queryAll();
        $Count1 = count($objData);
        $Count2 = count($objData1);
        $Count3 = count($objData2);
        $Count4 = count($objData3);
        $Count5 = count($objData4);
        if ($objData) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['c1'] = $Count1;
            $arrTemp['c2'] = $Count2;
            $arrTemp['c3'] = $Count3;
            $arrTemp['c4'] = $Count4;
            $arrTemp['c5'] = $Count5;

            $arrCustomer[] = $arrTemp;
        }
//        }
        $arrJSON['data'] = $arrCustomer;
        echo json_encode($arrJSON);
    }

    public function actionSavebuilder() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objBuilders = new \app\models\Builders();
                $objBuilders->name = $request->post('bname');

                if ($objBuilders->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objBuilders->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objBuilders->getErrors();
                }
                $transaction->commit();
                yii::info('all modal saved');
            } catch (Exception $ex) {
                $arrReturn['curexp'] = $e->getMessage();
                $transaction->rollBack();
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavelistofdata() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrCount['status'] = FALSE;
        $arrJSON = array();
        $arrCount = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $min = $request->post('min');
        $max = $request->post('max');
        $connection = Yii::$app->db;
        $query = "Select *
                        from `crm` c 
                        where c.salary BETWEEN $min AND $max ";
        $objData = $connection->createCommand($query)->queryAll();
        $data = count($objData);
        if ($data) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['data'] = $data;
            $arrCount = $arrTemp;
        }
//        $arrJSON['data'] = $arrCount;
        echo json_encode($arrCount);
    }

    public function actionSavedataassigntoemp() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $min = $request->post('min');
        $max = $request->post('max');
        $limit = $request->post('limit');
        $userid = $request->post('userid');
        $connection = Yii::$app->db;
        $query = "Select *
                        from `crm` c 
                        where c.salary BETWEEN $min AND $max limit $limit ";
        $objData = $connection->createCommand($query)->queryAll();
//echo '<pre>';
//print_r($objData);
//echo '</pre>';die;
        try {
            foreach ($objData AS $objrow) {
                $arrReturn['status'] = TRUE;
                $objSend = $connection->createCommand('Update crm SET userid = '.$userid.' where  id = '.$objrow['id'].' ')->execute();
//                $objCrm = new \app\models\Crm();
//                $objCrm->userid = 5;
//                if ($objCrm->save()) {
                    $arrReturn['status'] = TRUE;
//                    $arrReturn['id'] = $objCrm->id;
                    $arrReturn['msg'] = 'save successfully.';
//                } else {
//                    $arrReturn['error'][] = $objCrm->getErrors();
//                }
            }
            $transaction->commit();
            yii::info(' modal saved');
        } catch (Exception $ex) {
            $arrReturn['blkexp'] = $e->getMessage();
            $transaction->rollBack();
        }
        echo json_encode($arrReturn);
    }

}

// end of DashboardController.php
