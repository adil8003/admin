<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Status;
use app\models\Roles;
use app\models\Task;
use app\models\Taskroutine;
use app\models\Taskdiscussion;
use app\models\Taskpriority;
use app\models\Tasktype;
use app\models\Taskstatus;

class ActionitemsController extends Controller {

    public $enableCsrfValidation = false;
    public $user_id = '';

    public function init() {
        if (Yii::$app->session['isLoggedIn'] != true) {
            return $this->redirect('index.php?r=site/login');
        }
        $this->layout = "dashboard";
        $this->user_id = Yii::$app->session['userid'];
    }

    public function actionIndex() {
        $model = new User();
        $objUser = $model->findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        return $this->render('index', [
                    'objUser' => $objUser
        ]);
    }

    public function actionItems() {
        $objTaskpriority = Taskpriority::find()->all();
        $objTaskstatus = Taskstatus::find()->all();
        $objTasktype = Tasktype::find()->all();
        $objUser = User::find()->where(['status_id' => Status::ACTIVE])->all();
        return $this->render('items', [
                    'objUser' => $objUser,
                    'objTaskpriority' => $objTaskpriority,
                    'objTaskstatus' => $objTaskstatus,
                    'objTasktype' => $objTasktype,
        ]);
    }

    public function actionViewtask($id) {
        $objtask = Task::findOne(['id' => $id]);
        $objTaskpriority = Taskpriority::find()->all();
        $objTaskstatus = Taskstatus::find()->all();
        $objTasktype = Tasktype::find()->all();
        $objUser = User::find()->where(['status_id' => Status::ACTIVE])->all();
        $objTaskroutine = Taskroutine::findOne(['taskid' => $id]);
        $objTaskdiscussion = Taskdiscussion::find(['taskid' => $id])->all();
        if (!$objTaskroutine) {
            $objTaskroutine = new Taskroutine();
        }
        if (!$objtask) {
            $objtask = new Task();
        }
        if (!$objTaskdiscussion) {
            $objTaskdiscussion = new Taskdiscussion();
        }
        return $this->render('viewtask', [
                    'objtask' => $objtask,
                    'objTaskpriority' => $objTaskpriority,
                    'objTaskstatus' => $objTaskstatus,
                    'objTasktype' => $objTasktype,
                    'objUser' => $objUser,
                    'objTaskroutine' => $objTaskroutine,
                    'objTaskdiscussion' => $objTaskdiscussion,
        ]);
    }

    public function actionRoutine() {
        $objRoles = Roles::find()->all();
        $objStatus = Status::find()->all();
         $model = new User();
        $objUser = $model->find()->all();
        return $this->render('routine', [
                    'objUser' => $objUser,
                    'objRoles' => $objRoles,
                    'objStatus' => $objStatus,
        ]);
    }

    public function actionSavediscussion() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('task_id');
           if ($id != 0) {
                $objTaskdiscussion = new Taskdiscussion();
                $objTaskdiscussion->commentby = $this->user_id;
                $objTaskdiscussion->comment = $request->post('comment');
                $objTaskdiscussion->taskid =  $id;
                $objTaskdiscussion->commentdate = date('Y-m-d H:i:s');
                if ($objTaskdiscussion->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objTaskdiscussion->id;
                }else{
                    $arrReturn['msg'] = 'try again';
                }
            }else{
                $arrReturn['msg'] = 'Invalid task';
            }
            echo json_encode($arrReturn);
        }
    }

    public function actionSaveroutine() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('task_id');
            if ($id != 0) {
                $objTaskroutine = Taskroutine::findOne(['taskid' => $id]);
            } else {
                $objTaskroutine = new Taskroutine();
            }
                $objTaskroutine->frequency = $request->post('frequency');
                $objTaskroutine->nextdate = $request->post('nextdate');
                if ($objTaskroutine->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objTaskroutine->id;
                }
            }
            echo json_encode($arrReturn);
        }

    public function actionUpdatetask() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('task_id');
            if ($id != 0) {
                $objTask = Task::findOne(['id' => $id]);
                if (!$objTask) {
                    $objTask = new Task();
                    $objTask->id = $id;
                }
                $objTask->title = $request->post('title');
                $objTask->description = $request->post('description');
                $objTask->taskpriorityid = $request->post('taskpriorityid');
                $objTask->taskstatusid = $request->post('taskstatusid');
                $objTask->tasktypeid = $request->post('tasktypeid');
                $objTask->createdby = $request->post('tasktypeid');
                $objTask->assignedto = $request->post('assignedto');
                if ($objTask->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objTask->id;
                }
            }
            echo json_encode($arrReturn);
        }
    }

    public function actionAllitem() {
        $arrReturn = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $objTask = Task::find()->all();
        foreach ($objTask AS $row) {

            $arrTemp = array();
            $arrTemp['id'] = $row->id;
            $arrTemp['title'] = $row->title;
            $arrTemp['description'] = $row->description;
            $arrTemp['type'] = $row->tasktype->name;
            $arrTemp['status'] = $row->taskstatus->name;
            $arrTemp['priority'] = $row->taskpriority->name;
            $objCreatedUser = User::findOne($row->createdby);
            $objAssignedUser = User::findOne($row->assignedto);
            $arrTemp['createdbyid'] = $objCreatedUser->id;
            $arrTemp['assignedtoid'] = $objAssignedUser->id;
            $arrTemp['createdby'] = $objCreatedUser->username;
            $arrTemp['assignedto'] = $objAssignedUser->username;
            $dtCreated = date('d/m/Y', strtotime($row->createddate));
            $arrTemp['createddate'] = $dtCreated;

            $arrReturn[] = $arrTemp;
        }
        $arrJSON = array();
        $arrJSON['data'] = $arrReturn;
        echo json_encode($arrJSON);
    }

    public function actionDeletetask() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objTask = Task::findOne(['id' => $id]);
                $objTask->taskstatusid = 4;
                $objTask->save();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveitem() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objTask = Task::findOne(['id' => $id]);
            } else {
                $objTask = new Task();
            }
            $objTask = new Task();
            $objTask->title = $request->post('title');
            $objTask->description = $request->post('description');
            $objTask->taskpriorityid = $request->post('taskpriorityid');
            $objTask->taskstatusid = $request->post('taskstatusid');
            $objTask->tasktypeid = $request->post('tasktypeid');
            $objTask->createdby = $request->post('createdby');
            $objTask->assignedto = $request->post('assignedto');
            if ($objTask->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objTask->id;
            } else {
                $arrReturn['msg'] = 'error msg';
            }
        }
        echo json_encode($arrReturn);
    }

}

// end of HumanresourceController.php
