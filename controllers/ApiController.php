<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\User;
use app\models\Postproperty;
use app\models\Mail;

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

    public function actionSavepostproperty($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $objPostproperty = new Postproperty();
        $objPostproperty->ownerid = $request->get('ownerid');
        $objPostproperty->agentid = $request->get('agentid');
        $objPostproperty->builderid = $request->get('builderid');
        $objPostproperty->rentid = $request->get('rentid');
        $objPostproperty->saleid = $request->get('saleid');
        $objPostproperty->contact = $request->get('contact');
        $objPostproperty->email = $request->get('email');
        $objPostproperty->location = $request->get('location');
        $objPostproperty->totalarea = $request->get('totalarea');
        $objPostproperty->expectedprice = $request->get('expectedprice');
        if ($objPostproperty->save()) {
            $arrReturn['status'] = TRUE;
            $arrReturn['id'] = $objPostproperty->id;
        }
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
    public function actionSaveenqiry($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $objCustomers = new \app\models\Customers();
        $objCustomers->name = $request->get('name');
        $objCustomers->phone = $request->get('phone');
        $objCustomers->email = $request->get('email');
        $objCustomers->message = $request->get('message');
        if ($objCustomers->save()) {
            $arrReturn['status'] = TRUE;
            $arrReturn['id'] = $objCustomers->id;
               ////////////////////MAiL fUNCTION////////////////////////////////
            $date = date('Y-m-d');
            if ($objCustomers->email != ' ') {
                $header = 'Unique property';
                $logo = 'http://uniquepaf.tglobalsolutions.com/images/logo.png';
                $comURL = 'http://uniquepaf.tglobalsolutions.com/';
                $Tomail = 'abhishekk@uniquepaf.com';
                $companyemail = 'abhishekk@uniquepaf.com';
                // to customer mail body
                $body = "  
                    <div class='jumbotron'>
                            <p  class= 'headSetFont'>Custoemr enquiry details. $date<br></p>
                            <p  class= 'setPOne fontBold'><b>Csutoemr name: </b> " . $objCustomers->name . ",<br></p>
                            <p  class= 'setPOne fontBold'><b>Email: </b> " . $objCustomers->email . ",<br></p>
                            <p  class= 'setPOne fontBold'><b>Phone: </b> " . $objCustomers->phone . ",<br></p>
                            <p  class= 'setPOne fontBold'><b>Message:</b> " . $objCustomers->message . "<br></p><hr>
                            <p  class= 'setPOne fontBold'><b>Url:</b> " . $comURL . "<br></p>
                            <p  class= 'setPOne fontBold'><b>Thank you.</b> <br></p>
                            <p  class= 'setPOne'>Please feel free to contact us for any queries: <br></p>
                            <p class= 'setPOne'>Email - " . $companyemail . " <br>
                                Contact -  <br>
                            </p>
                    </div>";
                // to organisation
                $arrMailDetails = Array();
                $arrMailDetails['subject'] = 'Custoemr enquiry details ';
                $arrMailDetails['toemail'] = $Tomail;
                $arrMailDetails['from'] = $objCustomers->email;
                $arrMailDetails['body'] = $body;
                $arrMailDetails['logo'] = $logo;
                $objMail = new Mail();
                $objMail->sendEmail($arrMailDetails);
                echo "MAIL SENT SUCCESSFULLY !!";
            } else {
//                $body .= "THERE ARE NO FOLLOWUPS ASSIGNED FOR TODAY.";
            }
            //////////////////////////////////////////
        }
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

    public function actionSearchresresult($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $status = 'Active';

        $location = (null != $request->get('location') ) ? $request->get('location') : '';
        $propertytype = (null != $request->get('propertytype') ) ? $request->get('propertytype') : '';
        $minprice = (null != $request->get('minprice') ) ? $request->get('minprice') : 0;
        $maxprice = (null != $request->get('maxprice') ) ? $request->get('maxprice') : 100000000;
        $propertyCat = $request->get('propetycat');
        $connection = Yii::$app->db;
        if ($propertyCat == 1) {
            $query = "Select u.carpetarea,r.protype,u.salablearea,u.reraid,u.wing,u.yearofconstruct,u.status,u.possesiondate,m.imgtype,r.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
                        where p.id = $propertytype
                        AND  r.price BETWEEN $minprice AND $maxprice
                        || (r.location LIKE '%$location%' ) GROUP BY r.id";
        } elseif ($propertyCat == 2) {

            $query = "Select r.protype,r.id,r.wing,r.flatnumber,r.floornumber,r.landmark,r.address,
                        r.carpetarea,r.age,r.propertyfacing,r.furniture,
                        r.remarks,r.statusid,r.societyname,r.added_date,r.buildingname,r.location,
                                    r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
                        where p.id = $propertytype
                        AND  r.price BETWEEN $minprice AND $maxprice
                        || (r.location LIKE '%$location%') AND  r.statusid != 1 GROUP BY r.id";
        } else {
            $query = "Select c.protype,c.id,c.addeddate,c.cname,c.price,c.dname,c.location,c.landmark,c.address,c.reraid, pt.name as ptype,bt.name as btype
                        from `commercial` c 
                        LEFT join `ctype` pt on c.ctypeid = pt.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id
                        LEFT join `status` s on s.id = c.statusid 
                        LEFT join `imagegallery` m on m.`residentialid` = c.id
                        LEFT join `proupdate` u on u.`residentialid` = c.id
                        where pt.id = $propertytype
                        AND  c.price BETWEEN $minprice AND $maxprice
                        || (c.location LIKE '%$location%') GROUP BY c.id";
        }
        $objDatares = $connection->createCommand($query)->queryAll();


        $arrReturn['status'] = TRUE;
        $arrReturn['data'] = $objDatares;
//        $arrReturn['data1'] = $objDataResale;
//        $arrReturn['data2'] = $objDataCom;
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

    public function actionGetallresale($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select m.imgtype,r.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` rs 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
        where  r.statusid = ' . 2 . ' || r.statusid = ' . 3 . ' || r.statusid = ' . 4 . ' GROUP BY r.id ORDER BY `addeddate` DESC LIMIT 8')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
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

    public function actionGetallresidential($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select m.imgtype,r.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
        where  r.statusid = ' . 2 . ' || r.statusid = ' . 3 . ' || r.statusid = ' . 4 . ' GROUP BY r.id ORDER BY `addeddate` DESC LIMIT 8')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
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

    public function actionSearchproperty($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select m.imgtype,r.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
        where  r.statusid = ' . 2 . ' || r.statusid = ' . 3 . ' || r.statusid = ' . 4 . ' GROUP BY r.id ORDER BY `addeddate` DESC LIMIT 8')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
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

    public function actionGetbannerimage($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select *
                        from `imagegallery` r 
                       where r.type = ' . 4 . ' AND r.statusid = ' . 2 . '   ORDER BY `addeddate` DESC ')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
//            $arrReturn['data'][] = $arrTemp;
//        echo json_encode($arrReturn);
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

    public function actionLinkresidentialimages($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objResidential = \app\models\Residential::find()->where(['id' => $id])->one();
        $file = $objResidential->image;
        header('Content-type: resources/png');
        readfile($file);
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

    public function actionGetresdetailbyid($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select c.address,c.id,c.pland,c.dname,c.location,
            c.price,c.pname ,p.name as ptype,bt.name as btype, lt.name as landtype ,c.landmark
                        from `residential` c 
                       LEFT join `respropertytype` rp on c.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        LEFT join `amenities` a on c.id = a.residentialid 
                        LEFT join `landtype` lt on c.landtypeid = lt.id 
                        where c.id =' . $id . '  GROUP BY c.id ')->queryAll();
        $objAmenitis = $connection->createCommand('Select a.aname
                        from `residential` c 
                        LEFT join `amenities` a on c.id = a.residentialid 
                        where c.id =' . $id . '  ')->queryAll();
        $objKeylocation = $connection->createCommand('Select a.kname,a.distance
                        from `residential` c 
                        LEFT join `keylocation` a on c.id = a.residentialid 
                        where c.id =' . $id . '  ')->queryAll();
        $objConstructionDetails = $connection->createCommand('Select a.yearofconstruct,a.wing,a.status,a.addeddate,a.possesiondate,
            a.carpetarea,a.salablearea,a.reraid
                        from `residential` c 
                        LEFT join `proupdate` a on c.id = a.residentialid 
                        where c.id =' . $id . '  ')->queryAll();
        $objImages = $connection->createCommand('Select a.id,a.imgtype,a.type,a.image
                        from `residential` c 
                        LEFT join `imagegallery` a on c.id = a.residentialid 
                        where c.id =' . $id . ' AND imgtype = "amenities" ')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
            $arrReturn['amenities'] = $objAmenitis;
            $arrReturn['keylocation'] = $objKeylocation;
            $arrReturn['consDetails'] = $objConstructionDetails;
            $arrReturn['img'] = $objImages;
        }
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

    public function actionGetresaledetailbyid($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select r.id,r.propertyfacing,r.furniture,r.ownername,r.added_date,
                                        r.contact,r.location,r.remarks,r.carpetarea,r.floornumber,
                                        r.flatnumber,r.wing,r.buildingname,r.address,
                                        r.societyname,r.age,
                                        r.price,p.name as ptype ,r.location,s.name as stype
                        from `resale` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `status` s on s.id = r.statusid 
                        LEFT join `amenities` a on r.id = a.resaleid
                        where r.id =' . $id . '   GROUP BY r.id ')->queryAll();
        $objAmenitis = $connection->createCommand('Select a.aname
                        from `resale` r 
                        LEFT join `amenities` a on r.id = a.resaleid 
                        where r.id =' . $id . '  ')->queryAll();
        $objKeylocation = $connection->createCommand('Select a.kname,a.distance
                        from `resale` r 
                        LEFT join `keylocation` a on r.id = a.resaleid 
                        where r.id =' . $id . '  ')->queryAll();
        $objImages = $connection->createCommand('Select a.id,a.imgtype,a.type,a.image
                        from `resale` r 
                        LEFT join `imagegallery` a on r.id = a.resaleid 
                        where r.id =' . $id . ' AND imgtype = "amenities" ')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
            $arrReturn['amenities'] = $objAmenitis;
            $arrReturn['keylocation'] = $objKeylocation;
            $arrReturn['img'] = $objImages;
        }
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
    public function actionGetcomdetailbyid($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objData = $connection->createCommand('Select c.cname,c.address,c.id,c.reraid,c.dname,c.location,
            c.price ,p.name as ptype,bt.name as btype
                        from `commercial` c 
                        LEFT join `ctype` p on c.ctypeid = p.id 
                        LEFT join `buytype` bt on c.buytypeid = bt.id 
                        LEFT join `amenities` a on c.id = a.commercialid 
                        where c.id =' . $id . '   GROUP BY c.id ')->queryAll();
        $objAmenitis = $connection->createCommand('Select a.aname
                        from `commercial` c 
                        LEFT join `amenities` a on c.id = a.commercialid 
                        where c.id =' . $id . '  ')->queryAll();
//        $objKeylocation = $connection->createCommand('Select a.kname,a.distance
//                        from `resale` r 
//                        LEFT join `keylocation` a on r.id = a.resaleid 
//                        where r.id =' . $id . '  ')->queryAll();
        $objImages = $connection->createCommand('Select a.id,a.imgtype,a.type,a.image
                        from `commercial` c 
                        LEFT join `imagegallery` a on c.id = a.commercialid 
                        where c.id =' . $id . ' AND imgtype = "amenities" ')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
            $arrReturn['amenities'] = $objAmenitis;
//            $arrReturn['keylocation'] = $objKeylocation;
            $arrReturn['img'] = $objImages;
        }
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

    public function actionLinkresimageamenities($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'amenities'])->one();
        $file = $objImagegallery->image;
        header('Content-type: resources/png');
        readfile($file);
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

    public function actionLinkbannerimages($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'header'])->one();
        $file = $objImagegallery->image;
        header('Content-type: resources/png');
        readfile($file);
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

    public function actionGetmostpopularproject($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select m.imgtype ,m.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
            where   r.statusid = ' . 3 . '  GROUP BY r.id ORDER BY `addeddate` DESC LIMIT 3')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
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

    public function actionGetfeturedprojects($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select m.imgtype ,m.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
            where   r.statusid = ' . 4 . '  GROUP BY r.id ORDER BY `addeddate` DESC LIMIT 5')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
//            foreach ($objData as $key => $value) {
//                $id = $value['id'];
//         $objSelectedptype = $connection->createCommand('Select p.id, pt.propertytypeid, p.name from `propertytype` p 
//                         LEFT JOIN `respropertytype` pt on p.id = pt.propertytypeid
//                         LEFT JOIN `residential` c on c.id = pt.residentialid where c.id =' . $id)->queryAll();
//            }
//        $arrReturn['ptypename'] = $objSelectedptype;
        }
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

    public function actionGealllocationount($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('SELECT id,image,location,  COUNT(*) AS count
        FROM residential
        GROUP BY location LIMIT 6')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
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

    public function actionGetallcitybyprojectlist($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $request = Yii::$app->request;
        $id = $request->get('id');
        $connection = Yii::$app->db;
        $objData1 = $connection->createCommand('Select *
                        from `residential` r 
  where  r.id = ' . $id . ' ')->queryOne();
        $objData = $connection->createCommand('Select u.carpetarea,u.salablearea,u.possesiondate,u.reraid,u.wing,u.yearofconstruct,u.status,m.imgtype ,m.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
     where  r.statusid != ' . 1 . '   AND  (r.location LIKE "%' . $objData1['location'] . '%")   GROUP BY r.id ORDER BY `addeddate` DESC LIMIT 8 ')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
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

    public function actionGetmostvaluableproject($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select m.imgtype ,m.image,r.id,r.statusid,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
            where   r.statusid = ' . 5 . '  GROUP BY r.id ORDER BY `addeddate` DESC LIMIT 1')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
        }
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
