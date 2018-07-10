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
        $objMeetingtype = \app\models\meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        return $this->render('add', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype
        ]);
    }

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objBuyTpe = \app\models\buytype :: find()->all();
        $objMeetingtype = \app\models\meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objCrm = \app\models\Crm::findOne($id);
        return $this->render('edit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objCrm' => $objCrm
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
                $objCrm->ptypeid = $request->post('ptypeid');
                $objCrm->buytypeid = $request->post('buytypeid');
                $objCrm->price = $request->post('price');
                $objCrm->location = $request->post('location');
                $objCrm->meetingstatus = $request->post('meetingstatus');
                $objCrm->meetingtypeid = $request->post('meetingtypeid');
                $objCrm->detailsofproperty = $request->post('detailsofproperty');
                $objCrm->postremark = $request->post('postremark');
                $objCrm->remark = $request->post('remark');
                $objCrm->finalstatus = $request->post('finalstatus');
                $objCrm->followupdate = $request->post('followupdate');
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
                    $objCrm =  \app\models\Crm:: find(['id' => $id])->one();
                    $objCrm->cname = $request->post('cname');
                    $objCrm->cphone = $request->post('cphone');
                    $objCrm->ptypeid = $request->post('ptypeid');
                    $objCrm->buytypeid = $request->post('buytypeid');
                    $objCrm->price = $request->post('price');
                    $objCrm->location = $request->post('location');
                    $objCrm->meetingstatus = $request->post('meetingstatus');
                    $objCrm->meetingtypeid = $request->post('meetingtypeid');
                    $objCrm->detailsofproperty = $request->post('detailsofproperty');
                    $objCrm->postremark = $request->post('postremark');
                    $objCrm->remark = $request->post('remark');
                    $objCrm->finalstatus = $request->post('finalstatus');
                    $objCrm->followupdate = $request->post('followupdate');
                    $objCrm->reffrom = $request->post('reffrom');

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

    public function actionGetallcustomers() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $Data = \app\models\Crm::find()->all();
        foreach ($Data AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptypeid'] = $objrow['ptypeid'];
//             $arrTemp['ptypeid'] = $objrow['propertytype']->name;
//            $objRole = \app\models\Propertytype::findOne($objrow['id']);
//            $arrTemp['propertytype'] = $objRole->propertytype->name;
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }
    public function actionGetallfollowup() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $Data = \app\models\Followup::find()->all();
        foreach ($Data AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['remark'] = $objrow['remark'];
            $arrTemp['followupdate'] = date('M-d,Y', strtotime($objrow['followupdate']));
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

}

// end of DashboardController.php
