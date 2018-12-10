<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Status;
use app\models\Userroles;
use app\models\Organisation;
use app\models\Courses;

class UsersController extends Controller {

    public $enableCsrfValidation = false;
    public $base_path = '';
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

    public function actionDetails() {
        return $this->render('details', [
        ]);
    }
    public function actionCallnow() {
        return $this->render('callnow', [
        ]);
    }

    public function actionAdd() {
        $objStatus = \app\models\Status :: find()->all();
        $objRoles = \app\models\Roles:: find()->all();
        return $this->render('add', [
                    'objStatus' => $objStatus,
                    'objRoles' => $objRoles
        ]);
    }

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objRoles = \app\models\Roles:: find()->all();
        $objUser = \app\models\User::findOne($id);
        return $this->render('edit', [
                    'objStatus' => $objStatus,
                    'objRoles' => $objRoles,
                    'objUser' => $objUser
        ]);
    }
    public function actionCrm() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objRoles = \app\models\Roles:: find()->all();
        $objUser = \app\models\User::findOne($id);
        return $this->render('crm', [
                    'objStatus' => $objStatus,
                    'objRoles' => $objRoles,
                    'objUser' => $objUser
        ]);
    }
     public function actionCrmedit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objCustomerstatus = \app\models\Customerstatus :: find()->all();
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objMeetingtype = \app\models\Meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $connection = Yii::$app->db;
        $objSelectedptype = $connection->createCommand('Select p.id, pt.propertytypeid , p.name from `propertytype` p '
                        . 'LEFT JOIN `ptype` pt on p.id = pt.propertytypeid '
                        . 'LEFT JOIN `crm` c on c.id = pt.crm_id where c.id =' . $id)->queryAll();
        $objCrm = \app\models\Crm::findOne($id);
        return $this->render('crmedit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objCrm' => $objCrm,
                    'objStatus' => $objStatus,
                    'objSelectedptype' => $objSelectedptype,
                    'objCustomerstatus' => $objCustomerstatus
        ]);
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }
      public function actionGetempcount() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrCount['status'] = FALSE;
        $arrJSON = array();
        $arrCount = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $userid = $request->get('userid');
        $connection = Yii::$app->db;
        $query = "Select *
                        from `crm` c 
                        where c.userid = $userid ";
        $objData = $connection->createCommand($query)->queryAll();
        $data = count($objData);
        if ($data) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['data'] = $data;
            $arrCount = $arrTemp;
        }
//        $arrJSON['data'] = $arrCount;
        echo json_encode($arrCount);
    }

    public function actionGetallcustomersbyuserid() {
        $arrCustomer['status'] = FALSE;
        $arrJSON = array();
        $arrCustomer = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $userid = $request->get('id');
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select u.id as uid,u.email,u.username,c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,p.name as ptype,c.cname ,bt.name as btype,c.cphone
                        from `crm` c  
                        LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                    	LEFT JOIN `propertytype` p on p.id = pt.propertytypeid     
                        LEFT join `buytype` bt on c.buytypeid = bt.id
                         LEFT join `user` u on u.id = c.userid
                        where c.customerstatusid = ' . 2 . ' ||  c.customerstatusid = ' . 1 . ' || c.customerstatusid = '. 4 .'  AND  c.userid = ' . $userid . '   GROUP BY c.id')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['uid'] = $objrow['uid'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['cemail'] = $objrow['cemail'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['username'] = $objrow['username'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrCustomer[] = $arrTemp;
        }
        $arrJSON['data'] = $arrCustomer;
        echo json_encode($arrJSON);
    }
    public function actionGetallcustomers() {
        $arrCustomer['status'] = FALSE;
        $arrJSON = array();
        $arrCustomer = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $userid = $request->get('id');
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select u.id as uid,u.email,u.username,c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,p.name as ptype,c.cname ,bt.name as btype,c.cphone
                        from `crm` c  
                        LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                    	LEFT JOIN `propertytype` p on p.id = pt.propertytypeid     
                        LEFT join `buytype` bt on c.buytypeid = bt.id
                         LEFT join `user` u on u.id = c.userid
                        where c.customerstatusid = ' . 2 . ' ||  c.customerstatusid = ' . 1 . ' || c.customerstatusid = 4  AND c.userid = ' . Yii::$app->session['userid'] . '   GROUP BY c.id')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['uid'] = $objrow['uid'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['cemail'] = $objrow['cemail'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['username'] = $objrow['username'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrCustomer[] = $arrTemp;
        }
        $arrJSON['data'] = $arrCustomer;
        echo json_encode($arrJSON);
    }

    public function actionGetallresidential() {
        $arrResidential['status'] = FALSE;
        $arrJSON = array();
        $arrResidential = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $userid = $request->get('id');
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select u.id as uid,u.username, r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                        LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                        LEFT join `user` u on u.id = r.userid
                       where r.statusid = ' . 2 . ' || r.statusid = ' . 3 . ' || r.statusid = ' . 4 . ' || r.statusid = ' . 5 . '  AND  r.userid = '. $userid .'  GROUP BY r.userid   ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['uid'] = $objrow['uid'];
            $arrTemp['pname'] = $objrow['pname'];
            $arrTemp['btype'] = $objrow['btype'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['username'] = $objrow['username'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrResidential[] = $arrTemp;
        }
        $arrJSON['data'] = $arrResidential;
        echo json_encode($arrJSON);
    }
     public function actionGetallcommercial() {
        $arrResidential['status'] = FALSE;
        $arrJSON = array();
        $arrResidential = array();
        $request = Yii::$app->request;
        $this->layout = "";
        $userid = $request->get('id');
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select u.id as uid, u.username,c.id,c.addeddate,c.cname,c.price,c.dname,c.location,c.landmark,c.address,c.reraid, p.name as ptype,bt.name as btype
                        from `commercial` c 
                        LEFT join `ctype` p on c.ctypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                          LEFT join `user` u on u.id = c.userid
                       where c.statusid = ' . 2 . ' || c.userid = '. $userid .' ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['uid'] = $objrow['uid'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['btype'] = $objrow['btype'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['landmark'] = $objrow['landmark'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['username'] = $objrow['username'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrResidential[] = $arrTemp;
        }
        $arrJSON['data'] = $arrResidential;
        echo json_encode($arrJSON);
    }

    public function actionCheckuniqueemail() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $Email = $request->post('uemail');
        $objUser = User::findOne(['email' => ($Email)]);
        if ($objUser) {
            $arrReturn['status'] = TRUE;
        }
        echo json_encode($arrReturn);
        die;
    }

    public function actionCheckuniquecontact() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $Contact = $request->post('uphone');
        $objUser = User::findOne(['phone' => ($Contact)]);
        if ($objUser) {
            $arrReturn['status'] = TRUE;
        }
        echo json_encode($arrReturn);
        die;
    }

    public function actionSaveuser() {
        $basePath = Yii::$app->params['basePath'];
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objUser = new \app\models\User;
                $objUser->username = $request->post('uname');
                $objUser->email = $request->post('uemail');
                $objUser->phone = $request->post('uphone');
                $objUser->status_id = $request->post('statusid');
                $objUser->role_id = $request->post('roleid');
                $objUser->password = 'unique';
                $objUser->image = $basePath . '/resources/users/no_image.jpg';

                if ($objUser->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objUser->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objUser->getErrors();
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

    public function actionEidtuser() {
        $basePath = Yii::$app->params['basePath'];
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('userid');
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objUser = \app\models\User:: find()->where(['id' => $id])->one();
                    $objUser->username = $request->post('uname');
                    $objUser->email = $request->post('uemail');
                    $objUser->phone = $request->post('uphone');
                    $objUser->status_id = $request->post('statusid');
                    $objUser->role_id = $request->post('roleid');
//                    $objUser->password = 'unique';
//                    $objUser->image = $basePath . '/resources/users/no_image.jpg';

                    if ($objUser->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objUser->id;
                        $arrReturn['msg'] = 'Update successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objUser->getErrors();
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

    public function actionAllusers() {
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $objUsers = $connection->createCommand('Select u.id,r.name,s.name, u.username,u.email,u.phone,u.reg_date '
                        . '     from `user` u '
                        . '      LEFT join `status` s on s.id = u.status_id '
                        . '      LEFT join `roles` r on r.id = u.role_id  where u.id != ' . Yii::$app->session['userid'])->queryAll();
        foreach ($objUsers AS $objrow) {
            $arrTemp = array();
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['username'] = $objrow['username'];
            $arrTemp['email'] = $objrow['email'];
            $arrTemp['phone'] = $objrow['phone'];
            $arrTemp['status'] = $objrow['name'];
            $objRole = User::findOne(($objrow['id']));
            $arrTemp['roles'] = $objRole->role->name;
            $arrTemp['reg_date'] = date('M-d,Y', strtotime($objrow['reg_date']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

    public function actionGetuserdetailbyid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $request = Yii::$app->request;
        $id = $request->post('id');
        $objData = User:: find()->where(['id' => $id])->one();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['fullname'] = $objData->fullname;
            $arrReturn['username'] = $objData->username;
            $arrReturn['email'] = $objData->email;
            $arrReturn['phone'] = $objData->phone;
            $arrReturn['image'] = $objData->image;
        }
        echo json_encode($arrReturn);
        die;
    }

    public function actionUpdateuser() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objUser = User::findOne(['id' => $id]);
                if (!$objUser) {
                    $objUser = new User();
                    $objUser->id = $id;
                }
                $objUser = User::find()->where(['id' => $id])->One();
                $objUser->fullname = $request->post('fullname');
                $objUser->username = $request->post('username');
                $objUser->email = $request->post('email');
                $objUser->phone = $request->post('phone');
                if ($objUser->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objUser->id;
                }
            }
            echo json_encode($arrReturn);
        }
    }

    public function actionDeleteuser() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objUser = User::findOne(['id' => $id]);
                $userid = ($request->post('status_id') == 'Active') ? 2 : 1;
                $objUser->status_id = $userid;
                $objUser->save();
                $arrReturn['$userid'] = $userid;
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'Deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

}

// end of UsersController.php
