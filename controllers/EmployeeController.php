<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Status;
use app\models\User;
use app\models\Userpersonal;
use app\models\Attendence;
use app\models\Leave;
use app\models\Leavetype;
use app\models\Roles;
use app\models\Usereducational;

class EmployeeController extends Controller {

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

    public function actionProfile() {
        $objUser = User::findOne(['id' => $this->user_id]);
        $objUserpersonal = Userpersonal::findOne(['user_id' => $this->user_id]);
        $objUsereducational = Usereducational::findOne(['user_id' => $this->user_id]);
        if (!$objUserpersonal) {
            $objUserpersonal = new Userpersonal();
        }
        if (!$objUsereducational) {
            $objUsereducational = new Usereducational();
        }return $this->render('profile', [
                    'objUser' => $objUser,
                    'objUserpersonal' => $objUserpersonal,
                    'objUsereducational' => $objUsereducational,
        ]);
    }

    public function actionAttendence() {

        $date_start = date('Y-m-') . '01';
        $date_end = date('Y-m-') . '31';
        $objAttendence = Attendence::find()
                ->where(['=', 'user_id', $this->user_id])
                ->andWhere(['>=', 'attn_date', $date_start])
                ->andWhere(['<=', 'attn_date', $date_end])
                ->all();

        $arrAttn = array();
        $lastDateOfCurMonth = (int) date('t');
        $CurYear = (int) date('Y');
        $CurMonth = (int) date('m');

        for ($i = 1; $i <= $lastDateOfCurMonth; $i++) {
            $arrRow = array();
            $td = $CurYear . '-' . $CurMonth . '-' . $i;
            $arrRow['date'] = date('M d, Y', strtotime($td));
            $arrRow['duration'] = 0;
            $arrRow['color'] = '#1AB244';
            foreach ($objAttendence As $row) {
                $CurDay = date('l', strtotime($td));
                if ($CurDay == 'Sunday') {
                    $arrRow['duration'] = 9;
                    $arrRow['color'] = '#DEBB27';
                } else {
                    if (strtotime($td) == strtotime($row->attn_date)) {
                        $arrRow['duration'] = round(((strtotime($row->out_time) - strtotime($row->in_time)) / (60 * 60)), 2);
                    }
                }
            }
            $arrAttn[] = $arrRow;
        }
        return $this->render('attendence', [
                    'jsonAttendence' => json_encode($arrAttn),
        ]);
    }

    public function actionViewleave($id) {
        $objLeave = Leave::findOne(['id' => $id]);
        $objUser = User::find()->where(['status_id' => Status::ACTIVE])->all();
        $objLeavetype = Leavetype::find()->all();
        $objRoles = Roles::find()->all();
        return $this->render('viewleave', [
                    'objLeave' => $objLeave,
                    'objUser' => $objUser,
                    'objLeavetype' => $objLeavetype,
                    'objRoles' => $objRoles,
        ]);
    }

    public function actionLeave() {
        $objUser = User::find()->where(['status_id' => Status::ACTIVE])->all();
        $objRoles = Roles::find()->all();
        $objLeavetype = Leavetype::find()->all();
        return $this->render('leave', [
                    'user_id' => $this->user_id,
                    'objRoles' => $objRoles,
                    'objUser' => $objUser,
                    'objLeavetype' => $objLeavetype,
        ]);
    }

    public function actionUpdatepersonal() {
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
            $objLeave->appliedby = $this->user_id;
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

    public function actionGetattendencebymonth() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $Ym = $request->post('m');

        $date_start = substr($Ym, 0, 4) . '-' . substr($Ym, 4, 2) . '-01';
        $date_end = substr($Ym, 0, 4) . '-' . substr($Ym, 4, 2) . '-31';

        $objAttendence = Attendence::find()
                ->where(['=', 'user_id', $this->user_id])
                ->andWhere(['>=', 'attn_date', $date_start])
                ->andWhere(['<=', 'attn_date', $date_end])
                ->all();

        $arrAttn = array();
        $lastDateOfCurMonth = (int) date('t', strtotime($date_start));
        $CurYear = (int) date('Y', strtotime($date_start));
        $CurMonth = (int) date('m', strtotime($date_start));

        for ($i = 1; $i <= $lastDateOfCurMonth; $i++) {
            $arrRow = array();
            $td = $CurYear . '-' . $CurMonth . '-' . $i;
            $arrRow['date'] = date('M d, Y', strtotime($td));
            $arrRow['duration'] = 0;
            $arrRow['color'] = '#1AB244';
            foreach ($objAttendence As $row) {
                //echo $td.'-';
                $CurDay = date('l', strtotime($td));
                if ($CurDay == 'Sunday') {
                    $arrRow['duration'] = 9;
                    $arrRow['color'] = '#DEBB27';
                } else {
                    if (strtotime($td) == strtotime($row->attn_date)) {

                        $arrRow['duration'] = round(((strtotime($row->out_time) - strtotime($row->in_time)) / (60 * 60)), 2);
                    }
                }
            }
            $arrReturn['status'] = TRUE;
            $arrAttn[] = $arrRow;
        }
        $arrReturn['jsonAttendence'] = $arrAttn;
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
            $arrTemp['comment'] = $row->comment;
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

// end of EmployeeController.php
