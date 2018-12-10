<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Voicecalldata;
use app\models\Status;

class VoicecallController extends Controller {

    public $enableCsrfValidation = false;
    public $userid = '';
    public $base_path = 'C:\wamp\www\admin/';

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

    public function actionFollowup() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objCustomerstatus = \app\models\Customerstatus :: find()->all();
        $objCrm = \app\models\Voicecall::findOne($id);
        return $this->render('followup', [
                    'objCustomerstatus' => $objCustomerstatus,
                    'objCrm' => $objCrm
        ]);
    }

    public function actionEdit() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objStatus = \app\models\Status :: find()->all();
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objLandtype = \app\models\Landtype:: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        $objResidential = \app\models\Residential::findOne($id);
        $connection = Yii::$app->db;
        $objSelectedptype = $connection->createCommand('Select p.id, pt.propertytypeid , p.name from `propertytype` p '
                        . 'LEFT JOIN `respropertytype` pt on p.id = pt.propertytypeid '
                        . 'LEFT JOIN `residential` c on c.id = pt.residentialid where c.id =' . $id)->queryAll();
        return $this->render('edit', [
                    'objBuyTpe' => $objBuyTpe,
                    'objPropertytype' => $objPropertytype,
                    'objResidential' => $objResidential,
                    'objStatus' => $objStatus,
                    'objLandtype' => $objLandtype,
                    'objSelectedptype' => $objSelectedptype,
        ]);
    }

    public function actionAdd() {
        $objBuyTpe = \app\models\Buytype :: find()->all();
        $objLandtype = \app\models\Landtype:: find()->all();
        $objStatus = \app\models\Status :: find()->all();
        $objMeetingtype = \app\models\Meetingtype :: find()->all();
        $objPropertytype = \app\models\Propertytype::find()->all();
        return $this->render('add', [
                    'objBuyTpe' => $objBuyTpe,
                    'objMeetingtype' => $objMeetingtype,
                    'objPropertytype' => $objPropertytype,
                    'objStatus' => $objStatus,
                    'objLandtype' => $objLandtype,
        ]);
    }

    public function actionError() {
        return $this->render('error', [
        ]);
    }

    public function actionGetallcustomers() {
        $arrCustomer['status'] = FALSE;
        $arrJSON = array();
        $arrCustomer = array();
        $this->layout = "";
        $request = Yii::$app->request;
        $connection = Yii::$app->db;
        $id = Yii::$app->session['userid'];
        $objData = $connection->createCommand('Select  v.crm_id as vid,c.addeddate, c.id,c.name,c.mobile,c.email,u.email as uemail,b.name as bname
                        from `voicecall` c  
                        LEFT join `builders` b on c.builderid = b.id 
                        LEFT join `user` u on u.id = c.userid
                        LEFT join `callfollowup` v on v.crm_id = c.id
                        where c.statusid = ' . 2 . '  AND  u.id = ' . $id . '  ')->queryAll();
       
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['name'] = $objrow['name'];
            $arrTemp['vid'] = $objrow['vid'];
            $arrTemp['mobile'] = $objrow['mobile'];
            $arrTemp['email'] = $objrow['email'];
            $arrTemp['bname'] = $objrow['bname'];
            $arrTemp['uemail'] = $objrow['uemail'];
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrCustomer[] = $arrTemp;
        }
        $arrJSON['data'] = $arrCustomer;
        echo json_encode($arrJSON);
    }

    public function actionSavelistofdata() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $connection = Yii::$app->db;
        $min = 16;
        $max = 17;
        $connection = Yii::$app->db;
        $query = "Select c.Mobile
                        from `data` c 
                        where c.Salary BETWEEN $min AND $max ";
        $objData = $connection->createCommand($query)->queryAll();

        try {
            foreach ($objData AS $objrow) {
                $objBulksms = new \app\models\Bulksms();

                $objBulksms->camid = 16;
                $objBulksms->mobile = trim($objrow['Mobile']);
//                $objBulksms->mobile = 8007171761;
                $objBulksms->statusid = 2;
                if ($objBulksms->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objBulksms->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['blkerr'][] = $objBulksms->getErrors();
                }
            }
            $transaction->commit();
            yii::info(' modal saved');
        } catch (Exception $ex) {
            $arrReturn['blkexp'] = $e->getMessage();
            $transaction->rollBack();
        }
        echo json_encode($arrReturn);
    }

   

    public function actionSavecomdata() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $builderid = $request->post('builderid');
        $max = $request->post('max');
        $min = $request->post('min');
        $userid = $request->post('userid');
        if ($request->isPost) {
            try {
                $connection = Yii::$app->db;
                $query = "Select c.mobile , c.name,c.salary ,c.email
                        from `voicecalldata` c 
                        where c.Salary BETWEEN $min AND $max ";
                $objData = $connection->createCommand($query)->queryAll();
//                $query = "Select c.mobile , c.name,c.salary 
//                        from ` voicecalldata` c 
//                        where c.salary BETWEEN $min AND $max ";
//                   LEFT join `builders` b on c.builderid = b.id 
//                        LEFT join `user` u on u.id = u.userid  
//                . " r.price,p.name as ptype ,r.location,s.name as stype
//                        from `resale` r 
//                $Data = $connection->createCommand($query)->queryAll();
//                echo "<pre>";
//                print_r($Data);
//                echo "<pre>";die;
                foreach ($objData as $value) {
                    $objBuilders = new \app\models\Voicecall();
                    $objBuilders->name = $value['name'];
                    $objBuilders->mobile = $value['mobile'];
                    $objBuilders->email = $value['email'];
                    $objBuilders->statusid = 2;
                    $objBuilders->salary = $value['salary'];
                    $objBuilders->builderid = $request->post('builderid');
                    $objBuilders->userid = $request->post('userid');


                    if ($objBuilders->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objBuilders->id;
                        $arrReturn['msg'] = 'save successfully.';
                    } else {
                        $arrReturn['crmerr'][] = $objBuilders->getErrors();
                    }
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

    public function actionGetbuilders() {
        $arrJSON = array();
        $arrBuilders = array();
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $Org_id = $request->post('id');
        $objbuilders = $connection->createCommand('select * from builders')->queryAll();
        foreach ($objbuilders AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['name'] = $objrow['name'];
            $arrBuilders[] = $arrTemp;
        }
        $arrJSON['data'] = $arrBuilders;
        echo json_encode($arrJSON);
    }

    public function actionGetusers() {
        $arrJSON = array();
        $arrUsers = array();
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $objusers = $connection->createCommand('select * from user where role_id != 1')->queryAll();
        foreach ($objusers AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['username'] = $objrow['username'];
            $arrTemp['email'] = $objrow['email'];
            $arrTemp['phone'] = $objrow['phone'];
            $arrTemp['status_id'] = $objrow['status_id'];
            $arrTemp['role_id'] = $objrow['role_id'];
            $arrUsers[] = $arrTemp;
        }
        $arrJSON['data'] = $arrUsers;
        echo json_encode($arrJSON);
    }

    public function actionBulkuploadcustomers() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;

        if (isset($_FILES['file'])) {

            $file = $_FILES ['file'];
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            $file_ext = explode('.', $file_name);
            $filename = strtolower($file_ext[0]);
            $file_ext = strtolower(end($file_ext));
            $allowed = array('csv');
            if (in_array($file_ext, $allowed)) {

                if ($file_error === 0) {
                    if ($file_size <= 20971524) {
                        $basePath = Yii::$app->params['basePath'];
                        $file_name_new = $filename . '.' . $file_ext;
                        $uploaddir = 'resources/file/';
                        $file_destination = $basePath . $uploaddir . $file_name_new;

                        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_destination)) {
                            $fileInput = file_get_contents($basePath . 'resources/file/' . $file_name_new);
                            $Lines = explode("\r\n", $fileInput);
                            for ($i = 0; $i < count($Lines); $i++) {

                                set_time_limit(0);
                                $data = explode(",", $Lines[$i]);

                                $toUpload = [];

                                if ($i != 0 and ! empty($Lines[$i])) {

                                    $toUpload['name'] = trim(ucfirst($data[3]));
                                    $toUpload['mobile'] = trim(ucfirst($data[0]));
                                    $toUpload['email'] = trim(ucfirst($data[1]));
                                    $toUpload['salary'] = trim(ucfirst($data[2]));
                                    $myString = $toUpload['mobile'];
                                    $newMobArray = str_replace("'", "", $toUpload['mobile']);

                                    $handle = file_get_contents($basePath . '/resources/file/' . $file_name_new, "r");
                                    $transaction = Yii::$app->db->beginTransaction();
                                    try {
                                        $objCamsms = new \app\models\Voicecalldata();
                                        $objCamsms->name = ($toUpload['name'] != ' ') ? $toUpload['name'] : 'NA';
                                        $objCamsms->mobile = ($newMobArray != ' ') ? $newMobArray : 0;
                                        $objCamsms->email = ( $toUpload['email'] != ' ') ? $toUpload['email'] : 'NA';
                                        $objCamsms->salary = ( $toUpload['salary'] != ' ') ? $toUpload['salary'] : 0;

                                        if ($objCamsms->save()) {
                                            $arrReturn['status'] = TRUE;
                                            $arrReturn['id'] = $objCamsms->id;
                                            $arrReturn['msg'] = 'save successfully.';
                                        }
//                                        else 
//                                            {
//                                            $arrReturn['reserr'][] = $objCamsms->getErrors();
//                                        }
//                                            echo "<pre>";
//                print_r($toUpload);
//                echo "<pre>";die;
//                                        }
//                                }
                                        $transaction->commit();
//                                        yii::info('all modal saved');
                                    } catch (Exception $ex) {
                                        $arrReturn['curexp'] = $e->getMessage();
//                                        $transaction->rollBack();
                                    }
                                }
                            }
                            // return true;
                        }
                    }
                }
            }
        }

        echo json_encode($arrReturn);
    }

    public function actionSavefollowup() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objFollowup = new \app\models\Callfollowup();
                $objFollowup->crm_id = $request->post('crm_id');
                $objFollowup->remark = $request->post('remark');
                $objFollowup->followupdate = $request->post('followupdate');

                if ($objFollowup->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objFollowup->id;
                    $arrReturn['msg'] = 'save successfully.';

//                    $objCrm = \app\models\Crm:: find()->where(['id' => $request->post('crm_id')])->one();
//                    $objCrm->customerstatusid = $request->post('customerstatusid');
//                    ;
//                    $objCrm->save();
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

    public function actionGetallfollowup() {
        $arrfollow['status'] = FALSE;
        $arrJSON = array();
        $arrfollow = array();
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select f.id,f.crm_id,f.remark,f.followupdate,f.addeddate
                        from `callfollowup` f 
                        LEFT join `voicecall` c on c.id = f.crm_id 
                        where f.crm_id =' . $id . ' ORDER BY `followupdate` DESC ')->queryAll();
        foreach ($objData AS $objrow) {
            $arrTemp = array();
            $arrTemp['status'] = TRUE;
            $arrTemp['id'] = $objrow['id'];
            $arrTemp['remark'] = $objrow['remark'];
//            $arrTemp['customerstatusid'] = $objrow['customerstatusid'];
            $arrTemp['followupdate'] = date('M-d,Y H:i:s', strtotime($objrow['followupdate']));
            $arrTemp['date'] = date('m-d-Y', strtotime($objrow['followupdate']));
            $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
            $arrfollow[] = $arrTemp;
        }
        $arrJSON['data'] = $arrfollow;
        echo json_encode($arrJSON);
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
                    $objFollowup = \app\models\Callfollowup:: find()->where(['id' => $id])->one();
                    $objFollowup->crm_id = $request->post('crm_id');
                    $objFollowup->remark = $request->post('remark');
                    $objFollowup->followupdate = $followupdate;
                    if ($objFollowup->save()) {
                        $arrReturn['status'] = TRUE;
                        $arrReturn['id'] = $objFollowup->crm_id;
                        $arrReturn['msg'] = 'save successfully.';

//                        $objCrm = \app\models\Crm:: find()->where(['id' => $request->post('crm_id')])->one();
//                        $objCrm->customerstatusid = $request->post('customerstatusid');
//                        $objCrm->save();
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

}

// end of VoicecallController.php
