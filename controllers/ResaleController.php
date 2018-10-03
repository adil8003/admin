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
use app\models\Resale;
use app\models\Propertytype;
use app\models\Amenities;
use app\models\Keylocation;
use app\models\Imagegallery;

class ResaleController extends Controller {

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

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objResale = \app\models\Resale::findOne($id);
        return $this->render('edit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objPropertytype' => $objPropertytype,
                    'objResale' => $objResale,
                    'objStatus' => $objStatus
        ]);
    }

    public function actionAdd() {
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objStatus = \app\models\Status :: find()->all();
        $objMeetingtype = \app\models\Meetingtype :: find()->all();
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

    public function actionAmenities() {
        return $this->render('amenities', [
        ]);
    }

    public function actionKeylocation() {
        return $this->render('keylocation', [
        ]);
    }

    public function actionImage() {
        return $this->render('image', [
        ]);
    }

    public function actionGetallresale() {
        $arrResale['status'] = FALSE;
        $arrJSON = array();
        $arrResale = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select r.id,r.ownername,r.added_date,r.contact,r.location,
                                    r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                       where r.statusid = ' . 2 . '  ORDER BY `added_date` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['ownername'] = $objrow['ownername'];
            $arrTemp['contact'] = $objrow['contact'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['stype'] = $objrow['stype'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['added_date'] = date('M-d,Y', strtotime($objrow['added_date']));
            $arrResale[] = $arrTemp;
        }
        $arrJSON['data'] = $arrResale;
        echo json_encode($arrJSON);
    }

    public function actionUploadpropertybanner() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->get('id');
        if (!empty($_FILES)) {
            $uploaddir = 'resources/propertybanner/';
            $image_name = md5(date('Ymdhis')) . rand(10000, 9999);
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $objResale = Resale::findOne(['id' => $id]);
                $objResale->image = $uploadfile;
                $objResale->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionGetresalebyid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('id');
        $objResale = Resale:: findone(['id' => $id]);
        if ($id != '') {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objResale->toArray();
        }
        echo json_encode($arrReturn);
        die;
    }

    public function actionDeletepropertybannerimg() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $basePath = Yii::$app->params['basePath'];
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objResale = Resale::find()->where(['id' => $id])->one();
                $objResale->image = $basePath . '/resources/propertybanner/not_found.png';
                $objResale->save();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'Deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionLinkrespropertybannerimg() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objResale = Resale::findOne($id);
        $file = $objResale->image;

        header('Content-type: resources/png');
        readfile($file);
    }

    public function actionSaveresaleproperty() {
        $transaction = Yii::$app->db->beginTransaction();
        $basePath = Yii::$app->params['basePath'];
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objResale = new \app\models\Resale();
                $objResale->ownername = $request->post('ownername');
                $objResale->contact = $request->post('contact');
                $objResale->propertytypeid = $request->post('propertytypeid');
                $objResale->location = $request->post('location');
                $objResale->price = $request->post('price');
                $objResale->landmark = $request->post('landmark');
                $objResale->address = $request->post('address');
                $objResale->societyname = $request->post('societyname');
                $objResale->buildingname = $request->post('buildingname');
                $objResale->wing = $request->post('wing');
                $objResale->carpetarea = $request->post('carpetarea');
                $objResale->statusid = $request->post('statusid');
                $objResale->flatnumber = $request->post('flatnumber');
                $objResale->floornumber = $request->post('floornumber');
                $objResale->propertyfacing = $request->post('propertyfacing');
                $objResale->age = $request->post('age');
                $objResale->furniture = $request->post('furniture');
                $objResale->remarks = $request->post('remarks');
                $objResale->image = $basePath . '/resources/propertybanner/not_found.png';
                $objResale->protype = 2;


                if ($objResale->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objResale->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objResale->getErrors();
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

    public function actionUpdateresaleproperty() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('id');
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objResale = \app\models\Resale:: find()->where(['id' => $id])->one();
                    $objResale->ownername = $request->post('ownername');
                    $objResale->contact = $request->post('contact');
                    $objResale->propertytypeid = $request->post('propertytypeid');
                    $objResale->location = $request->post('location');
                    $objResale->price = $request->post('price');
                    $objResale->landmark = $request->post('landmark');
                    $objResale->address = $request->post('address');
                    $objResale->societyname = $request->post('societyname');
                    $objResale->buildingname = $request->post('buildingname');
                    $objResale->wing = $request->post('wing');
                    $objResale->carpetarea = $request->post('carpetarea');
                    $objResale->statusid = $request->post('statusid');
                    $objResale->flatnumber = $request->post('flatnumber');
                    $objResale->floornumber = $request->post('floornumber');
                    $objResale->propertyfacing = $request->post('propertyfacing');
                    $objResale->age = $request->post('age');
                    $objResale->furniture = $request->post('furniture');
                    $objResale->remarks = $request->post('remarks');

                    if ($objResale->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objResale->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objResale->getErrors();
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

    public function actionSaveamenities() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objAmenities = new \app\models\Amenities();
                $objAmenities->resaleid = $request->post('resaleid');
                $objAmenities->aname = $request->post('aname');
                $objAmenities->type = 2;
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

    public function actionGetresdetailsbyid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select r.id,r.propertyfacing,r.furniture,r.ownername,r.added_date,
                                        r.contact,r.location,r.remarks,r.carpetarea,r.floornumber,
                                        r.flatnumber,r.wing,r.buildingname,r.address,
                                        r.societyname,r.age,
                                        r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                        LEFT join `amenities` a on r.id = a.resaleid
                        where r.id =' . $id . ' ')->queryOne();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
        echo json_encode($arrReturn);
        die;
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
                    $objAmenities->resaleid = $request->post('resaleid');
                    $objAmenities->aname = $request->post('aname');
                    $objAmenities->type = 2;
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

    public function actionGetallamenities() {
        $arrfollow['status'] = FALSE;
        $arrJSON = array();
        $arrfollow = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('resaleid');
        $objData = $connection->createCommand('Select a.id,a.aname,a.statusid,a.type,a.addeddate
                        from `amenities` a 
                        where a.resaleid =' . $id . ' ORDER BY `addeddate` ASC ')->queryAll();
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

    public function actionSavekeylocation() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objKeylocation = new \app\models\Keylocation();
                $objKeylocation->resaleid = $request->post('resaleid');
                $objKeylocation->kname = $request->post('kname');
                $objKeylocation->distance = $request->post('distance');
                $objKeylocation->type = 2;
                $objKeylocation->statusid = 2;

                if ($objKeylocation->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objKeylocation->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['reserr'][] = $objKeylocation->getErrors();
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

    public function actionUpdatekeylocation() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('id');
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objKeylocation = \app\models\Keylocation:: find()->where(['id' => $id])->one();
                    $objKeylocation->resaleid = $request->post('resaleid');
                    $objKeylocation->kname = $request->post('kname');
                    $objKeylocation->distance = $request->post('distance');
                    $objKeylocation->type = 2;
                    $objKeylocation->statusid = 2;


                    if ($objKeylocation->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objKeylocation->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objKeylocation->getErrors();
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

    public function actionGetallkeylocation() {
        $arrKeylocation['status'] = FALSE;
        $arrJSON = array();
        $arrKeylocation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('resaleid');
        $objData = $connection->createCommand('Select k.id,k.kname,k.statusid,k.type,k.addeddate,k.distance
                        from `keylocation` k 
                        where k.resaleid =' . $id . ' ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['kname'] = $objrow['kname'];
            $arrTemp['distance'] = $objrow['distance'];
            $arrKeylocation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrKeylocation;
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
            $uploaddir = 'resources/residential/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $imgtype = $request->get('imgtype');
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->resaleid = $id;
                $objResprojectimage->type = 2;
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
            $uploaddir = 'resources/residential/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $imgtype = $request->get('imgtype');
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->resaleid = $id;
                $objResprojectimage->type = 2;
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
            $uploaddir = 'resources/residential/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $imgtype = $request->get('imgtype');
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->resaleid = $id;
                $objResprojectimage->type = 2;
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
                       where r.resaleid = ' . $id . ' AND r.type = ' . 2 . ' AND r.statusid = ' . 2 . '   ORDER BY `addeddate` DESC ')->queryAll();
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

}

// end of DashboardController.php
