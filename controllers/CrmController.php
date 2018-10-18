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
use app\models\Customertatus;

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
        $objCustomerstatus = \app\models\Customerstatus :: find()->all();
        $objMeetingtype = \app\models\Meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        return $this->render('add', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objStatus' => $objStatus,
                    'objCustomerstatus' => $objCustomerstatus
        ]);
    }

    public function actionEdit() {
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
        return $this->render('edit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objCrm' => $objCrm,
                    'objStatus' => $objStatus,
                    'objSelectedptype' => $objSelectedptype,
                    'objCustomerstatus' => $objCustomerstatus
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
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objCustomerstatus = \app\models\Customerstatus :: find()->all();
        $objCrm = \app\models\Crm::findOne($id);
        return $this->render('followup', [
                    'objCustomerstatus' => $objCustomerstatus,
                    'objCrm' => $objCrm
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
                $objFollowup = new \app\models\Followup();
                $objFollowup->crm_id = $request->post('crm_id');
                $objFollowup->remark = $request->post('remark');
                $objFollowup->followupdate = $request->post('followupdate');

                if ($objFollowup->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objFollowup->id;
                    $arrReturn['msg'] = 'save successfully.';

                    $objCrm = \app\models\Crm:: find()->where(['id' => $request->post('crm_id')])->one();
                    $objCrm->customerstatusid = $request->post('customerstatusid');
                    ;
                    $objCrm->save();
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

    public function actionCheckuniquecontact() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $Contact = $request->post('cphone');
        $objCrm = Crm::findOne(['cphone' => ($Contact)]);
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
//                $objCrm->propertytypeid = $request->post('propertytypeid');
                $objCrm->buytypeid = $request->post('buytypeid');
                $objCrm->price = $request->post('price');
                $objCrm->location = $request->post('location');
                $objCrm->meetingstatus = $request->post('meetingstatus');
                $objCrm->meetingtypeid = $request->post('meetingtypeid');
                $objCrm->detailsofproperty = $request->post('detailsofproperty');
                $objCrm->postremark = $request->post('postremark');
                $objCrm->finalstatus = $request->post('finalstatus');
                $objCrm->customerstatusid = $request->post('statusid');
                $objCrm->reffrom = $request->post('reffrom');

                if ($objCrm->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCrm->id;
                    $arrReturn['msg'] = 'save successfully.';

                    foreach ($request->post('propertytypeid') as $key => $value) {
                        $objPtype = new \app\models\Ptype ();
                        $objPtype->crm_id = $objCrm->id;
                        $objPtype->propertytypeid = $value;
                        $objPtype->save();
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
                    $objCrm->buytypeid = $request->post('buytypeid');
                    $objCrm->price = $request->post('price');
                    $objCrm->location = $request->post('location');
                    $objCrm->meetingstatus = $request->post('meetingstatus');
                    $objCrm->meetingtypeid = $request->post('meetingtypeid');
                    $objCrm->detailsofproperty = $request->post('detailsofproperty');
                    $objCrm->postremark = $request->post('postremark');
                    $objCrm->finalstatus = $request->post('finalstatus');
                    $objCrm->reffrom = $request->post('reffrom');
                    $objCrm->customerstatusid = $request->post('statusid');

                    if ($objCrm->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objCrm->id;
                        $arrReturn['msg'] = 'save successfully.';

                        $query = Yii::$app->db->createCommand()
                                        ->delete('ptype', 'crm_id=:id', array(':id' => $objCrm->id))->execute();
                        foreach ($request->post('propertytypeid') as $key => $value) {
                            $objCoursebranch = new \app\models\Ptype ();
                            $objCoursebranch->crm_id = $objCrm->id;
                            $objCoursebranch->propertytypeid = $value;
                            $objCoursebranch->save();
                        }
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
                        $arrReturn['id'] = $objFollowup->crm_id;
                        $arrReturn['msg'] = 'save successfully.';

                        $objCrm = \app\models\Crm:: find()->where(['id' => $request->post('crm_id')])->one();
                        $objCrm->customerstatusid = $request->post('customerstatusid');
                        $objCrm->save();
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
        $objData = $connection->createCommand('Select   c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,p.name as ptype,c.cname ,bt.name as btype,c.cphone
                        from `crm` c  
                        LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                    	LEFT JOIN `propertytype` p on p.id = pt.propertytypeid     
                        LEFT join `buytype` bt on c.buytypeid = bt.id
                        where c.customerstatusid = ' . 2 . ' ||  c.customerstatusid = ' . 1 . '   GROUP BY c.id')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['cname'] = $objrow['cname'];
            $arrTemp['cphone'] = $objrow['cphone'];
            $arrTemp['cemail'] = $objrow['cemail'];
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
        $objData = $connection->createCommand('Select c.id,f.followupdate,f.addeddate as fdate,c.finalstatus,
            c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                          LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                         LEFT join `followup` f on f.crm_id = c.id 
                         LEFT JOIN `propertytype` p on p.id = pt.propertytypeid    
                         LEFT join `customerstatus` cs on cs.id = c.customerstatusid 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.customerstatusid = ' . 2 . '  ||  c.customerstatusid = ' . 1 . '   GROUP BY f.id')->queryAll();
        foreach ($objData AS $objrow) {
            $M = date('m', strtotime($objrow['followupdate']));
            $D = date('d', strtotime($objrow['followupdate']));
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
        $objData = $connection->createCommand('Select   c.id,c.cemail,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,p.name as ptype,c.cname ,bt.name as btype,c.cphone
                        from `crm` c  
                         LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                    	LEFT JOIN `propertytype` p on p.id = pt.propertytypeid     
                        LEFT join `buytype` bt on c.buytypeid = bt.id
                        where c.customerstatusid = ' . 3 . '    GROUP BY c.id ')->queryAll();
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
            $Tomail = $request->post('to');
            $From = $request->post('from');
            $Message = $request->post('message');
            $CusstomerName = $request->post('cname');
            ////////////////////MAiL fUNCTION////////////////////////////////
            $date = date('Y-m-d');
            if ($Tomail || $From || $Message) {
//            $orgname = $objOrganisation->orgname;
//            $email = $objUser->email;
//            $phone = $objUser->phone;
                $header = 'Unique property';
                $logo = 'http://uniquepaf.tglobalsolutions.com/images/logo.png';
                $comURL = 'http://uniquepaf.tglobalsolutions.com/';
                $companyemail = 'abhishekk@uniquepaf.com';
                // to customer mail body
                $body = "  
                    <div class='jumbotron'>
                            <p  class= 'headSetFont'>Thanks for being a part of the Unique property & finance family.<br></p>
                            <p  class= 'setPOne fontBold'><b>Dear: </b> " . $CusstomerName . ",<br></p>
                            <p  class= 'setPOne fontBold'><b>Message:</b> " . $Message . "<br></p><hr>
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
        $objData = $connection->createCommand('Select c.id,c.postremark,c.cemail,c.meetingstatus,c.finalstatus,c.reffrom,mt.name as mtype,f.followupdate,f.remark,
             c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,mt.name as mtype,c.cphone
                        from `crm` c 
                         LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                        LEFT join `propertytype` p on pt.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        LEFT join `meetingtype` mt on c.meetingtypeid = mt.id 
                        LEFT join `followup` f on c.id = f.crm_id 
                        where c.id = ' . $id . '   GROUP BY c.id ')->queryOne();

        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
            $arrReturn['fdateshow'] = date('M-d,Y', strtotime($objData['followupdate']));
            $arrReturn['fdate'] = date('m-d,Y', strtotime($objData['followupdate']));
        }
        $objSelectedptype = $connection->createCommand('Select p.name from `propertytype` p '
                        . 'LEFT JOIN `ptype` pt on p.id = pt.propertytypeid '
                        . 'LEFT JOIN `crm` c on c.id = pt.crm_id where c.id =' . $objData['id'])->queryAll();
        $arrReturn['ptypename'] = $objSelectedptype;
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
        $objData = $connection->createCommand('Select c.customerstatusid,f.id,f.crm_id,f.remark,f.followupdate,f.addeddate
                        from `followup` f 
                        LEFT join `crm` c on c.id = f.crm_id 
                        where f.crm_id =' . $id . ' ORDER BY `followupdate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['remark'] = $objrow['remark'];
            $arrTemp['customerstatusid'] = $objrow['customerstatusid'];
            $arrTemp['followupdate'] = date('M-d,Y H:i:s', strtotime($objrow['followupdate']));
            $arrTemp['date'] = date('m-d-Y', strtotime($objrow['followupdate']));
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrfollow[] = $arrTemp;
        }
        $arrJSON['data'] = $arrfollow;
        echo json_encode($arrJSON);
    }
    public function actionInactivecus() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objCrm = Crm::find()->where(['id' => $id])->One();
                $objCrm->customerstatusid = 3;
                $objCrm->save();
                $arrReturn['id'] = $id;
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'Deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionActivecustomer() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objCrm = Crm::find()->where(['id' => $id])->One();
                $objCrm->customerstatusid = 1;
                $objCrm->save();
                $arrReturn['id'] = $id;
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'Deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionActivecustome() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objCrm = Crm::find()->where(['id' => $id])->One();
                $objCrm->customerstatusid = 1;
                $objCrm->save();
                $arrReturn['id'] = $id;
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'Deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

}

// end of DashboardController.php
