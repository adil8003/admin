<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Userroles;
use app\models\Status;
use app\models\Newarrivalproduct;
use app\models\Productstatus;

class ResidentialController extends Controller {

    public $enableCsrfValidation = false;
    public $userid = '';
    public $base_path = 'C:\wamp\www\admin/';

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

    public function actionAmenities() {
        return $this->render('amenities', [
        ]);
    }

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objBuyTpe = \app\models\buytype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objResidential = \app\models\Residential::findOne($id);
        return $this->render('edit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objPropertytype' => $objPropertytype,
                    'objResidential' => $objResidential,
                    'objStatus' => $objStatus
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

    public function actionError() {
        return $this->render('error', [
        ]);
    }

    public function actionGetallresidential() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `Residential` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                       where r.statusid = ' . 2 . '  ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['pname'] = $objrow['pname'];
            $arrTemp['btype'] = $objrow['btype'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

    public function actionSaveproperty() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objResidential = new \app\models\Residential;
                $objResidential->pname = $request->post('pname');
                $objResidential->dname = $request->post('dname');
                $objResidential->location = $request->post('location');
                $objResidential->propertytypeid = $request->post('propertytypeid');
                $objResidential->buytypeid = $request->post('buytypeid');
                $objResidential->price = $request->post('price');
                $objResidential->landmark = $request->post('landmark');
                $objResidential->address = $request->post('address');
                $objResidential->pland = $request->post('pland');
                $objResidential->possesiondate = $request->post('possesiondate');
                $objResidential->reraid = $request->post('reraid');
                $objResidential->carpetarea = $request->post('carpetarea');
                $objResidential->statusid = $request->post('statusid');

                if ($objResidential->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objResidential->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objResidential->getErrors();
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

    public function actionUpdateamenities() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('id');
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objAmenities = \app\models\Amenities:: find()->where(['id' => $id])->one();
                    $objAmenities->residentialid = $request->post('residentialid');
                    $objAmenities->aname = $request->post('aname');
                    $objAmenities->type = 1;
                    $objAmenities->statusid = 2;


                    if ($objAmenities->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objAmenities->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objAmenities->getErrors();
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

    public function actionGetresdetailsbyid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select c.carpetarea,c.id,c.dname,c.location,c.price,c.pname ,p.name as ptype,bt.name as btype,c.landmark
                        from `residential` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        LEFT join `Amenities` a on c.id = a.residentialid 
                        where c.id =' . $id . ' ')->queryOne();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
        echo json_encode($arrReturn);
        die;
    }

    public function actionGetallamenities() {
        $arrfollow['status'] = FALSE;
        $arrJSON = array();
        $arrfollow = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('residentialid');
        $objData = $connection->createCommand('Select a.id,a.aname,a.statusid,a.type,a.addeddate
                        from `Amenities` a 
                        where a.residentialid =' . $id . ' ORDER BY `addeddate` ASC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['aname'] = $objrow['aname'];
            $arrfollow[] = $arrTemp;
        }
        $arrJSON['data'] = $arrfollow;
        echo json_encode($arrJSON);
    }

    public function actionSaveamenities() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objAmenities = new \app\models\Amenities();
                $objAmenities->residentialid = $request->post('residentialid');
                $objAmenities->aname = $request->post('aname');
                $objAmenities->type = 1;
                $objAmenities->statusid = 2;

                if ($objAmenities->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objAmenities->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['reserr'][] = $objAmenities->getErrors();
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

    public function actionUpdateproprty() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('id');
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objResidential = \app\models\Residential:: find()->where(['id' => $id])->one();
                    $objResidential->pname = $request->post('pname');
                    $objResidential->dname = $request->post('dname');
                    $objResidential->location = $request->post('location');
                    $objResidential->propertytypeid = $request->post('propertytypeid');
                    $objResidential->buytypeid = $request->post('buytypeid');
                    $objResidential->price = $request->post('price');
                    $objResidential->landmark = $request->post('landmark');
                    $objResidential->address = $request->post('address');
                    $objResidential->pland = $request->post('pland');
                    $objResidential->possesiondate = $request->post('possesiondate');
                    $objResidential->reraid = $request->post('reraid');
                    $objResidential->carpetarea = $request->post('carpetarea');
                    $objResidential->statusid = $request->post('statusid');

                    if ($objResidential->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objResidential->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objResidential->getErrors();
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

}

// end of DashboardController.php
