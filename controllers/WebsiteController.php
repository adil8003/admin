<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Status;
use app\models\Imagegallery;

class WebsiteController extends Controller {

    public $enableCsrfValidation = false;
    public $userid = '';

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
            if ($id != 0) {
                $objImagegallery = Imagegallery::find()->where(['id' => $id])->one();
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
                       where r.type = ' . 4 . ' AND r.statusid = ' . 2 . '   ORDER BY `addeddate` DESC ')->queryAll();
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
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'aboutus'])->one();
        $file = $objImagegallery->image;

        header('Content-type: resources/png');
        readfile($file);
    }

    public function actionLinkuserimageamenities() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'header'])->one();
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

    public function actionUploadheader() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        if (!empty($_FILES)) {
            $uploaddir = 'resources/website/';
            $image_name = md5(date('Ymdhis')). rand(10000000, 9999999);
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->type = 4;
                $objResprojectimage->imgtype = 'header';
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

    public function actionUploadaboutus() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        if (!empty($_FILES)) {
            $uploaddir = 'resources/website/';
            $image_name = md5(date('Ymdhis')). rand(10000000, 9999999);
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->type = 4;
                $objResprojectimage->imgtype = 'aboutus';
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

    public function actionUploadotherimag() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        if (!empty($_FILES)) {
            $uploaddir = 'resources/website/';
            $image_name = md5(date('Ymdhis')). rand(10000000, 9999999);
            $uploadfile = $basePath . $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $objResprojectimage = new \app\models\Imagegallery();
                $objResprojectimage->type = 4;
                $objResprojectimage->imgtype = 'other';
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
}

// end of WebsiteController.php
