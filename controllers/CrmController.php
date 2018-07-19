<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Userroles;
use app\models\Status;
use app\models\Buytype;
use app\models\Propertytypee;
use app\models\Crm;
use app\models\Mail;

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

    public function actionMail() {
        return $this->render('mail', [
        ]);
    }

    public function actionAdd() {
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objStatus = \app\models\Status :: find()->all();
        $objMeetingtype = \app\models\Meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        return $this->render('add', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objStatus' => $objStatus
        ]);
    }

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objMeetingtype = \app\models\Meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objCrm = \app\models\Crm::findOne($id);
        return $this->render('edit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objCrm' => $objCrm,
                    'objStatus' => $objStatus
        ]);
    }

    public function actionCallnow() {
        return $this->render('callnow', [
        ]);
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }

    public function actionFollowup() {
        return $this->render('followup', [
        ]);
    }

    public function actionInactivecustomer() {
        return $this->render('inactivecustomer', [
        ]);
    }

    public function actionSavefollowup() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objCrm = new \app\models\Followup();
                $objCrm->crm_id = $request->post('crm_id');
                $objCrm->remark = $request->post('remark');
                $objCrm->followupdate = $request->post('followupdate');

                if ($objCrm->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCrm->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objCrm->getErrors();
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

    public function actionCheckuniqueemail() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $Email = $request->post('cemail');
        $objCrm = Crm::findOne(['cemail' => ($Email)]);
        if ($objCrm) {
            $arrReturn['status'] = TRUE;
        }
        echo json_encode($arrReturn);
        die;
    }

//     public function actionCheckcurrentpass() {
//        $arrReturn = array();
//        $arrReturn['status'] = FALSE;
//        $request = Yii::$app->request;
//        $this->layout = "";
//        $currentpassword = ($request->post('currentpassword'));
//        $id = $request->post('id');
//        $objUser = User::find()->where(['id' => Yii::$app->session['userid']])->andWhere(['password' => md5($currentpassword)])->one();
//        if ($objUser) {
//            $arrReturn['status'] = TRUE;
//        }
//        echo json_encode($arrReturn);
//        die;
//    }
    public function actionSavecustomer() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objCrm = new \app\models\Crm;
                $objCrm->cname = $request->post('cname');
                $objCrm->cemail = $request->post('cemail');
                $objCrm->cphone = $request->post('cphone');
                $objCrm->propertytypeid = $request->post('propertytypeid');
                $objCrm->buytypeid = $request->post('buytypeid');
                $objCrm->price = $request->post('price');
                $objCrm->location = $request->post('location');
                $objCrm->meetingstatus = $request->post('meetingstatus');
                $objCrm->meetingtypeid = $request->post('meetingtypeid');
                $objCrm->detailsofproperty = $request->post('detailsofproperty');
                $objCrm->postremark = $request->post('postremark');
                $objCrm->finalstatus = $request->post('finalstatus');
                $objCrm->statusid = $request->post('statusid');
                $objCrm->reffrom = $request->post('reffrom');

                if ($objCrm->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCrm->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objCrm->getErrors();
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

    public function actionEidtcustomer() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('crmid');
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objCrm = \app\models\Crm:: find()->where(['id' => $id])->one();
                    $objCrm->cname = $request->post('cname');
                    $objCrm->cemail = $request->post('cemail');
                    $objCrm->cphone = $request->post('cphone');
                    $objCrm->propertytypeid = $request->post('propertytypeid');
                    $objCrm->buytypeid = $request->post('buytypeid');
                    $objCrm->price = $request->post('price');
                    $objCrm->location = $request->post('location');
                    $objCrm->meetingstatus = $request->post('meetingstatus');
                    $objCrm->meetingtypeid = $request->post('meetingtypeid');
                    $objCrm->detailsofproperty = $request->post('detailsofproperty');
                    $objCrm->postremark = $request->post('postremark');
                    $objCrm->finalstatus = $request->post('finalstatus');
                    $objCrm->reffrom = $request->post('reffrom');
                    $objCrm->statusid = $request->post('statusid');

                    if ($objCrm->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objCrm->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objCrm->getErrors();
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

    public function actionUpdatefollowup() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $id = $request->post('id');
        $followupdate = date('y-m-d H:m:s', strtotime($request->post('followupdate')));
        if ($request->isPost) {
            try {
                if ($id != ' ') {
                    $objFollowup = \app\models\Followup:: find()->where(['id' => $id])->one();
                    $objFollowup->crm_id = $request->post('crm_id');
                    $objFollowup->remark = $request->post('remark');
                    $objFollowup->followupdate = $followupdate;


                    if ($objFollowup->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objFollowup->id;
                        $arrReturn['msg'] = 'save successfully.';
                    }
                } else {
                    $arrReturn['crmerr'][] = $objFollowup->getErrors();
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

    public function actionGetallcustomers() {
        $arrCustomer['status'] = FALSE;
        $arrJSON = array();
        $arrCustomer = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select c.id,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                       where c.statusid = ' . 2 . '  ORDER BY `addeddate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrCustomer[] = $arrTemp;
        }
        $arrJSON['data'] = $arrCustomer;
        echo json_encode($arrJSON);
    }

    public function actionGetcustomer() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $location = $request->post('location');
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select c.id,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        where `location` LIKE %' . $location . '% ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

    public function actionGetalltodaycallcustomerlist() {
        $arrTodaycustomerList['status'] = FALSE;
        $arrJSON = array();
        $arrTodaycustomerList = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $TodayM = date("m");
        $TodayD = date("d");
        $objData = $connection->createCommand('Select c.id,f.followupdate ffadte,f.addeddate as fdate,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                         LEFT join `followup` f on f.crm_id = c.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.statusid = ' . 2 . ' ')->queryAll();
        foreach ($objData AS $objrow) {
            $M = date('m', strtotime($objrow['ffadte']));
            $D = date('d', strtotime($objrow['ffadte']));
            if ($TodayM == $M && $TodayD == $D) {
                $arrTemp = array();
                $arrTemp['status'] = TRUE;
                $arrTemp['id'] = $objrow['id'];
                $arrTemp['cname'] = $objrow['cname'];
                $arrTemp['cphone'] = $objrow['cphone'];
                $arrTemp['price'] = $objrow['price'];
                $arrTemp['location'] = $objrow['location'];
                $arrTemp['ptype'] = $objrow['ptype'];
                $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
                $arrTodaycustomerList[] = $arrTemp;
            }
        }
        $arrJSON['data'] = $arrTodaycustomerList;
        echo json_encode($arrJSON);
    }

    public function actionGetallinactivecustomer() {
        $arrOrganisation['status'] = FALSE;
        $arrJSON = array();
        $arrOrganisation = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $TodayM = date("m");
        $TodayD = date("d");
        $objData = $connection->createCommand('Select c.id,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.statusid = ' . 1 . ' ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['price'] = $objrow['price'];
            $arrTemp['location'] = $objrow['location'];
            $arrTemp['ptype'] = $objrow['ptype'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrOrganisation[] = $arrTemp;
        }
        $arrJSON['data'] = $arrOrganisation;
        echo json_encode($arrJSON);
    }

    public function actionMailsend() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $basePath = Yii::$app->params['basePath'];
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $Tomail = $request->post('tomail');
            $From = $request->post('from');
            $Message = $request->post('message');
            ////////////////////MAiL fUNCTION////////////////////////////////
            $date = date('Y-m-d');
            if($Tomail || $From || $Message){
//            $orgname = $objOrganisation->orgname;
//            $email = $objUser->email;
//            $phone = $objUser->phone;
            $header = 'Unique property';
            $logo = 'http://uniquepaf.tglobalsolutions.com/images/logo.png';
            $comURL = 'http://uniquepaf.tglobalsolutions.com/';
            $companyemail = 'sadil8003@gmail';
            // to customer mail body
            $body = "  
                    <div class='jumbotron'>
                            <p  class= 'headSetFont'>Thank you for Registering with us.<br></p>
                            <p  class= 'setPOne fontBold'><b>Hi</b> " . $Message . ",<br></p>
                            <p  class= 'setPOne fontBold'><b>Username:</b> " . 'ss' . "<br></p>
                            <p  class= 'setPOne fontBold'><b>Password:</b> " . 'dd' . "<br></p>
                            <p  class= 'setPOne fontBold'><b>Url:</b> " . $comURL . "<br></p>
                            <p  class= 'setPOne fontBold'><b>Thank you.</b> <br></p>
                            <p  class= 'setPOne'>Please feel free to contact us for any queries: <br></p>
                            <p class= 'setPOne'>Email - " . $companyemail . " <br>
                                Contact -  <br>
                            </p>
                    </div>";
            // to organisation
            $arrMailDetails = Array();
            $arrMailDetails['subject'] = 'Welcome to  Unique property ';
            $arrMailDetails['toemail'] = $Tomail;
            $arrMailDetails['body'] = $body;
            $arrMailDetails['logo'] = $logo;
            $objMail = new Mail();
            $objMail->sendEmail($arrMailDetails);
             echo "MAIL SENT SUCCESSFULLY !!";
        } else {
            $body .= "THERE ARE NO FOLLOWUPS ASSIGNED FOR TODAY.";
        }
            //////////////////////////////////////////
        }

//        echo json_encode($arrReturn);
    }

    public function actionGetcustomerdetailsbyid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select c.id,c.cemail,c.meetingstatus,c.finalstatus,c.reffrom,mt.name as mtype,f.followupdate,f.remark,
             c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,mt.name as mtype,c.cphone
                        from `crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        LEFT join `meetingtype` mt on c.meetingtypeid = mt.id 
                        LEFT join `followup` f on c.id = f.crm_id 
                        where c.id =' . $id . ' ')->queryOne();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
//            $arrReturn['fdate'] = $objData;
            $arrReturn['fdateshow'] = date('M-d,Y', strtotime($objData['followupdate']));
            ;
            $arrReturn['fdate'] = date('m-d,Y', strtotime($objData['followupdate']));
            ;
        }
        echo json_encode($arrReturn);
        die;
    }

    public function actionGetallfollowup() {
        $arrfollow['status'] = FALSE;
        $arrJSON = array();
        $arrfollow = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select f.id,f.crm_id,f.remark,f.followupdate,f.addeddate
                        from `followup` f 
                        where f.crm_id =' . $id . ' ORDER BY `followupdate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['remark'] = $objrow['remark'];
            $arrTemp['followupdate'] = date('M-d,Y H:i:s', strtotime($objrow['followupdate']));
            $arrTemp['date'] = date('m-d-Y', strtotime($objrow['followupdate']));
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrfollow[] = $arrTemp;
        }
        $arrJSON['data'] = $arrfollow;
        echo json_encode($arrJSON);
    }

}

// end of DashboardController.php
