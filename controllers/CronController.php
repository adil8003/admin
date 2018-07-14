<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Customer;
use app\models\Followup;
use app\models\Mail;

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
                        from `Crm` c 
                        LEFT join `propertytype` p on c.propertytypeid = p.id 
                         LEFT join `followup` f on f.crm_id = c.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id where c.statusid = ' . 2 . ' ')->queryAll();

        $abhishek_sir = "sadil8003@gmail.com";
        // $kadam_sir = "ckadam@uniquepaf.com";
        // $umesh_sir = "umeshs@uniquepaf.com";
        // $uniquepaf = "contact@uniquepaf.com";
        if (count($objData)) {
            $body = "";
            $body .= "<table border=2>";
            $body .= "<tr><td><b>Customer Name</b></td><td><b>Customer Phone</b></td><td><b>First Discussion By</b></td><td><b>First Remark</b></td><td><b>Attended By</b></td><td><b>Attended Remark</b></td></tr>";
            foreach ($objData AS $objrow) {
                $M = date('m', strtotime($objrow['followupdate']));
                $D = date('d', strtotime($objrow['followupdate']));
                if ($TodayM == $M && $TodayD === $D) {
                    $arrTemp = array();
                    $arrTemp['status'] = TRUE;
                    $arrTemp['id'] = $objrow['id'];
                    $arrTemp['cname'] = $objrow['cname'];
                    $arrTemp['cphone'] = $objrow['cphone'];
                    $arrTemp['price'] = $objrow['price'];
                    $arrTemp['location'] = $objrow['location'];
                    $arrTemp['ptype'] = $objrow['ptype'];
                    $arrTemp['addeddate'] = date('M-d,Y', strtotime($objrow['addeddate']));
                    $arrReturn[] = $arrTemp;
                }
            }

            $body .= "</table><br>";


            // to customer

            $arrMailDetails = Array();
            $arrMailDetails['subject'] = 'Today Followup list ' . $todaydate . ' ';
            $arrMailDetails['toemail'] = $abhishek_sir;
            $arrMailDetails['body'] = $body;
            $objMail = new Mail();
            $objMail->sendEmail($arrMailDetails);
            echo "MAIL SENT SUCCESSFULLY !!";
        } else {
            $body .= "THERE ARE NO FOLLOWUPS ASSIGNED FOR TODAY.";
        }


//        echo $str;
        // die;
        //////////////////////MAiL fUNCTION////////////////////////////////
//        $to = "$abhishek_sir";
//
//        $subject = "FOLLOWUP ['$todaydate'] ";
//
//        $message = $str;
//
//        $header = 'MIME-Version: 1.0' . "\r\n";
//
//        $header = 'From: contact@uniquepaf.com' . "\r\n" .
//                'Reply-To: contact@uniquepaf.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//
//
//        $mail = mail($to, $subject, $message, $header);
//
//        if ($mail) {
//            echo "MAIL SENT SUCCESSFULLY !!";
//        } else {
//            echo "MAIL NOT SENT SOME ERROR !!";
//        }
        ////////////////////////////////////////////////
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

    