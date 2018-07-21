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

}

// end of DashboardController.php
