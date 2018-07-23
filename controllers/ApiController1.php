<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Courses;
use app\models\Userroles;
use app\models\User;
use app\models\Coursebranch;
use app\models\Coursecontent;
use app\models\Coursemode;
use app\models\Coursesstatus;

class ApiController extends Controller {

    public $enableCsrfValidation = false;
    public $user_id = '';

    public function init() {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
        $this->layout = "";
    }

    public function actionIndex($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        // set "fomat" property
        Yii::$app->getResponse()->format = (is_null($callback)) ?
                Response::FORMAT_JSON :
                Response::FORMAT_JSONP;
        // return data
        return (is_null($callback)) ?
                $arrReturn :
                array(
            'data' => $arrReturn,
            'callback' => $callback
        );
    }

    public function actionLogin($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $email = $request->post('email');
        $password = md5($request->post('password'));

        $objUser = User:: find()->where(['email' => 'aa@gmail.com'])->one();

        if ($objUser) {
            if ('dda392841d65c19cb1b9f1f6040ea5b1' == $objUser->password) {
                $arrReturn['status'] = true;
                $arrReturn['msg'] = 'Login successful.';
                $arrReturn['userid'] = $objUser->id;
                
                $arrUser = array();
                $arrUser['id'] = $objUser->id;
                $arrUser['name'] = $objUser->fullname;
                $arrUser['phone'] = $objUser->phone;
                $arrUser['email'] = $objUser->email;
                $arrUser['image'] = $objUser->image;
                $objRole = User::findOne($arrUser['id']);
                $arrUser['roles'] = $objRole->role->name;
                $arrReturn['user'] = $arrUser;
            } else {
                $arrReturn['msg'] = 'Password is not correct.';
            }
        } else {
            $arrReturn['msg'] = 'Email id is not registered.';
        }
        // set "format" property
        Yii::$app->getResponse()->format = (is_null($callback)) ?
                Response::FORMAT_JSON :
                Response::FORMAT_JSONP;
        // return data
        return (is_null($callback)) ?
                $arrReturn :
                array(
            'data' => $arrReturn,
            'callback' => $callback
        );
    }

    public function actionGetprofileimage($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $id = $request->post('user_id');
        $objUser = User:: find(['id' => $id])->one();
        if ($objUser) {
            $arrReturn['status'] = true;
            $arrUser['image'] = $objUser->image;
            $arrReturn['user'] = $arrUser;
        }
        // set "format" property
        Yii::$app->getResponse()->format = (is_null($callback)) ?
                Response::FORMAT_JSON :
                Response::FORMAT_JSONP;
        // return data
        return (is_null($callback)) ?
                $arrReturn :
                array(
            'data' => $arrReturn,
            'callback' => $callback
        );
    }

    public function actionGetemployeeorg($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $request = Yii::$app->request;
//        $id = $request->post('id');
        $id = 6;
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select u.id,ro.name,a.orgname,ot.name as typename,a.website, a.orgimage,a.remarks,a.status,st.name, u.fullname,u.email,u.phone,u.reg_date from `user` u LEFT join `userroles` r on u.id = r.user_id join `organisation` a on a.id = r.org_id join `roles` '
                        . 'ro on ro.id = r.role_id join `status` st on st.id = u.status_id join `orgtype` ot on ot.id = a.orgtypeid where u.id =' . $id)->queryOne();
        if ($objData) {
            $arrReturn = array();
            $arrReturn['status'] = TRUE;
            $arrTemp['orgname'] = $objData['orgname'];
            $arrTemp['orgtypeid'] = $objData['typename'];
            $arrTemp['website'] = $objData['website'];
            $arrTemp['orgimage'] = $objData['orgimage'];
            $arrTemp['remarks'] = $objData['remarks'];
            $arrTemp['orgstatus'] = $objData['status'];
            $arrTemp['fullname'] = $objData['fullname'];
            $arrTemp['email'] = $objData['email'];
            $arrTemp['phone'] = $objData['phone'];

            $arrReturn['data'][] = $arrTemp;
        }
//         $arrReturn['data'] = $arrReturn;
//         $arrReturn['status'] = TRUE;
//                $arrReturn['query'] = $objData;
        Yii::$app->getResponse()->format = (is_null($callback)) ?
                Response::FORMAT_JSON :
                Response::FORMAT_JSONP;
        // return data
        return (is_null($callback)) ?
                $arrReturn :
                array(
            'data' => $arrReturn,
            'callback' => $callback
        );
    }

    public function actionGetemployeecourse($callback = null) {
        $arrJSON = array();
        $arrCourses = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $user_id = $request->get('user_id');
        $connection = Yii::$app->db;
        $User = User::find()->where(['id' => 6])->one();
        $Userroles = Userroles::find()->where(['user_id' => $User->id])->one();

        $objCourses = $connection->createCommand('Select c.id ,c.title ,c.courseimage,c.description ,c.subject,c.publishdate,og.orgname ,d.name as deptname ,b.name as branchname from `courses` c 
                    LEFT JOIN `organisation` og on og.id = c.organisationid 
                    LEFT JOIN `coursebranch` cb on cb.course_id = c.id 
                    LEFT JOIN `coursedepartment` cd on cd.course_id = c.id 
                    LEFT JOIN `branch` b on b.id = cb.branchid 
                    LEFT JOIN `department` d on d.id = cd.deptid where og.id =' . $Userroles->org_id)->queryAll();

        foreach ($objCourses AS $objrow) {
            $arrReturn = array();
            $arrReturn['status'] = TRUE;
            $arrReturn['id'] = $objrow['id'];
            $arrReturn['title'] = $objrow['title'];
            $arrReturn['subject'] = $objrow['subject'];
            $arrReturn['description'] = $objrow['description'];
            $arrReturn['orgname'] = $objrow['orgname'];
            $arrReturn['branchname'] = $objrow['branchname'];
            $arrReturn['deptname'] = $objrow['deptname'];
            $arrReturn['courseimage'] = $objrow['courseimage'];
            $arrReturn['publishdate'] = date('d-m-Y', strtotime($objrow['publishdate']));
            $arrCourses[] = $arrReturn;
        }
        $arrJSON['data'] = $arrCourses;
        // set "fomat" property
        Yii::$app->getResponse()->format = (is_null($callback)) ?
                Response::FORMAT_JSON :
                Response::FORMAT_JSONP;
        // return data
        return (is_null($callback)) ?
                $arrReturn :
                array(
            'data' => $arrReturn,
            'callback' => $callback
        );
    }

}

// end of DashboardController.php
