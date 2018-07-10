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

class RentController extends Controller {

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
//        $objProductstatus = Productstatus::find()->all();
//        $objStatus = Status::find()->all();
//        $objNewarrivalproduct = Newarrivalproduct::findOne($id);
        return $this->render('edit', [
//                    'objProductstatus' => $objProductstatus,
//                    'objStatus' => $objStatus,
//                    'objNewarrivalproduct' => $objNewarrivalproduct
        ]);
    }

    public function actionAdd() {
//        $request = Yii::$app->request;
//        $id = $request->get('id');
//        $objProductstatus = Productstatus::find()->all();
//        $objStatus = Status::find()->all();
        return $this->render('add', [
//                    'objProductstatus' => $objProductstatus,
//                    'objStatus' => $objStatus
        ]);
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }

}

// end of DashboardController.php
