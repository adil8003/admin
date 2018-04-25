<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Customer;
use app\models\Followup;

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

    public function actionDailyfollowup($callback = null) {

        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $objFollowup = Followup::find()->all();

        $todaydate = date("Y-m-d");
        $str = "";
        $abhishek_sir = "abhishekk@uniquepaf.com";
        $kadam_sir = "ckadam@uniquepaf.com";
        $umesh_sir = "umeshs@uniquepaf.com";
        $uniquepaf = "contact@uniquepaf.com";



        if (count($objFollowup)) {
            $str.="<table border=2>";
            $str.="<tr><td><b>Customer Name</b></td><td><b>Customer Phone</b></td><td><b>First Discussion By</b></td><td><b>First Remark</b></td><td><b>Attended By</b></td><td><b>Attended Remark</b></td></tr>";

            foreach ($objFollowup as $fp) {

                $followupdate = $fp->followupdate;
                $followupstatus = $fp->status;

                if (($todaydate == $followupdate) && ($followupstatus == "Followup")) {
                    $followupid = $fp->customerid;

                    $objCustomer = Customer::find()->where(['id' => $followupid])->one();

                    $Customername = $objCustomer->name;
                    $Customeremail = $objCustomer->email;
                    $Customerphone = $objCustomer->phone;
                    $Customerlocation = $objCustomer->location;
                    $firstremark = $fp->firstremark;
                    $firstdiscussionby = $fp->firstdiscussionby;
                    $Fpcreateddate = $fp->createddate;
                    $attendedby = $fp->attendedby;
                    $attendedremark = $fp->attendedremark;

                    $str.="<tr><td>$Customername</td><td>$Customerphone</td><td>$firstdiscussionby</td><td>$firstremark</td><td>$attendedby</td><td>$attendedremark</td></tr>";
                }
            }

            $str.="</table><br>";
        } else {
            $str.="THERE ARE NO FOLLOWUPS ASSIGNED FOR TODAY.";
        }

        echo $str;
        // die;
        //////////////////////MAiL fUNCTION////////////////////////////////
        $to = "$abhishek_sir";

        $subject = "FOLLOWUP ['$todaydate'] ";

        $message = $str;

        $header = 'MIME-Version: 1.0' . "\r\n";

        $header = 'From: contact@uniquepaf.com' . "\r\n" .
                'Reply-To: contact@uniquepaf.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();


        $mail = mail($to, $subject, $message, $header);

        if ($mail) {
            echo "MAIL SENT SUCCESSFULLY !!";
        } else {
            echo "MAIL NOT SENT SOME ERROR !!";
        }

        ////////////////////////////////////////////////
    }

    public function actionRefreshsearchresproject($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $query = Yii::$app->db->createCommand()->truncateTable('searchproperty')->execute();
        $query = "Select r.id ,r.name ,r.city ,r.location ,a.path ,c.persquarefeet ,c.totalcharges,rs.rkflat,rs.onebhk,rs.twobhk,rs.tp5bhk,rs.threebhk,rs.rowhose,rs.typeofvilla from `resproject` r LEFT "
                . "join `resprojectimage` a on r.id = a.id "
                . "join `resprojectamaneties` cs ON r.id = cs.id "
                . "join `builder` b ON r.id = b.id "
                . "join `resprojectcost` c ON r.id = c.id "
                . "join `resprojectproperty` rs ON r.id = rs.id";
        $objData = $connection->createCommand($query)->queryAll();
        foreach ($objData as $objrow) {
            $typeofproperty = ($objrow['rkflat'] != '') ? '0,' : '-, ';
            $typeofproperty .= ($objrow['onebhk'] != '') ? '1,' : '-, ';
            $typeofproperty .= ($objrow['twobhk'] != '') ? '2,' : '-, ';
            $typeofproperty .= ($objrow['tp5bhk'] != '') ? '3,' : '-, ';
            $typeofproperty .= ($objrow['threebhk'] != '') ? '4,' : '-, ';
            $typeofproperty .= ($objrow['rowhose'] != '') ? '5,' : '-, ';
            $typeofproperty .= ($objrow['typeofvilla'] != '') ? '6,' : '-, ';
            $objSearchproperty = new \app\models\Searchproperty();
            $objSearchproperty->propertyid = ('res' . $objrow['id'] != null) ? 'res' . $objrow['id'] : '';
            $objSearchproperty->name = ($objrow['name'] != null) ? $objrow['name'] : '';
            $objSearchproperty->location = ($objrow['location'] != null) ? $objrow['location'] : '';
            $objSearchproperty->city = ($objrow['city'] != null) ? $objrow['city'] : '';
            $objSearchproperty->path = ($objrow['path'] != null) ? $objrow['path'] : '/resources/resproject/no-thumb.jpg';
            $objSearchproperty->persquarefeet = ($objrow['persquarefeet'] != null) ? $objrow['persquarefeet'] : '';
            $objSearchproperty->totalcharges = ($objrow['totalcharges'] != null) ? $objrow['totalcharges'] : '';
            $objSearchproperty->typeofproperty = ($typeofproperty != null) ? $typeofproperty : '';
            $objSearchproperty->selectproperty = 'res';
            $objSearchproperty->selecttype = 'New';
            if ($objSearchproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'][] = $objSearchproperty->id;
            }
        }
        $query = "Select r.id ,r.name ,r.city ,r.location ,a.path ,ct.persquarefeet ,ct.totalcharges,d.shoporoffice from `comproject` r LEFT join `comprojectimage` a on r.id = a.id join `comprojectamaneties` cs ON r.id = cs.id join `builder` b ON r.id = b.id join `comprojectcost`ct ON r.id = ct.id join `comprojectdetails`d ON r.id = d.id";
        $objData = $connection->createCommand($query)->queryAll();
        foreach ($objData as $objrow) {
            if ($objrow['shoporoffice'] == 'shop') {
                $shoporoffice = 0;
            } else {
                $shoporoffice = 1;
            }
            $objSearchproperty = new \app\models\Searchproperty();
            $objSearchproperty->propertyid = 'com' . $objrow['id'];
            $objSearchproperty->name = ($objrow['name'] != null) ? $objrow['name'] : '';
            $objSearchproperty->location = ($objrow['location'] != null) ? $objrow['location'] : '';
            $objSearchproperty->city = ($objrow['city'] != null) ? $objrow['totalcharges'] : '';
            $objSearchproperty->path = ($objrow['path'] != null) ? $objrow['path'] : '/resources/resproject/no-thumb.jpg';
            $objSearchproperty->persquarefeet = ($objrow['persquarefeet'] != null) ? $objrow['persquarefeet'] : '';
            $objSearchproperty->totalcharges = ($objrow['totalcharges'] != null) ? $objrow['totalcharges'] : '';
            $objSearchproperty->shoporoffice = ($shoporoffice != null) ? $shoporoffice : '';
            $objSearchproperty->selectproperty = 'com';
            $objSearchproperty->selecttype = 'New';
            if ($objSearchproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'][] = $objSearchproperty->id;
            }
        }

        $query = "Select r.`id`,r.`propertytype`,r.`propertyarea`,r.`ownername`,r.`location`,r.`landmark`,r.lift,r.`expectedprice`,a.`path`,r.resellrent from `resaleproperty` r 
        LEFT join `resalepropertyimage` a on r.id = a.id ";
        $objData = $connection->createCommand($query)->queryAll();
        foreach ($objData as $objrow) {
            if ($objrow['resellrent'] == 'Resale') {
                $resellrent = 1;
            } else {
                $resellrent = 0;
            }
//            if($objrow['propertytype'] == '1 RK'){
//                $propertytype = '1,';
//            }else if($objrow['propertytype'] == '1 BHK'){
//                $propertytype = '2,';
//            }else if($objrow['propertytype'] == '2 BHK'){
//                 $propertytype = '3,';
//            }else if($objrow['propertytype'] == '3 BHK'){
//                 $propertytype = '4,';
//            }
               $resaleid = $objrow['id'];
            $query = "Select m.path ,m.resalepropertyid from `resproject` r join `resalepropertyimage` m on r.id = m.resalepropertyid";
            $objDataimg = $connection->createCommand($query)->queryAll();
//            echo "<pre>";
//            print_r($objDataimg);
//            echo "<pre>";
//            die;
             $resaleid = $objrow['id'];
            $query = "Select m.path ,m.resalepropertyid from `resproject` r join `resalepropertyimage` m on r.id = m.resalepropertyid";
            $objDataimg = $connection->createCommand($query)->queryAll();
           
            foreach ($objDataimg as $row) {
            $formatted[] = $row['path'] ;
            $listFinal = implode(',', $formatted);
            $listFinal;
             }
            foreach ($objDataimg as $row) {
                $formattedProducts[] = $row['path'] ;
            }
            $listFinal = implode(',', $formattedProducts);
            $listFinal;
            $objSearchproperty = new \app\models\Searchproperty();
            $objSearchproperty->propertyid = 'rsl' . $objrow['id'];
            $objSearchproperty->propertyarea = ($objrow['propertyarea'] != null) ? $objrow['propertyarea'] : '';
            $objSearchproperty->ownername = $objrow['ownername'];
            $objSearchproperty->location = ($objrow['location'] != null) ? $objrow['location'] : '';
            $objSearchproperty->landmark = ($objrow['landmark'] != null) ? $objrow['landmark'] : '';
            $objSearchproperty->lift = ($objrow['lift'] != null) ? $objrow['lift'] : '';
            $objSearchproperty->expectedprice = ($objrow['expectedprice'] != null) ? $objrow['expectedprice'] : '';
            $objSearchproperty->path = ($listFinal != null) ? $listFinal : '/resources/resproject/no-thumb.jpg';
            $objSearchproperty->resellrent = ($resellrent != null) ? $resellrent : '';
            $objSearchproperty->typeofproperty = ($objrow['propertytype'] != null) ? $objrow['propertytype'] : '';
            $objSearchproperty->selectproperty = 'res';
            $objSearchproperty->selecttype = 'Resale';
            if ($objSearchproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'][] = $objSearchproperty->id;
            }
        }

        echo json_encode($arrReturn);
        die;
    }

}

// end of DashboardController.php
