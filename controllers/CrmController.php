<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Userroles;
use app\models\Status;
use app\models\Buytype;
use app\models\Propertytypee;
use app\models\Crm;

class CrmController extends Controller {

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
        return $this->render('index', [
        ]);
    }

    public function actionAdd() {
        $objBuyTpe = \app\models\buytype :: find()->all();
        $objStatus = \app\models\Status :: find()->all();
        $objMeetingtype = \app\models\meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        return $this->render('add', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objStatus' => $objStatus
        ]);
    }

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objBuyTpe = \app\models\buytype :: find()->all();
        $objMeetingtype = \app\models\meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objCrm = \app\models\Crm::findOne($id);
        return $this->render('edit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objCrm' => $objCrm,
                    'objStatus' => $objStatus
        ]);
    }

    public function actionCallnow() {
        return $this->render('callnow', [
        ]);
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }

    public function actionFollowup() {
        return $this->render('followup', [
        ]);
    }

    public function actionInactivecustomer() {
        return $this->render('inactivecustomer', [
        ]);
    }

    public function actionSavefollowup() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objCrm = new \app\models\Followup();
                $objCrm->crm_id = $request->post('crm_id');
                $objCrm->remark = $request->post('remark');
                $objCrm->followupdate = $request->post('followupdate');

                if ($objCrm->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCrm->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objCrm->getErrors();
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

    public function actionSavecustomer() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objCrm = new \app\models\Crm;
                $objCrm->cname = $request->post('cname');
                $objCrm->cphone = $request->post('cphone');
                $objCrm->propertytypeid = $request->post('propertytypeid');
                $objCrm->buytypeid = $request->post('buytypeid');
                $objCrm->price = $request->post('price');
                $objCrm->location = $request->post('location');
                $objCrm->meetingstatus = $request->post('meetingstatus');
                $objCrm->meetingtypeid = $request->post('meetingtypeid');
                $objCrm->detailsofproperty = $request->post('detailsofproperty');
                $objCrm->postremark = $request->post('postremark');
                $objCrm->remark = $request->post('remark');
                $objCrm->finalstatus = $request->post('finalstatus');
                $objCrm->statusid = $request->post('statusid');
                $objCrm->reffrom = $request->post('reffrom');

                if ($objCrm->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCrm->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objCrm->getErrors();
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

    public function actionEidtcustomer() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('crmid');
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objCrm = \app\models\Crm:: find()->where(['id' => $id])->one();
                    $objCrm->cname = $request->post('cname');
                    $objCrm->cphone = $request->post('cphone');
                    $objCrm->propertytypeid = $request->post('propertytypeid');
                    $objCrm->buytypeid = $request->post('buytypeid');
                    $objCrm->price = $request->post('price');
                    $objCrm->location = $request->post('location');
                    $objCrm->meetingstatus = $request->post('meetingstatus');
                    $objCrm->meetingtypeid = $request->post('meetingtypeid');
                    $objCrm->detailsofproperty = $request->post('detailsofproperty');
                    $objCrm->postremark = $request->post('postremark');
                    $objCrm->remark = $request->post('remark');
                    $objCrm->finalstatus = $request->post('finalstatus');
                    $objCrm->reffrom = $request->post('reffrom');
                    $objCrm->statusid = $request->post('statusid');

                    if ($objCrm->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objCrm->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objCrm->getErrors();
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

    public function actionUpdatefollowup() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('id');
        $followupdate = date('y-m-d H:m:s', strtotime($request->post('followupdate')));
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objFollowup = \app\models\Followup:: find()->where(['id' => $id])->one();
                    $objFollowup->crm_id = $request->post('crm_id');
                    $objFollowup->remark = $request->post('remark');
                    $objFollowup->followupdate = $followupdate;


                    if ($objFollowup->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objFollowup->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objFollowup->getErrors();
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

    public function actionGetallcustomers() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select c.id,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `Crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                       where c.statusid = ' . 2 . '  ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

    public function actionGetcustomer() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $location = $request->post('location');
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select c.id,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `Crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        where `location` LIKE %'.$location.'% ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
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
        $objData = $connection->createCommand('Select c.id,f.followupdate,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `Crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                         LEFT join `followup` f on f.crm_id = c.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.statusid = ' . 2 . ' ')->queryAll();
        foreach ($objData AS $objrow) {
            $M = date('m', strtotime($objrow['followupdate']));
            $D = date('d', strtotime($objrow['followupdate']));
            if ($TodayM == $M && $TodayD === $D) {
                $arrTemp = array();
                $arrTemp['status'] = TRUE;
                $arrTemp['id'] = $objrow['id'];
                $arrTemp['cname'] = $objrow['cname'];
                $arrTemp['cphone'] = $objrow['cphone'];
                $arrTemp['price'] = $objrow['price'];
                $arrTemp['location'] = $objrow['location'];
                $arrTemp['ptype'] = $objrow['ptype'];
                $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
                $arrTodaycustomerList[] = $arrTemp;
            }
        }
        $arrJSON['data'] = $arrTodaycustomerList;
        echo json_encode($arrJSON);
    }

    public function actionGetallinactivecustomer() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $TodayM = date("m");
        $TodayD = date("d");
        $objData = $connection->createCommand('Select c.id,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `Crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.statusid = ' . 1 . ' ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

    public function actionGetcustomerdetailsbyid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select c.id,c.finalstatus,c.detailsofproperty,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `Crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        where c.id =' . $id . ' ')->queryOne();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
        echo json_encode($arrReturn);
        die;
    }

    public function actionGetallfollowup() {
        $arrfollow['status'] = FALSE;
        $arrJSON = array();
        $arrfollow = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select f.id,f.crm_id,f.remark,f.followupdate,f.addeddate
                        from `Followup` f 
                        where f.crm_id =' . $id . ' ORDER BY `followupdate` ASC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['remark'] = $objrow['remark'];
            $arrTemp['followupdate'] = date('M-d,Y H:i:s', strtotime($objrow['followupdate']));
            $arrTemp['date'] = date('m-d-Y', strtotime($objrow['followupdate']));
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrfollow[] = $arrTemp;
        }
        $arrJSON['data'] = $arrfollow;
        echo json_encode($arrJSON);
    }

}

// end of DashboardController.php
