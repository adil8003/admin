<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Mail;
use app\models\Send;
use app\models\Bulksms;

class CronController extends Controller {

    public $enableCsrfValidation = false;
    public $user_id = '';

    public function init() {
        $this->layout = "";
    }

    public function actionIndex($callback = null) {
// retrieve data to be returned
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

//     public function actionDeletebannerimg() {
//       
//    }

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

                                    $toUpload['Mobile'] = trim(ucfirst($data[0]));
                                    $toUpload['Email'] = trim(ucfirst($data[1]));
                                    $toUpload['Salary'] = trim(ucfirst($data[2]));
                                    $myString = $toUpload['Mobile'];
                                    $newMobArray = str_replace("'", "", $toUpload['Mobile']);

                                    $handle = file_get_contents($basePath . '/resources/file/' . $file_name_new, "r");
                                    $transaction = Yii::$app->db->beginTransaction();
                                    try {
                                        $objCamsms = new \app\models\Data();
                                        $objCamsms->Mobile = ($newMobArray != ' ') ? $newMobArray : 0;
                                        $objCamsms->Email = ( $toUpload['Email'] != ' ') ? $toUpload['Email'] : 'NA';
                                        $objCamsms->Salary = ( $toUpload['Salary'] != ' ') ? $toUpload['Salary'] : 0;

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

    public function actionSavecampaign() {
        $transaction = Yii::$app->db->beginTransaction();
        $basePath = Yii::$app->params['basePath'];
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            try {
                $objCampaign = new \app\models\Campaign();
                $objCampaign->campaign = $request->post('campaign');
                $objCampaign->msg = $request->post('message');
                $objCampaign->type = $request->post('type');
                $objCampaign->status = 2;
                if ($objCampaign->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCampaign->id;
                    $arrReturn['msg'] = 'save successfully.';
                } else {
                    $arrReturn['crmerr'][] = $objCampaign->getErrors();
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

    public function actionSendmsg() {
        $transaction = Yii::$app->db->beginTransaction();
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select b.id,b.mobile,b.statusid,b.camid
                        from `bulksms` b 
                        where statusid = 2  limit 50')->queryAll();
        $count = count($objData);
        $camid = 10;
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['not send'] = 0;
            foreach($objData AS $row){
                $arrMsgDetails = Array();
                $arrMsgDetails['mobile'] = $row['mobile'];
                $objSend = new Send();
                $objReturn =  TRUE;
//                $objReturn =  TRUE;
                if($objReturn = TRUE){
                $objSend->sendMsg($arrMsgDetails);
                if($objReturn){
                    $objSend = $connection->createCommand('Update bulksms SET statusid = 1 where  id = '.$row['id'].' ')->execute();
                }else{
                     $arrReturn['not send'] += 1 ;
                }
                }else{
                  $arrReturn['msg'] = 'data not update'   ;  
                }
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionGetdailyfollowup($callback = null) {

        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $connection = Yii::$app->db;
        $TodayM = date("m");
        $TodayD = date("d");
        $todaydate = date("Y-m-d");
        $objData = $connection->createCommand('Select c.id,f.followupdate,c.finalstatus,c.addeddate,c.detailsofproperty,c.location,c.price,c.cname ,p.name as ptype,bt.name as btype,c.cphone
                        from `crm` c 
                          LEFT JOIN  `ptype` pt on pt.crm_id = c.id
                         LEFT join `followup` f on f.crm_id = c.id 
                         LEFT JOIN `propertytype` p on p.id = pt.propertytypeid    
                         LEFT join `customerstatus` cs on cs.id = c.customerstatusid 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.customerstatusid = ' . 2 . '  ||  c.customerstatusid = ' . 1 . '   GROUP BY f.id  ')->queryAll();

        $abhishek_sir = "abhishek83shekhar@gmail.com";
//        $abhishek_sir = "abhishekk@uniquepaf.com";
        if (count($objData)) {
            $body = "";
            $body .= "<table border=2>";
            foreach ($objData AS $objrow) {
                if ($objrow['followupdate'] != ' ' && $objrow['followupdate'] != NULL) {
                    $M = date('m', strtotime($objrow['followupdate']));
                    $D = date('d', strtotime($objrow['followupdate']));
                    if ($TodayM == $M && $TodayD === $D) {
                        $arrTemp = array();
                        $arrTemp['status'] = TRUE;
                        $arrTemp['cname'] = $objrow['cname'];
                        $arrTemp['cphone'] = $objrow['cphone'];
                        $arrTemp['price'] = $objrow['price'];
                        $arrTemp['location'] = $objrow['location'];
                        $arrTemp['ptype'] = $objrow['ptype'];
                        $arrReturn[] = $arrTemp;
                    }
                }
            }

            foreach ($objData AS $objrow) {
                if ($objrow['followupdate'] != ' ' && $objrow['followupdate'] != NULL) {
                    $M = date('m', strtotime($objrow['followupdate']));
                    $D = date('d', strtotime($objrow['followupdate']));
                    if ($TodayM == $M && $TodayD === $D) {
                        $digit = $objrow['price'];
                        $lengthNum = strlen($digit);
                        if ($lengthNum == 0 && $lengthNum == NULL) {
                            return ' ';
                        } else {
                            $lengthNum = strlen($digit);
//                                $n =  strlen($no); // 7
                            switch ($lengthNum) {
                                case 3:
                                    $val = $digit / 100;
                                    $val = round($val, 2);
                                    $finalval = $val . " hundred";
                                    break;
                                case 4:
                                    $val = $digit / 1000;
                                    $val = round($val, 2);
                                    $finalval = $val . " thousand";
                                    break;
                                case 5:
                                    $val = $digit / 1000;
                                    $val = round($val, 2);
                                    $finalval = $val . " thousand";
                                    break;
                                case 6:
                                    $val = $digit / 100000;
                                    $val = round($val, 2);
                                    $finalval = $val . " lakh";
                                    break;
                                case 7:
                                    $val = $digit / 100000;
                                    $val = round($val, 2);
                                    $finalval = $val . " lakh";
                                    break;
                                case 8:
                                    $val = $digit / 10000000;
                                    $val = round($val, 2);
                                    $finalval = $val . " crore";
                                    break;
                                case 9:
                                    $val = $digit / 10000000;
                                    $val = round($val, 2);
                                    $finalval = $val . " crore";
                                    break;

                                default:
                                    $val = 0;
                            }
                        }

                        $body .= "<tr>"
                                . "<td><b>Customer Name :" . $objrow['cname'] . "</b></td>"
                                . "<td><b>Customer Phone :" . $objrow['cphone'] . "</b></td>"
                                . "<td><b>Budget :" . $finalval . "</b></td>"
                                . "<td><b>location :" . $objrow['location'] . "</b></td>"
                                . "<td><b>property type:" . $objrow['ptype'] . "</b></td>"
                                . "</tr>";
                    }
                }
            }


            $body .= "</table><br>";
            // to customer

            $arrMailDetails = Array();
            $arrMailDetails['subject'] = 'Today Followup list ' . $todaydate . ' ';
            $arrMailDetails['toemail'] = $abhishek_sir;
            $arrMailDetails['body'] = $body;
            $objMail = new Mail();
            $objMail->sendFollowupEmail($arrMailDetails);
            echo "MAIL SENT SUCCESSFULLY !!";
        } else {
            $body .= "THERE ARE NO FOLLOWUPS ASSIGNED FOR TODAY.";
        }
    }

    public function actionRefreshsearchresproject($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $query = Yii::$app->db->createCommand()->truncateTable('searchproperty')->execute();
        try {
            $query = "Select r.id ,r.name ,r.city,r.status,r.location ,r.expectedprice ,a.path ,c.persquarefeet,rs.rkflat,rs.onebhk,rs.twobhk,rs.tp5bhk,rs.threebhk,rs.rowhose,rs.typeofvilla from `resproject` r LEFT "
                    . "join `resprojectimage` a on r.id = a.id "
                    . "join `resprojectamaneties` cs ON r.id = cs.id "
                    . "join `builder` b ON r.id = b.id "
                    . "join `resprojectcost` c ON r.id = c.id "
                    . "join `resprojectproperty` rs ON r.id = rs.id";
            $objData = $connection->createCommand($query)->queryAll();
            foreach ($objData as $objrow) {
                $typeofproperty = ($objrow['rkflat'] != '') ? '1,' : '-, ';
                $typeofproperty .= ($objrow['onebhk'] != '') ? '2,' : '-, ';
                $typeofproperty .= ($objrow['twobhk'] != '') ? '3,' : '-, ';
                $typeofproperty .= ($objrow['tp5bhk'] != '') ? '4,' : '-, ';
                $typeofproperty .= ($objrow['threebhk'] != '') ? '5,' : '-, ';
                $typeofproperty .= ($objrow['rowhose'] != '') ? '6,' : '-, ';
                $typeofproperty .= ($objrow['typeofvilla'] != '') ? '7,' : '-, ';
                $resid = $objrow['id'];
                $listFinal = $this->getAllSearchResImage($resid); //implode(',', $formatted);
                $objSearchproperty = new \app\models\Searchproperty();
                $objSearchproperty->propertyid = 'Res' . $objrow['id'];
                $objSearchproperty->name = ($objrow['name'] != null) ? $objrow['name'] : '';
                $objSearchproperty->location = ($objrow['location'] != null) ? $objrow['location'] : '';
                $objSearchproperty->city = ($objrow['city'] != null) ? $objrow['city'] : '';
                $objSearchproperty->path = ($listFinal != null) ? $listFinal : '/resources/resproject/no-thumb.jpg';
                $objSearchproperty->persquarefeet = ($objrow['persquarefeet'] != null) ? $objrow['persquarefeet'] : '';
                $objSearchproperty->expectedprice = ($objrow['expectedprice'] != null) ? $objrow['expectedprice'] : '';
                $objSearchproperty->typeofproperty = ($typeofproperty != null) ? $typeofproperty : '';
                $objSearchproperty->selectproperty = 'res';
                $objSearchproperty->selecttype = 'New';
                $objSearchproperty->status = ($objrow['status'] != null) ? $objrow['status'] : '';
                if ($objSearchproperty->save()) {
                    $arrReturn['resstatus'] = TRUE;
                    $arrReturn['resid'][] = $objSearchproperty->id;
                } else {
                    $arrReturn['reserr'][] = $objSearchproperty->getErrors();
                }
            }
        } catch (Exception $e) {
            $arrReturn['resexp'] = $e->getMessage();
        }
        try {
            $query = "Select r.id ,r.name,r.status ,r.city ,r.location, a.path,d.shoporoffice,d.areapersqfeet,d.expectedprice,d.neworold,ed.preferredid,ed.furnishingid from `comproject` r LEFT join `comprojectimage` a on r.id = a.id join `comprojectdetails`d ON r.id = d.id join `comextradetails`ed ON r.id = ed.id";
            $objData = $connection->createCommand($query)->queryAll();
            foreach ($objData as $objrow) {
                if ($objrow['shoporoffice'] == 'shop') {
                    $shoporoffice = 0;
                } else {
                    $shoporoffice = 1;
                }

                $comid = $objrow['id'];
                $listFinal = $this->getAllSearchComImage($comid); //implode(',', $formatted);
                $objSearchproperty = new \app\models\Searchproperty();
                $objSearchproperty->propertyid = 'Com' . $objrow['id'];
                $objSearchproperty->name = ($objrow['name'] != null) ? $objrow['name'] : '';
                $objSearchproperty->location = ($objrow['location'] != null) ? $objrow['location'] : '';
                $objSearchproperty->city = ($objrow['city'] != null) ? $objrow['city'] : '';
                $objSearchproperty->path = ($listFinal != null) ? $listFinal : '/resources/resproject/no-thumb.jpg';
                $objSearchproperty->persquarefeet = ($objrow['areapersqfeet'] != null) ? $objrow['areapersqfeet'] : '';
                $objSearchproperty->expectedprice = ($objrow['expectedprice'] != null) ? $objrow['expectedprice'] : '';
                $objSearchproperty->shoporoffice = ($shoporoffice != null) ? $shoporoffice : '';
                $objSearchproperty->neworold = ($objrow['neworold'] != null) ? $objrow['neworold'] : '';
                $objSearchproperty->selectproperty = 'com';
                $objSearchproperty->selecttype = 'New';
                $objSearchproperty->status = ($objrow['status'] != null) ? $objrow['status'] : '';
                if ($objSearchproperty->save()) {
                    $arrReturn['comstatus'] = TRUE;
                    $arrReturn['comid'][] = $objSearchproperty->id;
                } else {
                    $arrReturn['comerr'][] = $objSearchproperty->getErrors();
                }
            }
        } catch (Exception $e) {
            $arrReturn['comexp'] = $e->getMessage();
        }
        try {
            $query = "Select r.`id`,r.`status`,r.`propertytype`,r.`propertyarea`,r.`ownername`,r.`location`,r.`landmark`,r.lift,r.`expectedprice`,a.`path`,r.resellrent ,m.`heading2details` from `resaleproperty` r LEFT join `resalepropertyimage` a on r.id = a.id join `resalemicrositedetails` m on r.id = m.id";
            $objData = $connection->createCommand($query)->queryAll();
            foreach ($objData as $objrow) {
                if ($objrow['resellrent'] == 'Resale') {
                    $resellrent = 1;
                } else {
                    $resellrent = 0;
                }

                $resaleid = $objrow['id'];

                $listFinal = $this->getAllSearchImage($resaleid); //implode(',', $formatted);
                $objSearchproperty = new \app\models\Searchproperty();
                $objSearchproperty->propertyid = 'Rsl' . $objrow['id'];
                $objSearchproperty->propertyarea = ($objrow['propertyarea'] != null) ? $objrow['propertyarea'] : '';
                $objSearchproperty->ownername = $objrow['ownername'];
                $objSearchproperty->location = ($objrow['location'] != null) ? $objrow['location'] : '';
                $objSearchproperty->landmark = ($objrow['landmark'] != null) ? $objrow['landmark'] : '';
                $objSearchproperty->ameneties = ($objrow['heading2details'] != null) ? $objrow['heading2details'] : '';
                $objSearchproperty->expectedprice = ($objrow['expectedprice'] != null) ? $objrow['expectedprice'] : '';
                $objSearchproperty->path = ($listFinal != null) ? $listFinal : '/resources/resproject/no-thumb.jpg';
                $objSearchproperty->resellrent = ($resellrent != null) ? $resellrent : '';
                $objSearchproperty->typeofproperty = ($objrow['propertytype'] != null) ? $objrow['propertytype'] : '';
                $objSearchproperty->selectproperty = 'rsl';
                $objSearchproperty->selecttype = 'Resale';
                $objSearchproperty->status = ($objrow['status'] != null) ? $objrow['status'] : '';
                if ($objSearchproperty->save()) {
                    $arrReturn['rslstatus'] = TRUE;
                    $arrReturn['rslid'][] = $objSearchproperty->id;
                } else {
                    $arrReturn['rslerr'][] = $objSearchproperty->getErrors();
                }
            }
        } catch (Exception $e) {
            $arrReturn['rslexp'] = $e->getMessage();
        }
        try {
            $query = "Select p.`id`,p.`status`,p.`areapersquarefeet`,p.`detailedaddress`,p.`location`,p.`landmark`,p.`expectedprice`,p.saleorrent ,p.`areaperguntha`,p.`zone`,a.`path` from `plots` p LEFT join `plotsimage` a on p.id = a.id";
            $objData = $connection->createCommand($query)->queryAll();
            foreach ($objData as $objrow) {
                if ($objrow['saleorrent'] == 'purchase') {
                    $resellrent = 1;
                } else {
                    $resellrent = 0;
                }
                $ploteid = $objrow['id'];

                if ($objrow['zone'] == 'R Zone') {
                    $zone = '1';
                } else if ($objrow['zone'] == 'Commercial Zone') {
                    $zone = '2';
                } else if ($objrow['zone'] == 'Industrial Zone') {
                    $zone = '3';
                } else if ($objrow['zone'] == 'Rural Zone') {
                    $zone = '4';
                }

//                                $zone = ($objrow['zone'] != '') ? '1,' : '-, ';
//                                $zone .= ($objrow['onebhk'] != '') ? '2,' : '-, ';
//                                $zone .= ($objrow['twobhk'] != '') ? '3,' : '-, ';
//                                $zone .= ($objrow['twobhk'] != '') ? '3,' : '-, ';

                $listFinal = $this->getAllSearchPlotImage($ploteid); //implode(',', $formatted);
                $objSearchproperty = new \app\models\Searchproperty();
                $objSearchproperty->propertyid = 'Plot' . $objrow['id'];
                $objSearchproperty->propertyarea = ($objrow['areapersquarefeet'] != null) ? $objrow['areapersquarefeet'] : '';
                $objSearchproperty->location = ($objrow['location'] != null) ? $objrow['location'] : '';
                $objSearchproperty->landmark = ($objrow['landmark'] != null) ? $objrow['landmark'] : '';
                $objSearchproperty->expectedprice = ($objrow['expectedprice'] != null) ? $objrow['expectedprice'] : '';
                $objSearchproperty->path = ($listFinal != null) ? $listFinal : '/resources/resproject/no-thumb.jpg';
                $objSearchproperty->resellrent = ($resellrent != null) ? $resellrent : '';
                $objSearchproperty->selectproperty = 'plot';
                $objSearchproperty->zone = ($zone != null) ? $zone : '';
                $objSearchproperty->selecttype = 'New';
                $objSearchproperty->status = ($objrow['status'] != null) ? $objrow['status'] : '';
                if ($objSearchproperty->save()) {
                    $arrReturn['rslstatus'] = TRUE;
                    $arrReturn['plotid'][] = $objSearchproperty->id;
                } else {
                    $arrReturn['ploterr'][] = $objSearchproperty->getErrors();
                }
            }
        } catch (Exception $e) {
            $arrReturn['rslexp'] = $e->getMessage();
        }

        echo json_encode($arrReturn);
        die;
    }

    public function getAllSearchImage($resaleid) {
        $connection = Yii::$app->db;
        $arrlistimg = array();
        $query = "Select m.path ,m.resalepropertyid from `resaleproperty` r "
                . "join `resalepropertyimage` m on r.id = m.resalepropertyid where m.resalepropertyid = $resaleid";
        $objDataimg = $connection->createCommand($query)->queryAll();
        foreach ($objDataimg as $row) {
            $arrlistimg[] = $row['path'];
        }
        $strlistimg = implode(',', $arrlistimg);
        return $strlistimg;
    }

    public function getAllSearchResImage($resid) {
        $connection = Yii::$app->db;
        $arrlistimg = array();
        $query = "Select m.path ,m.resprojectid from `resproject` r "
                . "join `resprojectimage` m on r.id = m.resprojectid where m.resprojectid = $resid";
        $objDataimg = $connection->createCommand($query)->queryAll();
        foreach ($objDataimg as $row) {
            $arrlistimg[] = $row['path'];
        }
        $strlistimg = implode(',', $arrlistimg);
        return $strlistimg;
    }

    public function getAllSearchComImage($comid) {
        $connection = Yii::$app->db;
        $arrlistimg = array();
        $query = "Select m.path ,m.comprojectid from `comproject` r "
                . "join `comprojectimage` m on r.id = m.comprojectid where type ='typeamaneti' ||  type = 'typeoffice'  && m.comprojectid = $comid";
        $objDataimg = $connection->createCommand($query)->queryAll();
        foreach ($objDataimg as $row) {
            $arrlistimg[] = $row['path'];
        }
        $strlistimg = implode(',', $arrlistimg);
        return $strlistimg;
    }

    public function getAllSearchPlotImage($ploteid) {
        $connection = Yii::$app->db;
        $arrlistimg = array();
        $query = "Select m.path ,m.plotsid from `plots` r "
                . "join `plotsimage` m on r.id = m.plotsid where type ='plotsite' ||  type = 'other'  && m.plotsid = $ploteid";
        $objDataimg = $connection->createCommand($query)->queryAll();
        foreach ($objDataimg as $row) {
            $arrlistimg[] = $row['path'];
        }
        $strlistimg = implode(',', $arrlistimg);
        return $strlistimg;
    }

}

// end of DashboardController.php

    