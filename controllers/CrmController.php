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
        return $this->render('add', [
        ]);
    }

    public function actionEdit() {
        return $this->render('edit', [
        ]);
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }

    public function actionGetallcoursestats() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $objOrgbyEmployee = $connection->createCommand('Select  o.orgname,o.id as org_id,u.id as user_id from `organisation` o '
                        . 'LEFT join `userroles` ur on ur.org_id = o.id '
                        . 'LEFT join `user` u on u.id = ur.user_id where u.id !=' . Yii::$app->session['userid'] . ' AND ur.org_id = o.id' . ' ')->queryAll();
        echo "<pre>";
        print_r($objOrgbyEmployee);
        print_r(count($objrow['org_id']));
        echo "</pre>";
        die;
        foreach ($objOrgbyEmployee AS $objrow) {

            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['user_id'] = $objrow['user_id'];
            $arrTemp['org_id'] = $objrow['org_id'];
            $arrTemp['orgname'] = $objrow['orgname'];
//            $arrTemp['email'] = $objrow['email'];
//            $arrTemp['phone'] = $objrow['phone'];
//            $arrTemp['status_id'] = $objrow['status_id'];
//            $objRole = User::findOne($objrow['user_id']);
//            $arrTemp['roles'] = $objRole->role->name;
//            $arrTemp['reg_date'] = date('M-d,Y', strtotime($objrow['reg_date']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

}

// end of DashboardController.php
