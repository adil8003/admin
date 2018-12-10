<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Status;
use app\models\Imagegallery;

class CommercialController extends Controller {

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

    public function actionAmenities() {
        return $this->render('amenities', [
        ]);
    }

    public function actionImage() {
        return $this->render('image', [
        ]);
    }

    public function actionKeylocation() {
        return $this->render('keylocation', [
        ]);
    }

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = Status::find()->all();
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objCtype = \app\models\Ctype::find()->all();
        $objCommercial = \app\models\Commercial::findOne($id);
        return $this->render('edit', [
                    'objStatus' => $objStatus,
                    'objBuyTpe' => $objBuyTpe,
                    'objPropertytype' => $objPropertytype,
                    'objCtype' => $objCtype,
                    'objCommercial' => $objCommercial
        ]);
    }

    public function actionAdd() {
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objStatus = \app\models\Status :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objCtype = \app\models\Ctype::find()->all();
        return $this->render('add', [
                    'objBuyTpe' => $objBuyTpe,
                    'objPropertytype' => $objPropertytype,
                    'objStatus' => $objStatus,
                    'objCtype' => $objCtype
        ]);
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }

    public function actionDeleteimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $basePath = Yii::$app->params['basePath'];
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            $commercialid = $request->post('commercialid');
            if ($id != 0) {
                $objImagegallery = Imagegallery::find()->where(['id' => $id])->andWhere(['commercialid' => $commercialid])->one();
                $objImagegallery->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'Deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionGetimages() {
        $arrResidential['status'] = FALSE;
        $arrJSON = array();
        $arrResidential = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $id = $request->post('id');
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select *
                        from `imagegallery` r 
                       where r.commercialid = ' . $id . ' AND r.statusid = ' . 2 . '   ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['image'] = $objrow['image'];
            $arrTemp['type'] = $objrow['type'];
            $arrTemp['imgtype'] = $objrow['imgtype'];
            $arrTemp['statusid'] = $objrow['statusid'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrResidential[] = $arrTemp;
        }
        $arrJSON['data'] = $arrResidential;
        echo json_encode($arrJSON);
    }

    public function actionLinkuserimageflorplan() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'florplan'])->one();
        $file = $objImagegallery->image;

        header('Content-type: resources/png');
        readfile($file);
    }

    public function actionLinkuserimageamenities() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'amenities'])->one();
        $file = $objImagegallery->image;
        header('Content-type: resources/png');
        readfile($file);
    }

    public function actionLinkuserimageother() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'other'])->one();
        $file = $objImagegallery->image;
        header('Content-type: resources/png');
        readfile($file);
    }

    public function actionUploadresidentialamenities() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        if (!empty($_FILES)) {
            $uploaddir = 'resources/commercial/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $imgtype = $request->get('imgtype');
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->commercialid = $id;
                $objResprojectimage->type = 3;
                $objResprojectimage->imgtype = $imgtype;
                $objResprojectimage->image = $uploadfile;
                $objResprojectimage->statusid = 2;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresidentialotherimag() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        if (!empty($_FILES)) {
            $uploaddir = 'resources/commercial/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $imgtype = $request->get('imgtype');
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->commercialid = $id;
                $objResprojectimage->type = 3;
                $objResprojectimage->imgtype = $imgtype;
                $objResprojectimage->image = $uploadfile;
                $objResprojectimage->statusid = 2;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresidentialflorplan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        if (!empty($_FILES)) {
            $uploaddir = 'resources/commercial/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $imgtype = $request->get('imgtype');
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->commercialid = $id;
                $objResprojectimage->type = 3;
                $objResprojectimage->imgtype = $imgtype;
                $objResprojectimage->image = $uploadfile;
                $objResprojectimage->statusid = 2;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveproperty() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objCommercial = new \app\models\Commercial();
                $objCommercial->cname = $request->post('cname');
                $objCommercial->dname = $request->post('dname');
                $objCommercial->location = $request->post('location');
                $objCommercial->ctypeid = $request->post('propertytypeid');
                $objCommercial->buytypeid = $request->post('buytypeid');
                $objCommercial->price = $request->post('price');
                $objCommercial->landmark = $request->post('landmark');
                $objCommercial->address = $request->post('address');
                $objCommercial->reraid = $request->post('reraid');
                $objCommercial->statusid = $request->post('statusid');
                $objCommercial->protype = 3;
                $objCommercial->userid = Yii::$app->session['userid'];

                if ($objCommercial->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCommercial->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objCommercial->getErrors();
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
                    $objCommercial = \app\models\Commercial:: find()->where(['id' => $id])->one();
                    $objCommercial->cname = $request->post('cname');
                    $objCommercial->dname = $request->post('dname');
                    $objCommercial->location = $request->post('location');
                    $objCommercial->ctypeid = $request->post('propertytypeid');
                    $objCommercial->buytypeid = $request->post('buytypeid');
                    $objCommercial->price = $request->post('price');
                    $objCommercial->landmark = $request->post('landmark');
                    $objCommercial->address = $request->post('address');
                    $objCommercial->reraid = $request->post('reraid');
                    $objCommercial->statusid = $request->post('statusid');

                    if ($objCommercial->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objCommercial->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objCommercial->getErrors();
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

    public function actionGetallcommercial() {
        $arrResidential['status'] = FALSE;
        $arrJSON = array();
        $arrResidential = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select c.id,c.addeddate,c.cname,c.price,c.dname,c.location,c.landmark,c.address,c.reraid, p.name as ptype,bt.name as btype
                        from `commercial` c 
                        LEFT join `ctype` p on c.ctypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                       where c.statusid = ' . 2 . '  ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['btype'] = $objrow['btype'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['landmark'] = $objrow['landmark'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrResidential[] = $arrTemp;
        }
        $arrJSON['data'] = $arrResidential;
        echo json_encode($arrJSON);
    }

    public function actionGetcommercialid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select c.cname,c.landmark,c.address,c.id,c.reraid,c.dname,c.location,
            c.price ,p.name as ptype,bt.name as btype
                        from `commercial` c 
                        LEFT join `ctype` p on c.ctypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        LEFT join `amenities` a on c.id = a.commercialid 
                        where c.id =' . $id . ' ')->queryOne();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
        echo json_encode($arrReturn);
        die;
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
                $objAmenities->commercialid = $request->post('commercialid');
                $objAmenities->aname = $request->post('aname');
                $objAmenities->type = $request->post('type');
                $objAmenities->cdetails = $request->post('cdetails');
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

    public function actionGetallamenities() {
        $arrfollow['status'] = FALSE;
        $arrJSON = array();
        $arrfollow = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('commercialid');
        $objData = $connection->createCommand('Select a.id,a.aname,a.statusid,a.type,a.addeddate,a.cdetails
                        from `amenities` a 
                        where a.commercialid =' . $id . ' ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['aname'] = $objrow['aname'];
            $arrTemp['type'] = $objrow['type'];
            $arrTemp['cdetails'] = $objrow['cdetails'];
            $arrfollow[] = $arrTemp;
        }
        $arrJSON['data'] = $arrfollow;
        echo json_encode($arrJSON);
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
                    $objAmenities->commercialid = $request->post('commercialid');
                    $objAmenities->aname = $request->post('aname');
                    $objAmenities->type = $request->post('type');
                    $objAmenities->cdetails = $request->post('cdetails');
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

}

// end of DashboardController.php
