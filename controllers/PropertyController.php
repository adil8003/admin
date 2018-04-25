<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Response;
use app\models\Resproject;
use app\models\Resproperty;
use app\models\Comproject;
use app\models\Comproperty;
use app\models\Resprojectproperty;
use app\models\Resprojectproject;
use app\models\Resprojectimage;
use app\models\Resprojectamaneties;
use app\models\Resprojectgeolocation;
use app\models\Resprojectcost;
use app\models\Respropertyamaneties;
use app\models\Respropertygeolocation;
use app\models\Respropertyimage;
use app\models\Respropertycost;
use app\models\Respropertytype;
use app\models\Respropertyproject;
use app\models\Comprojectamaneties;
use app\models\Comprojectgeolocation;
use app\models\Comprojectproject;
use app\models\Comprojectoffice;
use app\models\Comprojectimage;
use app\models\Builder;
use app\models\Customer;
use app\models\Resprojctfeedback;
use app\models\Respropertyfeedback;
use app\models\Comprojectfeedback;
use app\models\User;
use app\models\Status;
use app\models\Ownershiptype;
use app\models\Respropertyabout;
use app\models\Respropertyflattype;
use app\models\Respropertyparking;
use app\models\Respropertyfurnishedstatus;
use app\models\Commercialprojtype;
use app\models\Comprojectpreferred;
use app\models\Comprojectfurnishing;
use app\models\Generalfeedback;
use app\models\Resprojectmicrositedetails;
use app\models\Comprojectmicrositedetails;
use app\models\Comprojectdetails;
use app\models\Followup;
use app\models\Resaleproperty;
use app\models\Resalemicrositedetails;
use app\models\Resalepropertyimage;
use app\models\Comprojectcost;
use app\models\Resalefeedback;
use app\models\Resalemoredata;
use app\models\Mail;
use app\models\Resmoredata;
use app\models\Comextradetails;
use app\models\Plots;
use app\models\Plotsimage;
use app\models\Plotgeolocation;

class PropertyController extends Controller {

    public $enableCsrfValidation = false;
    public $user_id = '';

    public function init() {
        if (Yii::$app->session['isLoggedIn'] != true) {
            return $this->redirect('index.php?r=site/login');
        }
        $this->layout = "dashboard";
        $this->user_id = Yii::$app->session['userid'];
    }

    public function actionIndex() {
        $model = new User();
        $objUser = $model->findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        return $this->render('index', [
                    'objUser' => $objUser
        ]);
    }

    public function actionSearchcustomer() {
          $connection = Yii::$app->db;
         $objCustomerActive = $connection->createCommand('Select r.id ,r.name,r.phone,r.email,r.sublocation, '
                 . 'r.city ,r.location,r.status,r.pincode,r.addedby,r.addeddate,r.description, '
                 . 'r.picpath,r.followupid,r.contacted_by,r.message_date,a.projecttype,a.customerid, '
                 . 'a.propertyid,a.projecttype,a.rentpurchase,a.newresale,a.firstremark,a.followupdate,'
                 . 'a.createddate,a.firstdiscussionby,a.attendedby,a.comtypeofproperty,a.restypeofproperty,'
                 . 'a.expectedprice,a.industypeofproperty,'
                 . 'a.attendedremark from `customer` r '
                 . 'LEFT join `followup` a on a.customerid = r.id  ' )->queryAll();
        return $this->render('searchcustomer', [
            'objCustomerActive' => $objCustomerActive,
        ]);
    }

    public function actionGetmicrositedetails($callback = null) {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $status = 'Active';
        $resprojectid = $request->get('id');
        $arrTemp = array();
        $arrTemp['property'] = Resproject::find()->where(['id' => $resprojectid])->one();
        $arrTemp['microsite'] = Resprojectmicrositedetails::find()->where(['id' => $arrTemp['property']['resprojectmicrositedetailsid']])->one();
        $arrTemp['project'] = Resprojectproject::find()->where(['id' => $arrTemp['property']->resprojectprojectid])->one();
        $arrTemp['builder'] = Builder::find()->where(['id' => $arrTemp['property']->builderid])->one();
        $arrTemp['amaneties'] = Resprojectamaneties::find()->where(['id' => $arrTemp['property']->resprojectprojectid])->one();
        $arrTemp['cost'] = Resprojectcost::find()->where(['id' => $arrTemp['property']->resprojectprojectid])->one();
        $arrTemp['resproperty'] = Resprojectproperty::find()->where(['id' => $arrTemp['property']->resprojectpropertyid])->one();
        $arrTemp['location'] = Resprojectcost::find()->where(['id' => $arrTemp['property']->resprojectgeolocationid])->one();


        $arrTemp['resprojectimage'] = Resprojectimage::find()->where(['resprojectid' => $resprojectid])->all();
        if (!$arrTemp['resprojectimage']) {
            $arrTemp1 = array();
            $arrTemp1['path'] = '/resources/resproject/no-thumb.jpg';
            $arrTemp['resprojectimage'][] = $arrTemp1;
        }

        if ($arrTemp) {
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $arrTemp;
        }

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

    public function actionGetpropertynames() {
        $arrReturn = array();
        $arrCustomerappusercamera = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        if ($request->isPost) {
            $propertytype = $request->post('projecttype');
            $projectData = [];
            if ($propertytype == "Commercial") {
                $projectData = Comproject::find()->where(['status' => 'Active'])->all();
            } elseif ($propertytype == "Residential") {
                $projectData = Resproject::find()->where(['status' => 'Active'])->all();
            } elseif ($propertytype = "Resale") {
                $projectData = Resaleproperty::find()->where(['status' => 'Active'])->all();
            }

            foreach ($projectData AS $objrow) {
                $arrTemp = array();
                $arrTemp['id'] = $objrow->id;
                if ($propertytype == "Resale") {
                    $arrTemp['name'] = $objrow->ownername;
                } else {
                    $arrTemp['name'] = $objrow->name;
                }
                $arrCustomerappusercamera[] = $arrTemp;
            }
            $arrReturn['data'] = $arrCustomerappusercamera;

            $arrReturn['status'] = TRUE;
        }
        echo json_encode($arrReturn);
    }

    public function actionSearch() {
        $objUser = User::findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        $objResproject = Resproject::find()->orderBy([ 'added_date' => SORT_DESC])->all();
        $objResprojectActive = Resproject::find()->where(['status' => "Active"])->orderBy([ 'added_date' => SORT_DESC])->all();
        $objResproperty = Resproperty::find()->orderBy([ 'added_date' => SORT_DESC])->all();
        $objComproject = Comproject::find()->orderBy([ 'added_date' => SORT_DESC])->all();
        $objComproperty = Comproperty::find()->orderBy([ 'added_date' => SORT_DESC])->all();
        $objBuilder = Builder::find()->orderBy([ 'addeddate' => SORT_DESC])->all();
        $objCustomer = Customer::find()->orderBy([ 'addeddate' => SORT_DESC])->all();
        $objGenfeedback = Generalfeedback::find()->orderBy([ 'added_date' => SORT_DESC])->all();
        $connection = Yii::$app->db;
        $objFollowup = $connection->createCommand('SELECT f.* ,c.name AS customername,c.phone AS customerphone FROM followup f, customer c WHERE f.customerid=c.id')->queryAll();
        $objPendingFollowup = $connection->createCommand('SELECT distinct c.* FROM customer c, followup f WHERE f.followupdate = ""')->queryAll();
        $objResaleproperty = Resaleproperty::find()->orderBy([ 'added_date' => SORT_DESC])->all();
        $objResalepropertyActive = Resaleproperty::find()->where(['status' => "Active"])->all();
        $objPlotsActive= Plots::find()->where(['status' => "Active"])->orderBy(['addeddate' =>SORT_DESC ])->all();
//        $objUniquelocation = $connection->createCommand('SELECT DISTINCT(location) AS location FROM resproject ')->queryAll();
        return $this->render('search', [
                    'objUser' => $objUser,
                    'objResproject' => $objResproject,
                    'objResproperty' => $objResproperty,
                    'objComproject' => $objComproject,
                    'objComproperty' => $objComproperty,
                    'objBuilder' => $objBuilder,
                    'objCustomer' => $objCustomer,
                    'objGenfeedback' => $objGenfeedback,
                    'objFollowup' => $objFollowup,
                    'objResaleproperty' => $objResaleproperty,
                    'objResprojectActive' => $objResprojectActive,
                    'objPendingFollowup' => $objPendingFollowup,
                    'objResalepropertyActive' => $objResalepropertyActive,
                    'objPlotsActive' => $objPlotsActive,
//                    'objUniquelocation' => $objUniquelocation,
        ]);
    }

    public function actionAdd() {
        $objUser = User::findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        $objUsers = User::find()->all();
        $objCustomers = Customer::find()->all();
        return $this->render('add', [
                    'objUser' => $objUser,
                    'objUsers' => $objUsers,
                    'objCustomers' => $objCustomers,
        ]);
    }

    public function actionBuilder() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objBuilder = Builder::findOne($id);
        return $this->render('builder', [
                    'objBuilder' => $objBuilder
        ]);
    }

    public function actionCustomer() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objCustomer = Customer::findOne($id);
        return $this->render('customer', [
                    'objCustomer' => $objCustomer
        ]);
    }

    public function actionResaleproperty() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objResaleproperty = Resaleproperty::findOne($id);
        $objResalepropertyimage = Resalepropertyimage::find()->where(['resalepropertyid' => $id])->all();
        $objResalefeedback = Resalefeedback::find()->where(['resalepropertyid' => $id])->all();
        return $this->render('resaleproperty', [
                    'objResaleproperty' => $objResaleproperty,
                    'objResalepropertyimage' => $objResalepropertyimage,
                    'objResalefeedback' => $objResalefeedback,
        ]);
    }
    public function actionPlot() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objPlots = Plots::findOne($id);
         $objPlotsimage = Plotsimage::find()->where(['plotsid' => $id])->all();
        return $this->render('plot', [
                    'objPlotsimage' => $objPlotsimage,
                    'objPlots' => $objPlots
        ]);
    }

    public function actionFollowup() {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objCustomer = Customer::findOne($id);
        $model = new User();
        $objUsers = $model->find()->all();

        $objFollowup = Followup::findOne(['customerid' => $id]);
        if (!$objFollowup) {
            $objFollowup = new Followup();
            $objFollowup->id = $id;
        }
        $perticularProperty = [];
        if ($objFollowup) {
            if (($objFollowup->propertyid !== NULL) && ($objFollowup->projecttype !== NULL)) {

                if ($objFollowup->projecttype == "Resale-Rent") {
                    $perticularProperty = Resaleproperty::findOne($objFollowup->propertyid);
                } elseif ($objFollowup->projecttype == "Residential") {
                    $perticularProperty = Resproject::findOne($objFollowup->propertyid);
                } elseif ($objFollowup->projecttype = "Commercial") {
                    $perticularProperty = Comproject::findOne($objFollowup->propertyid);
                }
            }
        }
        return $this->render('followup', [
                    'objFollowup' => $objFollowup,
                    'objCustomer' => $objCustomer,
                    'perticularProperty' => $perticularProperty,
                    'objUsers' => $objUsers
        ]);
    }

    public function actionResproject() {
        $objUser = User::findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objResproject = Resproject::findOne($id);
        $objBuilder = Builder::find()->all();
        $objOwnershiptype = Ownershiptype::find()->all();
        $objResprojectimage = Resprojectimage::find()->where(['resprojectid' => $id])->all();
        $objResprojctfeedback = Resprojctfeedback::find()->where(['resprojectid' => $id])->all();
        $objCustomer = Customer :: findOne($id);

        return $this->render('resproject', [
                    'objUser' => $objUser,
                    'objResproject' => $objResproject,
                    'objBuilder' => $objBuilder,
                    'objOwnershiptype' => $objOwnershiptype,
                    'objResprojectimage' => $objResprojectimage,
                    'objResprojctfeedback' => $objResprojctfeedback,
                    'objUser' => $objUser,
                    'objCustomer' => $objCustomer,
        ]);
    }

    public function actionResproperty() {
        $model = new User();
        $objUser = $model->findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objResproperty = Resproperty::findOne($id);
        $objBuilder = Builder::find()->all();
        $objOwnershiptype = Ownershiptype::find()->all();
        $objRespropertyabout = Respropertyabout::find()->all();
        $objRespropertyflattype = Respropertyflattype::find()->all();

        $objRespropertyparking = Respropertyparking::find()->all();
        $objRespropertyfurnishedstatus = Respropertyfurnishedstatus::find()->all();
        $objRespropertyimage = Respropertyimage::find()->where(['respropertyid' => $id])->all();
        $objRespropertyfeedback = Respropertyfeedback::find()->where(['respropertyid' => $id])->all();
        return $this->render('resproperty', [
                    'objUser' => $objUser,
                    'objResproperty' => $objResproperty,
                    'objOwnershiptype' => $objOwnershiptype,
                    'objRespropertyabout' => $objRespropertyabout,
                    'objRespropertyflattype' => $objRespropertyflattype,
                    'objRespropertyparking' => $objRespropertyparking,
                    'objRespropertyfurnishedstatus' => $objRespropertyfurnishedstatus,
                    'objBuilder' => $objBuilder,
                    'objRespropertyimage' => $objRespropertyimage,
                    'objRespropertyfeedback' => $objRespropertyfeedback,
        ]);
    }

    public function actionComproject() {
        $model = new User();
        $objUser = $model->findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        $request = Yii::$app->request;
        $id = $request->get('id');
        $objComproject = Comproject::findOne($id);
        $objBuilder = Builder::find()->all();
        $objCommercialprojtype = Commercialprojtype::find()->all();
        $objComprojectpreferred = Comprojectpreferred::find()->all();
        $objComprojectfurnishing = Comprojectfurnishing::find()->all();
        $objComprojectimage = Comprojectimage::find()->where(['comprojectid' => $id])->all();
        $objComprojectfeedback = Comprojectfeedback::find()->where(['comprojectid' => $id])->all();
//        $objComextradetails = Comextradetails::find()->where(['comprojectid' => $id])->all();
        return $this->render('comproject', [
                    'objUser' => $objUser,
                    'objComproject' => $objComproject,
                    'objBuilder' => $objBuilder,
                    'objCommercialprojtype' => $objCommercialprojtype,
                    'objComprojectpreferred' => $objComprojectpreferred,
                    'objComprojectfurnishing' => $objComprojectfurnishing,
                    'objComprojectimage' => $objComprojectimage,
                    'objComprojectfeedback' => $objComprojectfeedback,
//                    'objComextradetails' => $objComextradetails,
        ]);
    }

    public function actionComproperty() {
        $model = new User();
        $objUser = $model->findOne(['username' => Yii::$app->session['username'], 'status_id' => Status::ACTIVE]);
        return $this->render('comproperty', [
                    'objUser' => $objUser
        ]);
    }

    public function actionUpdatebuilder() {

        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {

            $id = $request->post('builder_id');
            if ($id != 0) {
                $objBuilder = Builder::findOne(['id' => $id]);
                if (!$objBuilder) {
                    $objBuilder = new Builder();
                    $objBuilder->id = $id;
                }

                $objBuilder->name = $request->post('name');
                $objBuilder->companyname = $request->post('companyname');
                $objBuilder->contact = $request->post('contact');
                $objBuilder->email = $request->post('email');
                $objBuilder->website = $request->post('website');
                $objBuilder->addedby = Yii::$app->session['userid'];
                $objBuilder->status = $request->post('status');
                $objBuilder->officecontact = $request->post('officecontact');
                $objBuilder->description = $request->post('description');
                if ($objBuilder->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $id;
                }
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUpdatecustomer() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('customer_id');
            if ($id != 0) {
                $objCustomer = Customer::findOne(['id' => $id]);
                if (!$objCustomer) {
                    $objCustomer = new Customer();
                    $objCustomer->id = $id;
                }


                $objCustomer->name = $request->post('name');
                $objCustomer->phone = $request->post('phone');
                $objCustomer->email = $request->post('email');
                $objCustomer->location = $request->post('location');
                $objCustomer->city = $request->post('city');
                $objCustomer->pincode = $request->post('pincode');
                $objCustomer->status = $request->post('status');
                // $objCustomer->addedby = Yii::$app->session['userid'];
                $objCustomer->description = $request->post('description');


                if ($objCustomer->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $id;
                }
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUpdatefollowup() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('followup_id');
            if ($id != 0) {
                $objFollowup = Followup::findOne(['id' => $id]);
                if (!$objFollowup) {
                    $objFollowup = new Followup();
                    $objFollowup->id = $id;
                }
                $objFollowup->propertyid = $request->post('propertyid');
                $objFollowup->rentpurchase = $request->post('rentpurchase');
                $objFollowup->projecttype = $request->post('projecttype');
                $objFollowup->newresale = $request->post('newresale');
                $objFollowup->expectedprice = $request->post('expectedprice');
                $objFollowup->industypeofproperty = $request->post('industypeofproperty');
                $objFollowup->comtypeofproperty = $request->post('comtypeofproperty');
                $objFollowup->restypeofproperty = $request->post('restypeofproperty');
                $objFollowup->firstdiscussionby = $request->post('firstdiscussionby');
                $objFollowup->firstremark = $request->post('firstremark');
                $objFollowup->attendedby = $request->post('attendedby');
                $objFollowup->attendedremark = $request->post('attendedremark');
                $objFollowup->followupdate = $request->post('followupdate');
                $objFollowup->status = $request->post('status');
                if ($objFollowup->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $id;
                }
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionAddfollowup() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objFollowup = new Followup();
            $objFollowup->customerid = $request->post('customerid');
            $objFollowup->firstdiscussionby = $request->post('firstdiscussionby');
            $objFollowup->firstremark = $request->post('firstremark');
            $objFollowup->projecttype = $request->post('projecttype');
            $objFollowup->followupdate = $request->post('followupdate');
            $objFollowup->status = $request->post('status');


            if ($objFollowup->save()) {
                $arrReturn['status'] = TRUE;
                // $arrReturn['id'] = $id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomprojectowner() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $builderid = $request->post('builderid');
            $comprojectid = $request->post('comprojectid');
            if ($comprojectid != 0) {
                $objComproject = Comproject::find()->where(['id' => $comprojectid])->one();
            }
            $objComproject->builderid = $builderid;
            if ($objComproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComproject->builder->id;
                $arrReturn['companyname'] = $objComproject->builder->companyname;
                $arrReturn['email'] = $objComproject->builder->email;
                $arrReturn['contact'] = $objComproject->builder->contact;
                $arrReturn['website'] = $objComproject->builder->website;
                $arrReturn['officecontact'] = $objComproject->builder->officecontact;
                $arrReturn['description'] = $objComproject->builder->description;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomprojectproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            $objComproject->name = $request->post('name');
            $objComproject->sublocation = $request->post('sublocation');
            $objComproject->location = $request->post('location');
            $objComproject->city = $request->post('city');
            $objComproject->state = $request->post('state');
            $objComproject->pincode = $request->post('pincode');
            $objComproject->latlong = $request->post('latlong');
            $objComproject->status = $request->post('status');
            $objComproject->videolink = $request->post('videolink');
            $objComproject->agentname = $request->post('agentname');
            $objComproject->contactperson = $request->post('contactperson');
            $objComproject->contactno = $request->post('contactno');
            $objComproject->ewnsc = $request->post('ewnsc');
            $objComproject->landmark = $request->post('landmark');
               
            if ($objComproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $comprojectid;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveresprojectowner() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $builderid = $request->post('builderid');
            $resprojectid = $request->post('resprojectid');
            if ($resprojectid != 0) {
                $objResproject = Resproject::find()->where(['id' => $resprojectid])->one();
            }
            $objResproject->builderid = $builderid;
            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->builder->id;
                $arrReturn['companyname'] = $objResproject->builder->companyname;
                $arrReturn['email'] = $objResproject->builder->email;
                $arrReturn['contact'] = $objResproject->builder->contact;
                $arrReturn['website'] = $objResproject->builder->website;
                $arrReturn['officecontact'] = $objResproject->builder->officecontact;
                $arrReturn['description'] = $objResproject->builder->description;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomprojetoffice() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            if ($objComproject->comprojectofficeid != NULL) {
                $objComprojectoffice = Comprojectoffice::findOne(['id' => $objComproject->comprojectofficeid]);
            }
            $objComprojectoffice->yearofconstruct = $request->post('yearofconstruct');
            $objComprojectoffice->yearofposition = $request->post('yearofposition');
            $objComprojectoffice->age = $request->post('age');
            $objComprojectoffice->furnishingid = $request->post('furnishingid');
            $objComprojectoffice->preferredid = $request->post('preferredid');
            $objComprojectoffice->totalfloor = $request->post('totalfloor');
            $objComprojectoffice->floorno = $request->post('floorno');
            $objComprojectoffice->commercialprojtypeid = $request->post('commercialprojtypeid');
            $objComprojectoffice->officetotalsqfeet = $request->post('officetotalsqfeet');
            $objComprojectoffice->costpersqfeet = $request->post('costpersqfeet');
            $objComprojectoffice->othercharges = $request->post('othercharges');

            if ($objComprojectoffice->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComprojectoffice->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomgeolocation() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            if ($objComproject->comprojectgeolocationid != NULL) {
                $objComprojectgeolocation = Comprojectgeolocation::findOne(['id' => $objComproject->comprojectgeolocationid]);
            }
            $objComprojectgeolocation->railwaystation = $request->post('railwaystation');
            $objComprojectgeolocation->airport = $request->post('airport');
            $objComprojectgeolocation->hospital = $request->post('hospital');
            $objComprojectgeolocation->multiplex = $request->post('multiplex');
            $objComprojectgeolocation->school = $request->post('school');
            $objComprojectgeolocation->college = $request->post('college');
            $objComprojectgeolocation->market = $request->post('market');
            $objComprojectgeolocation->temple = $request->post('temple');
            $objComprojectgeolocation->famousplace = $request->post('famousplace');
            if ($objComprojectgeolocation->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComprojectgeolocation->id;
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSaveplotgeolocation() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $plotsid = $request->post('plotsid');
            $objPlots = Plots::findOne(['id' => $plotsid]);
            if ($objPlots->plotgeolocationid != NULL) {
                $objPlotgeolocation =  Plotgeolocation::findOne(['id' => $objPlots->plotgeolocationid]);
            }
            $objPlotgeolocation->railwaystation = 'kkk';
            $objPlotgeolocation->airport = $request->post('airport');
            $objPlotgeolocation->hospital = $request->post('hospital');
            $objPlotgeolocation->multiplex = $request->post('multiplex');
            $objPlotgeolocation->school = $request->post('school');
            $objPlotgeolocation->college = $request->post('college');
            $objPlotgeolocation->market = $request->post('market');
            $objPlotgeolocation->temple = $request->post('temple');
            $objPlotgeolocation->famousplace = $request->post('famousplace');
            if ($objPlotgeolocation->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objPlotgeolocation->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomamaneties() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            if ($objComproject->comprojectamanetiesid != NULL) {
                $objComprojectamaneties = Comprojectamaneties::findOne(['id' => $objComproject->comprojectamanetiesid]);
            }
            $objComprojectamaneties->lift = $request->post('lift');
            $objComprojectamaneties->parking = $request->post('parking');
            $objComprojectamaneties->restroom = $request->post('restroom');
            $objComprojectamaneties->furnishing = $request->post('furnishing');
            $objComprojectamaneties->preferred = $request->post('preferred');
            if ($objComprojectamaneties->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComprojectamaneties->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomcost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            if ($objComproject->comprojectcostid != NULL) {
                $objComprojectcost = Comprojectcost::findOne(['id' => $objComproject->comprojectcostid]);
            }
            $objComprojectcost->persquarefeet = $request->post('persquarefeet');
            $objComprojectcost->othercharges = $request->post('othercharges');
            $objComprojectcost->totalcharges = $request->post('totalcharges');
            if ($objComprojectcost->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComprojectcost->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomprojectproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            if ($objComproject->comprojectprojectid != NULL) {
                $objComprojectproject = Comprojectproject::findOne(['id' => $objComproject->comprojectprojectid]);
            } else {
                $objComprojectproject = new Comprojectproject();
            }
            $objComprojectproject->yearofconstruct = $request->post('yearofconstruct');
            $objComprojectproject->yearofposition = $request->post('yearofposition');
            $objComprojectproject->age = $request->post('age');
            $objComprojectproject->totalfloor = $request->post('totalfloor');
            $objComprojectproject->floorno = $request->post('floorno');
            $objComprojectproject->commercialprojtypeid = $request->post('commercialprojtypeid');
            $objComprojectproject->totalsqfeet = $request->post('totalsqfeet');
            $objComprojectproject->costpersqfeet = $request->post('costpersqfeet');
            $objComprojectproject->othercharges = $request->post('othercharges');
            $objComprojectproject->comments = $request->post('comments');

            if ($objComprojectproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComprojectproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavepropertygeolocation() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $respropertyid = $request->post('respropertyid');
            $objResproperty = Resproperty::findOne(['id' => $respropertyid]);
            if ($objResproperty->respropertygeolocationid != NULL) {
                $objRespropertygeolocation = Respropertygeolocation::findOne(['id' => $objResproperty->respropertygeolocationid]);
            }
            $objRespropertygeolocation->railwaystation = $request->post('railwaystation');
            $objRespropertygeolocation->airport = $request->post('airport');
            $objRespropertygeolocation->hospital = $request->post('hospital');
            $objRespropertygeolocation->multiplex = $request->post('multiplex');
            $objRespropertygeolocation->school = $request->post('school');
            $objRespropertygeolocation->college = $request->post('college');
            $objRespropertygeolocation->market = $request->post('market');
            $objRespropertygeolocation->temple = $request->post('temple');
            $objRespropertygeolocation->famousplace = $request->post('famousplace');

            if ($objRespropertygeolocation->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objRespropertygeolocation->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaverespropertyresamaneties() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $respropertyid = $request->post('respropertyid');
            $objResproperty = Resproperty::findOne(['id' => $respropertyid]);
            if ($objResproperty->respropertyamanetiesid != NULL) {
                $objRespropertyamaneties = Respropertyamaneties::findOne(['id' => $objResproperty->respropertyamanetiesid]);
            }
            $objRespropertyamaneties->swimingpool = $request->post('swimingpool');
            $objRespropertyamaneties->garden = $request->post('garden');
            $objRespropertyamaneties->gym = $request->post('gym');
            $objRespropertyamaneties->temple = $request->post('temple');
            $objRespropertyamaneties->clubhouse = $request->post('clubhouse');
            $objRespropertyamaneties->solarsystem = $request->post('solarsystem');
            $objRespropertyamaneties->securitydoor = $request->post('securitydoor');

            if ($objRespropertyamaneties->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objRespropertyamaneties->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaverespropertyowner() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $builderid = $request->post('builderid');
            $respropertytid = $request->post('respropertyid');
            if ($respropertytid != 0) {
                $objResproperty = Resproperty::find()->where(['id' => $respropertytid])->one();
            }
            $objResproperty->builderid = $builderid;
            if ($objResproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproperty->builder->id;
                $arrReturn['companyname'] = $objResproperty->builder->companyname;
                $arrReturn['email'] = $objResproperty->builder->email;
                $arrReturn['contact'] = $objResproperty->builder->contact;
                $arrReturn['website'] = $objResproperty->builder->website;
                $arrReturn['officecontact'] = $objResproperty->builder->officecontact;
                $arrReturn['description'] = $objResproperty->builder->description;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaverespropertytype() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $respropertyid = $request->post('respropertyid');
            $objResproperty = Resproperty::findOne(['id' => $respropertyid]);
            if ($objResproperty->respropertytypeid != NULL) {
                $objRespropertytype = Respropertytype::findOne(['id' => $objResproperty->respropertytypeid]);
            }
//        echo    
            $objRespropertytype->aboutpropertyid = $request->post('aboutpropertyid');
            $objRespropertytype->flattypeid = $request->post('flattypeid');
            $objRespropertytype->noofbedroom = $request->post('noofbedroom');
            $objRespropertytype->noofbathroom = $request->post('noofbathroom');
            $objRespropertytype->noofbalcony = $request->post('noofbalcony');
            $objRespropertytype->dinningspace = $request->post('dinningspace');
            $objRespropertytype->parkingtype = $request->post('parkingtype');
            $objRespropertytype->furnishtype = $request->post('furnishtype');
            $objRespropertytype->flooring = $request->post('flooring');
            $objRespropertytype->sanctionauthority = $request->post('sanctionauthority');

            if ($objRespropertytype->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objRespropertytype->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->yearofconst = $request->post('yearofconst');
            $objResproject->commercialshop = $request->post('commercialshop');
            $objResproject->ownershiptype = $request->post('ownershiptype');
            $objResproject->towers = $request->post('towers');
            $objResproject->rowhouse = $request->post('rowhouse');
            $objResproject->villa = $request->post('villa');
            $objResproject->commercialshop = $request->post('commercialshop');
            $objResproject->comment = $request->post('comment');
            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresaleproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        $expectedprice = $request->post('expectedprice');
        if ($request->isPost) {
            $id = $request->post('resalepropertyid');
            if ($id != 0) {
                $objResaleproperty = Resaleproperty::findOne(['id' => $id]);
                if (!$objResaleproperty) {
                    $objResaleproperty = new Resaleproperty();
                    $objResaleproperty->id = $id;
                }
                $objResaleproperty->ownername = $request->post('ownername');
                $objResaleproperty->contact = $request->post('contact');
                $objResaleproperty->sublocation = $request->post('sublocation');
                $objResaleproperty->location = $request->post('location');
                $objResaleproperty->expectedprice = $request->post('expectedprice');
                $objResaleproperty->propertytype = $request->post('propertytype');
                $objResaleproperty->otheramenities = $request->post('otheramenities');
                $objResaleproperty->age = $request->post('age');
                $objResaleproperty->resellrent = $request->post('resellrent');
                $objResaleproperty->status = $request->post('status');
                $objResaleproperty->videolink = $request->post('videolink');
                $objResaleproperty->projecttype = $request->post('projecttype');
                if ($objResaleproperty->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objResaleproperty->id;
                }
            }
            echo json_encode($arrReturn);
        }
    }

    public function actionSaveupdateotherdetails() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('resalepropertyid');
            if ($id != 0) {
                $objResaleproperty = Resaleproperty::findOne(['id' => $id]);
                if (!$objResaleproperty) {
                    $objResaleproperty = new Resaleproperty();
                    $objResaleproperty->id = $id;
                }
                $objResaleproperty->societyname = $request->post('societyname');
                $objResaleproperty->buildingname = $request->post('buildingname');
                $objResaleproperty->wing = $request->post('wing');
                $objResaleproperty->floornumber = $request->post('floornumber');
                $objResaleproperty->flatnumber = $request->post('flatnumber');
                $objResaleproperty->detailaddress = $request->post('detailaddress');
                $objResaleproperty->landmark = $request->post('landmark');
                $objResaleproperty->reserveparking = $request->post('reserveparking');
                $objResaleproperty->lift = $request->post('lift');
                $objResaleproperty->propertyfacing = $request->post('propertyfacing');
                $objResaleproperty->furniture = $request->post('furniture');
                $objResaleproperty->propertyarea = $request->post('propertyarea');
                $objResaleproperty->remarks = $request->post('remarks');
                $objResaleproperty->propertysource = $request->post('propertysource');
                $objResaleproperty->date = $request->post('date');

                if ($objResaleproperty->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objResaleproperty->id;
                }
            }
            echo json_encode($arrReturn);
        }
    }

    public function actionSaverespropertycost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $respropertyid = $request->post('respropertyid');
            $objResproperty = Resproperty::findOne(['id' => $respropertyid]);
            if ($objResproperty->respropertycostid != NULL) {
                $objRespropertycost = Respropertycost::findOne(['id' => $objResproperty->respropertycostid]);
            } else {
                $objRespropertycost = new Respropertycost();
            }
            $objRespropertycost->sale = $request->post('sale');
            $objRespropertycost->newproperty = $request->post('newproperty');
            $objRespropertycost->resaleproperty = $request->post('resaleproperty');
            $objRespropertycost->rent = $request->post('rent');
            $objRespropertycost->typeofproperties = $request->post('typeofproperties');

            if ($objRespropertycost->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objRespropertycost->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaverespropertyproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $respropertyid = $request->post('respropertyid');
            $objResproperty = Resproperty::findOne(['id' => $respropertyid]);

            $objResproperty->name = $request->post('name');
            $objResproperty->sublocation = $request->post('sublocation');
            $objResproperty->location = $request->post('location');
            $objResproperty->city = $request->post('city');
            $objResproperty->state = $request->post('state');
            $objResproperty->pincode = $request->post('pincode');
            $objResproperty->latlong = $request->post('latlong');
            $objResproperty->status = $request->post('status');
            if ($objResproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $respropertyid;
            }
        }

        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresprojectproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);

            $objResproject->name = $request->post('name');
            $objResproject->sublocation = $request->post('sublocation');
            $objResproject->location = $request->post('location');
            $objResproject->city = $request->post('city');
            $objResproject->state = $request->post('state');
            $objResproject->pincode = $request->post('pincode');
            $objResproject->latlong = $request->post('latlong');
            $objResproject->status = $request->post('status');
            $objResproject->videolink = $request->post('videolink');
            $objResproject->expectedprice = $request->post('expectedprice');
            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $resprojectid;
            }
        }

        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);
            if ($objResproject->resprojectprojectid != NULL) {
                $objResprojectproject = Resprojectproject::findOne(['id' => $objResproject->resprojectprojectid]);
            }
            $objResprojectproject->yearofconstruct = $request->post('yearofconstruct');
            $objResprojectproject->yearofpossion = $request->post('yearofpossion');
            $objResprojectproject->ownershiptypeid = $request->post('ownershiptypeid');
            ;
            $objResprojectproject->nooftower = $request->post('nooftower');
            $objResprojectproject->nooffloor = $request->post('nooffloor');
            $objResprojectproject->noofflatperfloor = $request->post('noofflatperfloor');
            $objResprojectproject->noofrowhouse = $request->post('noofrowhouse');
            $objResprojectproject->villa = $request->post('villa');
            $objResprojectproject->commercialshop = $request->post('commercialshop');
            $objResprojectproject->comment = $request->post('comment');
            if ($objResprojectproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResprojectproject->id;
            }
        }

        echo json_encode($arrReturn);
    }

    public function actionSaverespropertyproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $respropertyid = $request->post('respropertyid');
            $objResproperty = Resproperty::findOne(['id' => $respropertyid]);
            if ($objResproperty->respropertyprojectid != NULL) {
                $objRespropertyproject = Respropertyproject::findOne(['id' => $objResproperty->respropertyprojectid]);
            }
            $objRespropertyproject->yearofconstruct = $request->post('yearofconstruct');
            $objRespropertyproject->yearofpossion = $request->post('yearofpossion');
            $objRespropertyproject->ownershiptypeid = $request->post('ownershiptypeid');
            $objRespropertyproject->nooftower = $request->post('nooftower');
            $objRespropertyproject->nooffloor = $request->post('nooffloor');
            $objRespropertyproject->noofflatperfloor = $request->post('noofflatperfloor');
            $objRespropertyproject->noofrowhouse = $request->post('noofrowhouse');
            $objRespropertyproject->villa = $request->post('villa');
            $objRespropertyproject->commercialshop = $request->post('commercialshop');
            $objRespropertyproject->comment = $request->post('comment');
            if ($objRespropertyproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objRespropertyproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveresprojectcost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);
            if ($objResproject->resprojectcostid != NULL) {
                $objResprojectcost = Resprojectcost::findOne(['id' => $objResproject->resprojectcostid]);
            }
            $objResprojectcost->persquarefeet = $request->post('persquarefeet');
            $objResprojectcost->othercharges = $request->post('othercharges');
            $objResprojectcost->totalcharges = $request->post('totalcharges');
            if ($objResprojectcost->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResprojectcost->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveresprojecttypeproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);
            if ($objResproject->resprojectpropertyid != NULL) {
                $objResprojectproperty = Resprojectproperty::findOne(['id' => $objResproject->resprojectpropertyid]);
            }
            $objResprojectproperty->rkflat = $request->post('rkflat');
            $objResprojectproperty->onebhk = $request->post('onebhk');
            $objResprojectproperty->twobhk = $request->post('twobhk');
            $objResprojectproperty->threebhk = $request->post('threebhk');
            $objResprojectproperty->tp5bhk = $request->post('tp5bhk');
            $objResprojectproperty->typeofvilla = $request->post('typeofvilla');
            $objResprojectproperty->rowhose = $request->post('rowhose');
            if ($objResprojectproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResprojectproperty->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveresprojectamaneties() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);
            if ($objResproject->resprojectamanetiesid != NULL) {
                $objResprojectamaneties = Resprojectamaneties::findOne(['id' => $objResproject->resprojectamanetiesid]);
            } else {
                $objResprojectamaneties = new Resprojectamaneties();
            }
            $objResprojectamaneties->swimingpool = $request->post('swimingpool');
            $objResprojectamaneties->garden = $request->post('garden');
            $objResprojectamaneties->gym = $request->post('gym');
            $objResprojectamaneties->temple = $request->post('temple');
            $objResprojectamaneties->clubhouse = $request->post('clubhouse');
            $objResprojectamaneties->solarsystem = $request->post('solarsystem');
            $objResprojectamaneties->securitydoor = $request->post('securitydoor');
            if ($objResprojectamaneties->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResprojectamaneties->id;
            }
        }
    }

    public function actionSaveresalemicrositedetails() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resalepropertyid = $request->post('resalepropertyid');
            $objResaleproperty = Resaleproperty::findOne(['id' => $resalepropertyid]);
            if ($objResaleproperty->resalemicrositedetailsid != NULL) {
                $objResalemicrositedetails = Resalemicrositedetails::findOne(['id' => $objResaleproperty->resalemicrositedetailsid]);
            } else {
                $objResalemicrositedetails = new Resalemicrositedetails();
            }
            $objResalemicrositedetails->featuresheading1 = $request->post('featuresheading1');
            $objResalemicrositedetails->featuresheading2 = $request->post('featuresheading2');
            $objResalemicrositedetails->featuresheading3 = $request->post('featuresheading3');
            $objResalemicrositedetails->featuresheading4 = $request->post('featuresheading4');
            $objResalemicrositedetails->heading1details = $request->post('heading1details');
            $objResalemicrositedetails->heading2details = $request->post('heading2details');
            $objResalemicrositedetails->heading3details = $request->post('heading3details');
            $objResalemicrositedetails->heading4details = $request->post('heading4details');
            $objResalemicrositedetails->aboutuscontent = $request->post('aboutuscontent');
            $objResalemicrositedetails->resalepropertyid = $request->post('resalepropertyid');
            if ($objResalemicrositedetails->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResalemicrositedetails->id;
            }
        }


        echo json_encode($arrReturn);
    }

    public function actionSaveresalemoredata() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
    
                $resalepropertyid = $request->post('resalepropertyid');
            $objResaleproperty = Resaleproperty::findOne(['id' => $resalepropertyid]);
            if ($objResaleproperty->resalemoredataid != NULL) {
                $objResalemoredata = Resalemoredata::findOne(['id' => $objResaleproperty->resalemoredataid]);
            } else {
                 $objResalemoredata = new Resalemoredata();
            }
            $objResalemoredata->schoolid =  $request->post('collageid');
            $objResalemoredata->schooltrext = $request->post('schooltrext');
            $objResalemoredata->collageid = $request->post('collageid');
            $objResalemoredata->collagetext = $request->post('collagetext');
            $objResalemoredata->multiplexid = $request->post('multiplexid');
            $objResalemoredata->multiplextext = $request->post('multiplextext');
            $objResalemoredata->policestationid = $request->post('policestationid');
            $objResalemoredata->policestationtext = $request->post('policestationtext');
            $objResalemoredata->railwaystationtext = $request->post('railwaystationtext');
            $objResalemoredata->railwaystationid = $request->post('railwaystationid');
            $objResalemoredata->airportid = $request->post('airportid');
            $objResalemoredata->airporttext = $request->post('airporttext');
            $objResalemoredata->mallid = $request->post('mallid');
            $objResalemoredata->malltext = $request->post('malltext');
            $objResalemoredata->marketid = $request->post('marketid');
            $objResalemoredata->markettext = $request->post('markettext');
            $objResalemoredata->templeid = $request->post('templeid');
            $objResalemoredata->templetext = $request->post('templetext');
            $objResalemoredata->liftid = $request->post('liftid');
            $objResalemoredata->parkingid = $request->post('parkingid');
            $objResalemoredata->securityid = $request->post('securityid');
            $objResalemoredata->swimmingpoolid = $request->post('swimmingpoolid');
            $objResalemoredata->clubhouseid = $request->post('clubhouseid');
            $objResalemoredata->childrenplaygroundid = $request->post('childrenplaygroundid');
            $objResalemoredata->seniorcitizenid = $request->post('seniorcitizenid');
            $objResalemoredata->gymid = $request->post('gymid');
            if ($objResalemoredata->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResalemoredata->id;
            }
        }


        echo json_encode($arrReturn);
    }

    public function actionSaveresprojectmicrosite() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);
            if ($objResproject->resprojectmicrositedetailsid != NULL) {
                $objResprojectmicrositedetails = Resprojectmicrositedetails::findOne(['id' => $objResproject->resprojectmicrositedetailsid]);
            } else {
                $objResprojectmicrositedetails = new Resprojectmicrositedetails();
            }
            $objResprojectmicrositedetails->featuresheading1 = $request->post('featuresheading1');
            $objResprojectmicrositedetails->featuresheading2 = $request->post('featuresheading2');
            $objResprojectmicrositedetails->featuresheading3 = $request->post('featuresheading3');
            $objResprojectmicrositedetails->featuresheading4 = $request->post('featuresheading4');
            $objResprojectmicrositedetails->heading1details = $request->post('heading1details');
            $objResprojectmicrositedetails->heading2details = $request->post('heading2details');
            $objResprojectmicrositedetails->heading3details = $request->post('heading3details');
            $objResprojectmicrositedetails->heading4details = $request->post('heading4details');
            $objResprojectmicrositedetails->aboutuscontent = $request->post('aboutuscontent');
            if ($objResprojectmicrositedetails->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResprojectmicrositedetails->id;
            }
        }


        echo json_encode($arrReturn);
    }
    public function actionSaveresmoredata() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
    
                $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);
            if ($objResproject->resmoredataid != NULL) {
                $objResmoredata = Resmoredata::findOne(['id' => $objResproject->resmoredataid]);
            } else {
                 $objResmoredata = new Resmoredata();
            }
            $objResmoredata->schoolid =  $request->post('collageid');
            $objResmoredata->schooltrext = $request->post('schooltrext');
            $objResmoredata->collageid = $request->post('collageid');
            $objResmoredata->collagetext = $request->post('collagetext');
            $objResmoredata->multiplexid = $request->post('multiplexid');
            $objResmoredata->multiplextext = $request->post('multiplextext');
            $objResmoredata->policestationid = $request->post('policestationid');
            $objResmoredata->policestationtext = $request->post('policestationtext');
            $objResmoredata->railwaystationtext = $request->post('railwaystationtext');
            $objResmoredata->railwaystationid = $request->post('railwaystationid');
            $objResmoredata->airportid = $request->post('airportid');
            $objResmoredata->airporttext = $request->post('airporttext');
            $objResmoredata->mallid = $request->post('mallid');
            $objResmoredata->malltext = $request->post('malltext');
            $objResmoredata->marketid = $request->post('marketid');
            $objResmoredata->markettext = $request->post('markettext');
            $objResmoredata->templeid = $request->post('templeid');
            $objResmoredata->templetext = $request->post('templetext');
            $objResmoredata->liftid = $request->post('liftid');
            $objResmoredata->parkingid = $request->post('parkingid');
            $objResmoredata->securityid = $request->post('securityid');
            $objResmoredata->swimmingpoolid = $request->post('swimmingpoolid');
            $objResmoredata->clubhouseid = $request->post('clubhouseid');
            $objResmoredata->childrenplaygroundid = $request->post('childrenplaygroundid');
            $objResmoredata->seniorcitizenid = $request->post('seniorcitizenid');
            $objResmoredata->gymid = $request->post('gymid');
            if ($objResmoredata->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResmoredata->id;
            }
        }


        echo json_encode($arrReturn);
    }

    public function actionSavecomprojectmicrosite() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            if ($objComproject->comprojectmicrositedetailsid != NULL) {
                $objComprojectmicrositedetails = Comprojectmicrositedetails::findOne(['id' => $objComproject->comprojectmicrositedetailsid]);
            } else {
                $objComprojectmicrositedetails = new Comprojectmicrositedetails();
            }
            $objComprojectmicrositedetails->featuresheading1 = $request->post('featuresheading1');
            $objComprojectmicrositedetails->featuresheading2 = $request->post('featuresheading2');
            $objComprojectmicrositedetails->featuresheading3 = $request->post('featuresheading3');
            $objComprojectmicrositedetails->featuresheading4 = $request->post('featuresheading4');
            $objComprojectmicrositedetails->heading1details = $request->post('heading1details');
            $objComprojectmicrositedetails->heading2details = $request->post('heading2details');
            $objComprojectmicrositedetails->heading3details = $request->post('heading3details');
            $objComprojectmicrositedetails->heading4details = $request->post('heading4details');
            $objComprojectmicrositedetails->aboutuscontent = $request->post('aboutuscontent');
            if ($objComprojectmicrositedetails->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComprojectmicrositedetails->id;
            }
        }


        echo json_encode($arrReturn);
    }

    public function actionSavecomprojectdetails() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectdetailsid = $request->post('comprojectdetailsid');
            if ($comprojectdetailsid != NULL) {
                $objComprojectdetails = Comprojectdetails::findOne(['id' => $comprojectdetailsid]);
            } else {
                $objComprojectdetails = new Comprojectdetails();
            }
            $objComprojectdetails->shoporoffice = $request->post('shoporoffice');
            $objComprojectdetails->neworold = $request->post('neworold');
            $objComprojectdetails->rentorpurchase = $request->post('rentorpurchase');
            $objComprojectdetails->areapersqfeet = $request->post('areapersqfeet');
            $objComprojectdetails->height = $request->post('height');
            $objComprojectdetails->floornumber = $request->post('floornumber');
            $objComprojectdetails->expectedprice = $request->post('expectedprice');
            $objComprojectdetails->parkingforshop = $request->post('parkingforshop');
            $objComprojectdetails->propertyfacing = $request->post('propertyfacing');
            $objComprojectdetails->pantry = $request->post('pantry');
            $objComprojectdetails->cabin = $request->post('cabin');
            $objComprojectdetails->workstation = $request->post('workstation');
            $objComprojectdetails->cubicles = $request->post('cubicles');
            $objComprojectdetails->conferenceroom = $request->post('conferenceroom');
            $objComprojectdetails->twowheelerparking = $request->post('twowheelerparking');
            $objComprojectdetails->fourwheelerparking = $request->post('fourwheelerparking');
            $objComprojectdetails->videolink = $request->post('videolink');
            if ($objComprojectdetails->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComprojectdetails->id;
            }
        }


        echo json_encode($arrReturn);
    }

    public function actionSaveresprojectgeolocation() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $resprojectid = $request->post('resprojectid');
            $objResproject = Resproject::findOne(['id' => $resprojectid]);
            if ($objResproject->resprojectgeolocationid != NULL) {
                $objresprojectgeolocation = Resprojectgeolocation::findOne(['id' => $objResproject->resprojectgeolocationid]);
            } else {
                $objresprojectgeolocation = new Resprojectgeolocation();
            }
            $objresprojectgeolocation->railwaystation = $request->post('railwaystation');
            $objresprojectgeolocation->airport = $request->post('airport');
            $objresprojectgeolocation->hospital = $request->post('hospital');
            $objresprojectgeolocation->multiplex = $request->post('multiplex');
            $objresprojectgeolocation->school = $request->post('school');
            $objresprojectgeolocation->college = $request->post('college');
            $objresprojectgeolocation->market = $request->post('market');
            $objresprojectgeolocation->temple = $request->post('temple');
            $objresprojectgeolocation->famousplace = $request->post('famousplace');

            if ($objresprojectgeolocation->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objresprojectgeolocation->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveresproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->name = $request->post('name');
            $objResproject->sublocation = $request->post('sublocation');
            $objResproject->location = $request->post('location');
            $objResproject->city = $request->post('city');
            $objResproject->state = $request->post('state');
            $objResproject->pincode = $request->post('pincode');
            $objResproject->status = $request->post('status');
            $objResproject->added_by = Yii::$app->session['userid'];
            $objResproject->latlong = $request->post('latlong');
            $objResproject->videolink = $request->post('videolink');
            $objResproject->expectedprice = $request->post('expectedprice');

            $objResprojectproject = new Resprojectproject();
            $objResprojectcost = new Resprojectcost();
            $objResprojectproperty = new Resprojectproperty();
            $objResprojectamaneties = new Resprojectamaneties();
            $objResprojectgeolocation = new Resprojectgeolocation();
            $objResprojectmicrositedetails = new Resprojectmicrositedetails();
            $objBuilder = new Builder();
            $objResmoredata = new Resmoredata();

            $objResprojectproject->save();
            $objResprojectcost->save();
            $objResprojectproperty->save();
            $objResprojectamaneties->save();
            $objResprojectgeolocation->save();
            $objResprojectmicrositedetails->save();
            $objBuilder->save();
            $objResmoredata->save();
            
            $objResproject->resprojectprojectid = $objResprojectproject->id;
            $objResproject->resprojectcostid = $objResprojectcost->id;
            $objResproject->resprojectpropertyid = $objResprojectproperty->id;
            $objResproject->resprojectamanetiesid = $objResprojectamaneties->id;
            $objResproject->resprojectgeolocationid = $objResprojectgeolocation->id;
            $objResproject->resprojectmicrositedetailsid = $objResprojectmicrositedetails->id;
            $objResproject->resmoredataid = $objResmoredata->id;
            $objResproject->builderid = $objBuilder->id;
            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveresproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproperty = new Resproperty();
            $objResproperty->name = $request->post('name');
            $objResproperty->sublocation = $request->post('sublocation');
            $objResproperty->location = $request->post('location');
            $objResproperty->city = $request->post('city');
            $objResproperty->state = $request->post('state');
            $objResproperty->pincode = $request->post('pincode');
            $objResproperty->status = $request->post('status');
            $objResproperty->added_by = Yii::$app->session['userid'];
            $objResproperty->latlong = $request->post('latlong');
            $objRespropertyamaneties = new Respropertyamaneties();
            $objRespropertygeolocation = new Respropertygeolocation();
            $objRespropertycost = new Respropertycost();
            $objrespropertyproject = new Respropertyproject();
            $objRespropertytype = new Respropertytype();
            $objRespropertyamaneties->save();
            $objRespropertygeolocation->save();
            $objRespropertycost->save();
            $objrespropertyproject->save();
            $objRespropertytype->save();
            $objResproperty->respropertyamanetiesid = $objRespropertyamaneties->id;
            $objResproperty->respropertygeolocationid = $objRespropertygeolocation->id;
            $objResproperty->respropertycostid = $objRespropertycost->id;
            $objResproperty->respropertyprojectid = $objrespropertyproject->id;
            $objResproperty->respropertytypeid = $objRespropertytype->id;
            $objResproperty->builderid = 1;

            if ($objResproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproperty->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveresaleproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResaleproperty = new Resaleproperty();
            $objResaleproperty->ownername = $request->post('ownername');
            $objResaleproperty->contact = $request->post('contact');
            $objResaleproperty->location = $request->post('location');
            $objResaleproperty->sublocation = $request->post('sublocation');
            $objResaleproperty->expectedprice = $request->post('expectedprice');
            $objResaleproperty->propertytype = $request->post('propertytype');
            $objResaleproperty->age = $request->post('age');
            $objResaleproperty->otheramenities = $request->post('otheramenities');
            $objResaleproperty->status = $request->post('status');
            $objResaleproperty->resellrent = $request->post('resellrent');
            $objResaleproperty->videolink = $request->post('videolink');
            $objResaleproperty->projecttype = $request->post('projecttype');
            $objResalemicrositedetails = new Resalemicrositedetails();
            $objResalemicrositedetails->save();
            $objResaleproperty->resalemicrositedetailsid = $objResalemicrositedetails->id;
            $objResalemoredata = new Resalemoredata();
            $objResalemoredata->save();
            $objResaleproperty->resalemoredataid = $objResalemoredata->id;
            if ($objResaleproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResaleproperty->id;
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSaveplots() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objPlots = new Plots();
            $objPlots->ownername = $request->post('ownername');
            $objPlots->contact = $request->post('contact');
            $objPlots->location = $request->post('location');
            $objPlots->sublocation = $request->post('sublocation');
            $objPlots->landmark = $request->post('landmark');
            $objPlots->zone = $request->post('zone');
            $objPlots->areapersquarefeet = $request->post('areapersquarefeet');
            $objPlots->saleorrent = $request->post('saleorrent');
            $objPlots->areaperguntha = $request->post('areaperguntha');
            $objPlots->peracre = $request->post('peracre');
            $objPlots->securitydeposit = $request->post('securitydeposit');
            $objPlots->sharingratio = $request->post('sharingratio');
            $objPlots->expectedprice = $request->post('expectedprice');
            $objPlots->detailedaddress = $request->post('detailedaddress');
            $objPlots->videolink = $request->post('videolink');
            $objPlots->status = $request->post('status');
            $objPlotgeolocation = new Plotgeolocation();
            $objPlotgeolocation->save();
            $objPlots->plotgeolocationid = $objPlotgeolocation->id;
            if ($objPlots->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objPlots->id;
            }
        }
        echo json_encode($arrReturn);
    }
     public function actionSaveupdateplots() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $plotsid = $request->post('plotsid');
            $objPlots = Plots::findOne(['id' => $plotsid]);

            $objPlots->ownername = $request->post('ownername');
            $objPlots->contact = $request->post('contact');
            $objPlots->sublocation = $request->post('sublocation');
            $objPlots->location = $request->post('location');
            $objPlots->landmark = $request->post('landmark');
            $objPlots->zone = $request->post('zone');
            $objPlots->areapersquarefeet = $request->post('areapersquarefeet');
            $objPlots->saleorrent = $request->post('saleorrent');
            $objPlots->areaperguntha = $request->post('areaperguntha');
            $objPlots->peracre = $request->post('peracre');
            $objPlots->securitydeposit = $request->post('securitydeposit');
            $objPlots->sharingratio = $request->post('sharingratio');
            $objPlots->expectedprice = $request->post('expectedprice');
            $objPlots->detailedaddress = $request->post('detailedaddress');
            $objPlots->videolink = $request->post('videolink');
            $objPlots->status = $request->post('status');
            if ($objPlots->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objPlots->id;
            }
        }

        echo json_encode($arrReturn);
    }

    public function actionSavecomproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objComproject = new Comproject();
            $objComproject->name = $request->post('name');
            $objComproject->location = $request->post('location');
            $objComproject->sublocation = $request->post('sublocation');
            $objComproject->agentname = $request->post('agentname');
            $objComproject->contactperson = $request->post('contactperson');
            $objComproject->contactno = $request->post('contactno');
            $objComproject->ewnsc = $request->post('ewnsc');
            $objComproject->landmark = $request->post('landmark');
            $objComproject->city = $request->post('city');
            $objComproject->state = $request->post('state');
            $objComproject->pincode = $request->post('pincode');
            $objComproject->status = $request->post('status');
//            $objComproject->comprojecttype = $request->post('comprojecttype');
            $objComproject->added_by = Yii::$app->session['userid'];
            $objComproject->latlong = $request->post('latlong');
            $objComproject->videolink = $request->post('videolink');
            $objComprojectamaneties = new Comprojectamaneties();
            $objComprojectgeolocation = new Comprojectgeolocation();
            $objComprojectoffice = new Comprojectoffice();
            $objComprojecproject = new Comprojectproject();
            $objComprojectdetails = new Comprojectdetails();
            $objComprojectmicrositedetails = new Comprojectmicrositedetails();
            $objComprojectcost = new Comprojectcost();
            $objComextradetails = new Comextradetails();
            $objComprojecproject = new Comprojectproject();
            $objBuilder = new Builder();
            
            $objComprojectamaneties->save();
            $objComprojectgeolocation->save();
            $objComprojectoffice->save();
            $objComprojecproject->save();
            $objComprojectdetails->save();
            $objComprojectmicrositedetails->save();
            $objComprojectcost->save();
            $objComextradetails->save();

            $objComproject->comprojectamanetiesid = $objComprojectamaneties->id;
            $objComproject->comprojectgeolocationid = $objComprojectgeolocation->id;
            $objComproject->comprojectofficeid = $objComprojectoffice->id;
            $objComproject->comprojectprojectid = $objComprojecproject->id;
            $objComproject->comprojectcostid = $objComprojectcost->id;
            $objComproject->comprojectdetailsid = $objComprojectdetails->id;
            $objComproject->comprojectmicrositedetailsid = $objComprojectmicrositedetails->id;
            $objComproject->comextradetailsid = $objComextradetails->id;
            $objComproject->builderid = $objBuilder->id;
            if ($objComproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComproject->id;
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSavecomprojetextradetails() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $comprojectid = $request->post('comprojectid');
            $objComproject = Comproject::findOne(['id' => $comprojectid]);
            if ($objComproject->comextradetailsid != NULL) {
                $objComextradetails = Comextradetails::findOne(['id' => $objComproject->comextradetailsid]);
            } else {
                $objComextradetails = new Comextradetails();
            }
            $objComextradetails->yearofconstruct = $request->post('yearofconstruct');
            $objComextradetails->furnishingid = $request->post('furnishingid');
            $objComextradetails->preferredid = $request->post('preferredid');
            $objComextradetails->saleablearea = $request->post('saleablearea');
            $objComextradetails->carpetarea = $request->post('carpetarea');
            $objComextradetails->possessionstatus = $request->post('possessionstatus');
            $objComextradetails->reserveparkingspace = $request->post('reserveparkingspace');
            $objComextradetails->preleasedvacant = $request->post('preleasedvacant');
            $objComextradetails->preleasedperiod = $request->post('preleasedperiod');
            $objComextradetails->preleaseddepstannualescalation = $request->post('preleaseddepstannualescalation');
            $objComextradetails->currentstatus = $request->post('currentstatus');

            if ($objComextradetails->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComextradetails->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecomproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objComproperty = new Comproperty();
            $objComproperty->name = $request->post('name');
            $objComproperty->location = $request->post('location');
            $objComproperty->sublocation = $request->post('sublocation');
            $objComproperty->city = $request->post('city');
            $objComproperty->state = $request->post('state');
            $objComproperty->pincode = $request->post('pincode');
            $objComproperty->status = $request->post('status');
            $objComproperty->added_by = Yii::$app->session['userid'];
            $objComproperty->latlong = $request->post('latlong');
            if ($objComproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComproperty->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavebuilder() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objBuilder = new Builder();
            $objBuilder->name = $request->post('name');
            $objBuilder->companyname = $request->post('companyname');
            $objBuilder->contact = $request->post('contact');
            $objBuilder->email = $request->post('email');
            $objBuilder->website = $request->post('website');
            $objBuilder->addedby = Yii::$app->session['userid'];
            $objBuilder->status = $request->post('status');
            $objBuilder->officecontact = $request->post('officecontact');
            $objBuilder->logopath = $request->post('logopath');
            $objBuilder->picpath = $request->post('picpath');
            $objBuilder->description = $request->post('description');
            if ($objBuilder->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objBuilder->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSavecustomer() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objCustomer = new Customer();
            $objCustomer->name = $request->post('name');
            $objCustomer->phone = $request->post('phone');
            $objCustomer->email = $request->post('email');
            $objCustomer->sublocation = $request->post('sublocation');
            $objCustomer->location = $request->post('location');
            $objCustomer->city = $request->post('city');
            $objCustomer->pincode = $request->post('pincode');
            $objCustomer->status = $request->post('status');
            $objCustomer->contacted_by = $request->post('contacted_by');
            $objCustomer->addedby = $request->post('addedby');
            $objCustomer->description = $request->post('description');
            $objCustomer->picpath = '/resources/customer/no_image.jpg';


            $objFollowup = new Followup();
            $objFollowup->save();
            $objCustomer->followupid = $objFollowup->id;
            $objcheckCustomer = Customer::findOne(['phone' => $objCustomer->phone]);

            if (!$objcheckCustomer) {
                if ($objCustomer->save()) {
                    $objFollowup = new Followup();
                    $objFollowup->customerid = $objCustomer->id;
                    $objFollowup->save();
                   
                    $arrReturn['msg'] = "success";
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objCustomer->id;
                }
            } else {
                $arrReturn['msg'] = "exists";
            }
           
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresprojecttype() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproject/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('projecttype');
                $objResprojectimage = new Resprojectimage();
                $objResprojectimage->resprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresalemicrosite() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resaleproperty/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('other');
                $objResalepropertyimage = new Resalepropertyimage();
                $objResalepropertyimage->resalepropertyid = $request->get('id');
                $objResalepropertyimage->type = $request->get('type');
                $objResalepropertyimage->path = $uploadfile;
                $objResalepropertyimage->status = 1;
                $objResalepropertyimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresalepropertyimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resaleproperty/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('microsite');
                $objResalepropertyimage = new Resalepropertyimage();
                $objResalepropertyimage->resalepropertyid = $request->get('id');
                $objResalepropertyimage->type = $request->get('type');
                $objResalepropertyimage->path = $uploadfile;
                $objResalepropertyimage->status = 1;
                $objResalepropertyimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresalepropertyflorplan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resaleproperty/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('florplan');
                $objResalepropertyimage = new Resalepropertyimage();
                $objResalepropertyimage->resalepropertyid = $request->get('id');
                $objResalepropertyimage->type = $request->get('type');
                $objResalepropertyimage->path = $uploadfile;
                $objResalepropertyimage->status = 1;
                $objResalepropertyimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeleteresaleprojectimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objResalepropertyimage = Resalepropertyimage::findOne(['id' => $id]);
                $objResalepropertyimage->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresprojectmicrosite() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproject/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('about');
                $objResprojectimage = new Resprojectimage();
                $objResprojectimage->resprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresprojectmicrosite1() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproject/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('about');
                $objResprojectimage = new Resprojectimage();
                $objResprojectimage->resalepropertyid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcomprojectmicrosite() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/comproject/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('about');
                $objComprojectimage = new Comprojectimage();
                $objComprojectimage->comprojectid = $request->get('id');
                $objComprojectimage->type = $request->get('type');
                $objComprojectimage->path = $uploadfile;
                $objComprojectimage->status = 1;

                $objComprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadbilderimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/builders/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";
            // //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $objBuilder = Builder::findOne(['id' => $id]);
                $objBuilder->picpath = $uploadfile;
                $objBuilder->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadbilderlogo() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/builders/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            // //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $objBuilder = Builder::findOne(['id' => $id]);
                $objBuilder->logopath = $uploadfile;
                $objBuilder->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcustomerimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/customer/';
            // //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $objCustomer = Customer::findOne(['id' => $id]);
                $objCustomer->picpath = $uploadfile;
                $objCustomer->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproject/';
            // //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typeproject');
                $objResprojectimage = new Resprojectimage();
                $objResprojectimage->resprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresprojectcost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproject/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typecost');
                $objResprojectimage = new Resprojectimage();
                $objResprojectimage->resprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcomprojectcost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/comproject/';
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typecost');
                $objComprojectimage = new comprojectimage();
                $objComprojectimage->comprojectid = $request->get('id');
                $objComprojectimage->type = $request->get('type');
                $objComprojectimage->path = $uploadfile;
                $objComprojectimage->status = 1;
                $objComprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresprojectgeo() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproject/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('projecttypegeo');
                $objResprojectimage = new Resprojectimage();
                $objResprojectimage->resprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadresprojectamaneti() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproject/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typeamaneti');
                $objResprojectimage = new Resprojectimage();
                $objResprojectimage->resprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcustomercsv() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {


            if ($_FILES['file']['size'] > 0) {

                //get the csv file
                $file = $_FILES['file']['tmp_name'];
                $wholedata = [];
                if (($handle = fopen($file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        if ($data[0] != "Sr. No.") {
                            $objCustomer = new Customer();
                            $objCustomer->name = $data[3];
                            $objCustomer->phone = $data[7];
                            $objCustomer->email = $data[4];

                            $objCustomer->location = $data[10];
                            $objCustomer->city = $data[11];
                            ;
                            $objCustomer->status = "Active";
                            $objCustomer->addedby = "CSV";
                            $objCustomer->description = $data[2];
                            $objCustomer->contacted_by = $data[17];
                            $objCustomer->message_date = $data[18];

                            $objcheckCustomer = Customer::findOne(['phone' => $objCustomer->phone]);
                            if (!$objcheckCustomer) {
                                if ($objCustomer->save()) {
                                    $objFollowup = new Followup();
                                    $objFollowup->customerid = $objCustomer->id;
                                    $objFollowup->save();
                                    $arrReturn['id'] = $objCustomer->id;

                                    $arrReturn['status'] = TRUE;
                                }
                            }
                        }
                    }
                }
                fclose($handle);
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadrespropertyproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproperty/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typeproperty');
                $objResprojectimage = new Respropertyimage();
                $objResprojectimage->respropertyid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadrespropertycost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproperty/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typecost');
                $objResprojectimage = new Respropertyimage();
                $objResprojectimage->respropertyid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadrespropertytype() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproperty/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('type');
                $objResprojectimage = new Respropertyimage();
                $objResprojectimage->respropertyid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadrespropertyamaneti() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproperty/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typeamaneti');
                $objResprojectimage = new Respropertyimage();
                $objResprojectimage->respropertyid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadrespropertygeo() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/resproperty/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typegeo');
                $objResprojectimage = new Respropertyimage();
                $objResprojectimage->respropertyid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcomproject() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/comproject/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typeproject');
                $objResprojectimage = new Comprojectimage();
                $objResprojectimage->comprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcomprojectamaneti() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/comproject/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typeamaneti');
                $objResprojectimage = new Comprojectimage();
                $objResprojectimage->comprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcomprojectgeo() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/comproject/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typegeo');
                $objResprojectimage = new Comprojectimage();
                $objResprojectimage->comprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionUploadplotimg() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/plot/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('plotsite');
                $objPlotsimage = new Plotsimage();
                $objPlotsimage->plotsid = $request->get('id');
                $objPlotsimage->type = $request->get('type');
                $objPlotsimage->path = $uploadfile;
                $objPlotsimage->status = 1;
                $objPlotsimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionUploadotherimg() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/plot/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('other');
                $objPlotsimage = new Plotsimage();
                $objPlotsimage->plotsid = $request->get('id');
                $objPlotsimage->type = $request->get('type');
                $objPlotsimage->path = $uploadfile;
                $objPlotsimage->status = 1;
                $objPlotsimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionUploadcomprojectoffice() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/comproject/';
            //$uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $image_name = md5(date('Ymdhis'));
            $uploadfile = $uploaddir . $image_name . ".jpg";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typeoffice');
                $objResprojectimage = new Comprojectimage();
                $objResprojectimage->comprojectid = $request->get('id');
                $objResprojectimage->type = $request->get('type');
                $objResprojectimage->path = $uploadfile;
                $objResprojectimage->status = 1;
                $objResprojectimage->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeleteresprojectimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objResprojectimage = Resprojectimage::findOne(['id' => $id]);
                $objResprojectimage->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionDeleterescomimagecost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objComprojectimage= Comprojectimage::findOne(['id' => $id]);
                $objComprojectimage->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeleteresalepropertyother() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objResprojectimage = Resalepropertyimage::findOne(['id' => $id]);
                $objResprojectimage->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeleteresalepropertyflorplan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objResprojectimage = Resalepropertyimage::findOne(['id' => $id]);
                $objResprojectimage->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeleterespropertyimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objRespropertyimage = Respropertyimage::findOne(['id' => $id]);
                $objRespropertyimage->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeletecomprojectimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objComprojectimage = Comprojectimage::findOne(['id' => $id]);
                $objComprojectimage->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeletefollowup() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFollowup = Followup::findOne(['id' => $id]);
                $objFollowup->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionDeletecustomer() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {

                $objFollowup = Followup::findAll(['customerid' => $id]);
                foreach ($objFollowup as $of) {
                    $of->delete();
                }
                $objCustomer = Customer::findOne(['id' => $id]);
                $objCustomer->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted';
            } else {
                $arrReturn['status'] = FALSE;
                $arrReturn['msg'] = 'not_deleted';
            }
        }
        echo json_encode($arrReturn);
    }

}

// end of PropertyController.php  
