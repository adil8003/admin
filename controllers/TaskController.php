<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Status;
use app\models\Task;

class TaskController extends Controller {

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

    public function actionSavetask() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objTask = new Task();
            $objTask->ask = $request->post('ask');
            $objTask->priority = $request->post('priority');
            $objTask->save();
            $arrReturn['status'] = TRUE;
            $arrReturn['msg'] = 'Save successfully.';
        }
        echo json_encode($arrReturn);
    }

    public function actionListtask() {
        $arrKeylocation['status'] = FALSE;
        $arrJSON = array();
        $arrKeylocation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $objData = $connection->createCommand('Select k.ask,k.priority,k.addeddate
                        from `task` k 
                         ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['priority'] = $objrow['priority'];
            $arrTemp['ask'] = $objrow['ask'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrKeylocation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrKeylocation;
        echo json_encode($arrJSON);
    }

}

// end of ProfileController.php

    