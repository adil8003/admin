<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Status;
use app\models\Roles;
use app\models\Leavetype;
use app\models\Userpersonal;
use app\models\Usereducational;
use app\models\Leave;
use app\models\Attendence;
//use app\models\Financial;

class HumanresourceController extends Controller {

    public $enableCsrfValidation = false;

    public function init() {
        if (Yii::$app->session['isLoggedIn'] != true) {
            return $this->redirect('index.php?r=site/login');
        }
        if (!(Yii::$app->session['role'] == 'Admin' || Yii::$app->session['role'] == 'HR')) {
            return $this->redirect('index.php?r=dashboard');
        }
        $this->layout = "dashboard";
    }

    public function actionIndex() {
        $model = new User();
        $objUser = $model->findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        return $this->render('index', [
                    'objUser' => $objUser
        ]);
    }

    public function actionViewattendence($id) {
        $objAttendence = Attendence::findOne(['status_id' => $id ]);
        $objUser = User::find()->where(['status_id' => Status::ACTIVE])->all();
        $objLeavetype = Leavetype::find()->all();
        return $this->render('viewattendence', [
                    'objAttendence' => $objAttendence,
                    'objUser' => $objUser,
                    'objLeavetype' => $objLeavetype,
        ]);
        return true;
    }
    
    public function actionEmployee() {
        $objRoles = Roles::find()->all();
        $objStatus = Status::find()->all();
        $model = new User();
        $objUser = $model->find()->all();
        return $this->render('employee', [
                    'objUser' => $objUser,
                    'objRoles' => $objRoles,
                    'objStatus' => $objStatus,
        ]);
    }

    public function actionViewemployee($id) {
        $objUser = User::findOne(['id' => $id]);
        $objUserpersonal = Userpersonal::findOne(['user_id' => $id]);
        $objUsereducational = Usereducational::findOne(['user_id' => $id]);
        if (!$objUserpersonal) {
            $objUserpersonal = new Userpersonal();
        }
        if (!$objUsereducational) {
            $objUsereducational = new Usereducational();
        }
        return $this->render('viewemployee', [
                    'objUser' => $objUser,
                    'objUserpersonal' => $objUserpersonal,
                    'objUsereducational' => $objUsereducational,
        ]);
    }

    public function actionViewleave($id) {
        $objLeave = Leave::findOne(['id' => $id]);
        $objUser = User::find()->where(['status_id' => Status::ACTIVE])->all();
        $objLeavetype = Leavetype::find()->all();
        $objRoles = Roles::find()->all();
        if (!$objUser) {
            $objUser = new User();
        }
        return $this->render('viewleave', [
                    'objLeave' => $objLeave,
                    'objUser' => $objUser,
                    'objLeavetype' => $objLeavetype,
                    'objRoles' => $objRoles,
        ]);
    }

    public function actionLeave() {
        $objUser = User::find()->where(['status_id' => Status::ACTIVE])->all();
        $objLeave = Leave::find()->all();
        $objLeavetype = Leavetype::find()->all();
        $objRoles = Roles::find()->all();
        return $this->render('leave', [
                    'objUser' => $objUser,
                    'objLeave' => $objLeave,
                    'objRoles' => $objRoles,
                    'objLeavetype' => $objLeavetype
        ]);
    }

    public function actionRecruitment() {
        $objRoles = Roles::find()->all();
        $objStatus = Status::find()->all();
        $model = new User();
        $objUser = $model->find()->all();
        return $this->render('recruitment', [
                    'objUser' => $objUser,
                    'objRoles' => $objRoles,
                    'objStatus' => $objStatus,
        ]);
    }

    public function actionAttendence() {
        $model = new User();
        $objUser = $model->find()->where(['status_id' => Status::ACTIVE])->all();
        $objLeavetype = Leavetype::find()->all();
        $model = new Attendence();
        $objAttendence = $model->find()->all();
        return $this->render('attendence', [
                    'objUser' => $objUser,
                    'objLeavetype' => $objLeavetype,
                    'objAttendence' => $objAttendence,
        ]);
    }

    public function actionSaveattendence() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('user_id');
            if ($id != 0) {
                $objAttendence = Attendence::find()->where(['user_id' => $id, 'attn_date' => $request->post('attn_date')])->one();
                if (!$objAttendence) {
                    $objAttendence = new Attendence();
                }
                $objAttendence->user_id = $request->post('user_id');
                $objAttendence->attn_date = $request->post('attn_date');
                $objAttendence->in_time = $request->post('in_time');
                $objAttendence->out_time = $request->post('out_time');
                $objAttendence->leavetype_id = $request->post('leavetype_id');
                if ($objAttendence->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objAttendence->id;
                }
            }
            echo json_encode($arrReturn);
        }
    }

    public function actionAllemployee() {
        $arrJSON = array();
        $arrUser = array();
        $objUser = User::find()->all();
        foreach ($objUser AS $row) {
            $arrTemp = array();
            $arrTemp['id'] = $row->id;
            $arrTemp['username'] = $row->username;
            $arrTemp['email'] = $row->email;
            $arrTemp['role'] = $row->role->name;
            $arrTemp['status'] = $row->status->name;
            $arrTemp['regdate'] = date('d/m/Y', strtotime($row->reg_date));

            $arrUser[] = $arrTemp;
        }
        $arrJSON['data'] = $arrUser;
        echo json_encode($arrJSON);
    }

    public function actionUpdateleave() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('leave_id');
            if ($id != 0) {
                $objLeave = Leave::findOne(['id' => $id]);
                if (!$objLeave) {
                    $objLeave = new Leave();
                    $objLeave->id = $id;
                }
                $objLeave->title = $request->post('title');
                $objLeave->description = $request->post('description');
                $objLeave->leavetypeid = $request->post('leavetypeid');
                $objLeave->days = $request->post('days');
                $objLeave->todate = $request->post('todate');
                $objLeave->fromdate = $request->post('fromdate');
                $objLeave->appliedby = $request->post('appliedby');
                $objLeave->approvedby = $request->post('approvedby');
                $objLeave->status = $request->post('status');
                $objLeave->comment = $request->post('comment');
                if ($objLeave->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $id;
                }
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaverequestleave() { 
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objLeave = Leave::findOne(['id' => $id]);
            } else {
                $objLeave = new Leave();
            }
            $objLeave->title = $request->post('title');
            $objLeave->description = $request->post('description');
            $objLeave->leavetypeid = $request->post('leavetypeid');
            $objLeave->days = $request->post('days');
            $objLeave->todate = $request->post('todate');
            $objLeave->fromdate = $request->post('fromdate');
            $objLeave->appliedby = $request->post('appliedby');
            $objLeave->approvedby = $request->post('approvedby');
            $objLeave->status = $request->post('status');
            $objLeave->comment = $request->post('comment');

            if ($objLeave->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objLeave->id;
            }
        }
        echo json_encode($arrReturn);
    }
    
   
    public function actionSaveemployee() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objUser = User::findOne(['id' => $id]);
            } else {
                $objUser = new User();
            }
            $objUser->username = $request->post('username');
            $objUser->email = $request->post('email');
            $objUser->password = $request->post('password');
            $objUser->role_id = $request->post('role_id');
            $objUser->status_id = $request->post('status_id');
            if ($objUser->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objUser->id;

                $objUserpersonal = new Userpersonal();
                $objUserpersonal->user_id = $objUser->id;
                $objUserpersonal->save();

                $objUsereducational = new Usereducational();
                $objUsereducational->user_id = $objUser->id;
                $objUsereducational->save();
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeleteemployee() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objUser = User::findOne(['id' => $id]);
                $status_id = ($request->post('status') == 'active') ? Status::ACTIVE : Status::INACTIVE;
                $objUser->status_id = $status_id;
                $objUser->save();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUpdateemployeepersonal() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('profile_id');
            if ($id != 0) {
                $objPersonal = Userpersonal::findOne(['user_id' => $id]);
                if (!$objPersonal) {
                    $objPersonal = new Userpersonal();
                    $objPersonal->user_id = $id;
                }
                $objPersonal->phone = $request->post('phone');
                $objPersonal->address = $request->post('address');
                $objPersonal->city = $request->post('city');
                $objPersonal->state = $request->post('state');
                $objPersonal->country = $request->post('country');
                if ($objPersonal->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $id;
                }
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUpdateemployeeeducatonal() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('profile_id');
            if ($id != 0) {
                $objUsereducational = Usereducational::findOne(['user_id' => $id]);
                if (!$objUsereducational) {
                    $objUsereducational = new Usereducational();
                    $objUsereducational->user_id = $id;
                }
                $objUsereducational->tenth = $request->post('tenth');
                $objUsereducational->twelth = $request->post('twelth');
                $objUsereducational->graduate = $request->post('graduate');
                $objUsereducational->postgraduate = $request->post('postgraduate');
                if ($objUsereducational->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $id;
                }
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionAllleave() {
        $arrReturn = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $objLeave = Leave::find()->all();
        foreach ($objLeave AS $row) {

            $arrTemp = array();
            $arrTemp['id'] = $row->id;
            $arrTemp['title'] = $row->title;
            $arrTemp['description'] = $row->description;
            $arrTemp['type'] = $row->leavetype->name;
            $arrTemp['days'] = $row->days;
            $arrTemp['todate'] = date('d/m/Y', strtotime($row->todate));
            $arrTemp['fromdate'] = date('d/m/Y', strtotime($row->fromdate));
            $arrTemp['appliedby'] = $row->appliedby0->username;
            $arrTemp['approvedby'] = $row->approvedby0->username;
            $arrTemp['appliedbyid'] = $row->appliedby0->id;
            $arrTemp['approvedbyid'] = $row->approvedby0->id;
            $arrTemp['status'] = $row->status;


            $arrReturn[] = $arrTemp;
        }
        $arrJSON = array();
        $arrJSON['data'] = $arrReturn;
        echo json_encode($arrJSON);
    }

}

// end of HumanresourceController.php
