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

    public function actionGetallresidential($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;
        $objData = $connection->createCommand('Select m.imgtype ,m.image,r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                         LEFT join `respropertytype` rp on r.id = rp.residentialid    
                        LEFT join `propertytype` p on rp.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id
                        LEFT join `imagegallery` m on m.`residentialid` = r.id
                        LEFT join `proupdate` u on u.`residentialid` = r.id
  where  r.statusid = ' . 2 . ' || r.statusid = ' . 3 . ' || r.statusid = ' . 4 . ' GROUP BY r.id ORDER BY `addeddate` DESC ')->queryAll();
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
    public function actionGetheaderimages($callback = null) {
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

    public function actionLinkpropertyotherimg($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objImagegallery = \app\models\Imagegallery::find()->where(['id' => $id])->andWhere(['imgtype' => 'other'] || ['imgtype' => 'amenities'] || ['imgtype' => 'florplan'])->one();
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
                        where c.id =' . $id . ' GROUP BY c.id ')->queryAll();
        $objAmenitis = $connection->createCommand('Select a.aname
                        from `residential` c 
                        LEFT join `amenities` a on c.id = a.residentialid 
                        where c.id =' . $id . '  ')->queryAll();
        $objKeylocation = $connection->createCommand('Select a.kname,a.distance
                        from `residential` c 
                        LEFT join `keylocation` a on c.id = a.residentialid 
                        where c.id =' . $id . '  ')->queryAll();
        if ($objData) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objData;
            $arrReturn['amenities'] = $objAmenitis;
            $arrReturn['keylocation'] = $objKeylocation;
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

    public function actionGetmostpopularproject($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $this->layout = "";
        $connection = Yii::$app->db;

        $objData = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                       where r.statusid = ' . 3 . '  ORDER BY `addeddate` DESC LIMIT 3')->queryAll();
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
        $objData = $connection->createCommand('Select r.id,r.pname,r.addeddate,r.pland,r.location,r.price,p.name as ptype,bt.name as btype
                        from `residential` r 
                        LEFT join `propertytype` p on r.propertytypeid = p.id 
                        LEFT join `buytype` bt on r.buytypeid = bt.id 
                       where r.statusid = ' . 4 . '  ORDER BY `addeddate` DESC ')->queryAll();
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

}

// end of DashboardController.php
