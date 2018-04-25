<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use app\models\Resproject;
use app\models\Resproperty;
use app\models\Comproject;
use app\models\Comproperty;
use app\models\Resprojectowner;
use app\models\Resprojectproject;
use app\models\Resprojectamaneties;
use app\models\Resprojectgeolocation;
use app\models\Resprojectcost;
use app\models\Builder;
use app\models\Customer;
use app\models\User;
use app\models\Status;

class ApipropertyController extends Controller {

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

    public function actionSavecomprojectowner() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->comyearofconst = $request->post('comyearofconst');
            $objResproject->comyearofpossion = $request->post('comyearofpossion');
            $objResproject->comage = $request->post('comage');
            $objResproject->comtotalfloor = $request->post('comtotalfloor');
            $objResproject->comfloorno = $request->post('comfloorno');
            $objResproject->commercialprojtype = $request->post('commercialprojtype');
            $objResproject->comtotalsqfeet = $request->post('comtotalsqfeet');
            $objResproject->temple = $request->post('temple');
            $objResproject->compropertycostpersqfeet = $request->post('compropertycostpersqfeet');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
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
            $id = $request->post('resprojectid');
            if ($id != 0) {
                $objResprojectowner = Resprojectowner::findOne(['resprojectid' => $id]);
            } else {
                $objResprojectowner = new Resprojectowner();
            }
            $objResprojectowner->buildeid = Yii::$app->session['userid'];
//                $objResprojectowner->nextdate = $request->post('nextdate');
            if ($objResprojectowner->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResprojectowner->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdatecomproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->comyearofconst = $request->post('comyearofconst');
            $objResproject->comyearofpossion = $request->post('comyearofpossion');
            $objResproject->comage = $request->post('comage');
            $objResproject->comtotalfloor = $request->post('comtotalfloor');
            $objResproject->comfloorno = $request->post('comfloorno');
            $objResproject->commercialprojtype = $request->post('commercialprojtype');
            $objResproject->comtotalsqfeet = $request->post('comtotalsqfeet');
            $objResproject->temple = $request->post('temple');
            $objResproject->compropertycostpersqfeet = $request->post('compropertycostpersqfeet');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdatecomgeolocation() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->railwaystn = $request->post('railwaystn');
            $objResproject->airport = $request->post('airport');
            $objResproject->hospital = $request->post('hospital');
            $objResproject->multiplex = $request->post('multiplex');
            $objResproject->school = $request->post('school');
            $objResproject->college = $request->post('college');
            $objResproject->market = $request->post('market');
            $objResproject->temple = $request->post('temple');
            $objResproject->famousplace = $request->post('famousplace');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdatecomoffice() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->yearofconst = $request->post('yearofconst');
            $objResproject->yearofpossion = $request->post('yearofpossion');
            $objResproject->age = $request->post('age');
            $objResproject->officefurnishing = $request->post('officefurnishing');
            $objResproject->officePreferred = $request->post('officePreferred');
            $objResproject->floorno = $request->post('floorno');
            $objResproject->comprojtype = $request->post('comprojtype');
            $objResproject->totalsqfeet = $request->post('totalsqfeet');
            $objResproject->totalfloor = $request->post('totalfloor');
            $objResproject->comcostpersqfeet = $request->post('comcostpersqfeet');
            $objResproject->comothercharges = $request->post('comothercharges');
            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdatecomamaneties() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->lift = $request->post('lift');
            $objResproject->parking = $request->post('parking');
            $objResproject->restroom = $request->post('restroom');
            $objResproject->furnishing = $request->post('furnishing');
            $objResproject->preferred = $request->post('preferred');
            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresgeolocation() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->railwaystn = $request->post('railwaystn');
            $objResproject->airport = $request->post('airport');
            $objResproject->hospital = $request->post('hospital');
            $objResproject->multiplex = $request->post('multiplex');
            $objResproject->school = $request->post('school');
            $objResproject->college = $request->post('college');
            $objResproject->market = $request->post('market');
            $objResproject->temple = $request->post('temple');
            $objResproject->famousplace = $request->post('famousplace');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresamaneties() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->swimingpool = $request->post('swimingpool');
            $objResproject->garden = $request->post('garden');
            $objResproject->gym = $request->post('gym');
            $objResproject->temple = $request->post('temple');
            $objResproject->clubhouse = $request->post('clubhouse');
            $objResproject->solarsystem = $request->post('solarsystem');
            $objResproject->securitydoor = $request->post('securitydoor');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdaterestypeofproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->aboutproperty = $request->post('aboutproperty');
            $objResproject->flattype = $request->post('flattype');
            $objResproject->noofbedroom = $request->post('noofbedroom');
            $objResproject->noofbathroom = $request->post('noofbathroom');
            $objResproject->noofbbalcony = $request->post('noofbbalcony');
            $objResproject->seperatediningspace = $request->post('seperatediningspace');
            $objResproject->parking = $request->post('parking');
            $objResproject->furnishingstatus = $request->post('furnishingstatus');
            $objResproject->flooring = $request->post('flooring');
            $objResproject->sanctionauthority = $request->post('sanctionauthority');
            $objResproject->floorpic = $request->post('floorpic');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
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

    public function actionSaveupdaterespropertycost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->sale = $request->post('sale');
            $objResproject->newproperty = $request->post('newproperty');
            $objResproject->resaleproperty = $request->post('resaleproperty');
            $objResproject->rent = $request->post('rent');
            $objResproject->typeproperty = $request->post('typeproperty');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdategeolocation() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->railwaystn = $request->post('railwaystn');
            $objResproject->airport = $request->post('airport');
            $objResproject->hospital = $request->post('hospital');
            $objResproject->multiplex = $request->post('multiplex');
            $objResproject->school = $request->post('school');
            $objResproject->college = $request->post('college');
            $objResproject->market = $request->post('market');
            $objResproject->temple = $request->post('temple');
            $objResproject->famousplace = $request->post('famousplace');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
            }
        }
        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresprojectamaneties() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('resprojectid');
            if ($id != 0) {
                $objResprojectamaneties = Resprojectamaneties::find()->where(['resprojectid' => $id])->one();
                if (!$objResprojectamaneties) {
                    $objResprojectamaneties = new Resprojectamaneties();
                }
                $objResprojectamaneties->resprojectid = $id;
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
                } else {
                    $arrReturn['status'] = $objResprojectamaneties->getErrors();
                }
            } else {
                //redirect 
            }
            }
            echo json_encode($arrReturn);
        
    }

    public function actionSaveupdatetypeofproperty() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $objResproject = new Resproject();
            $objResproject->rkflat = $request->post('rkflat');
            $objResproject->onebhk = $request->post('onebhk');
            $objResproject->twobhk = $request->post('twobhk');
            $objResproject->threebhk = $request->post('threebhk');
            $objResproject->tp5bhk = $request->post('tp5bhk');
            $objResproject->villatype = $request->post('villatype');
            $objResproject->rowhose = $request->post('rowhose');
            $objResproject->propertyimg = $request->post('propertyimg');

            if ($objResproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproject->id;
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
            $id = $request->post('resprojectid');
            if ($id != 0) {
                $objResprojectproject = Resprojectproject::findOne(['resprojectid' => $id]);
            } else {
                $objResprojectproject = new Resprojectproject();
            }

            $objResprojectproject->yearofconstruct = $request->post('yearofconstruct');
            $objResprojectproject->yearofpossion = $request->post('yearofpossion');
            $objResprojectproject->ownershiptypeid = $request->post('ownershiptypeid');
            $objResprojectproject->nooftower = $request->post('nooftower');
            $objResprojectproject->nooffloor = $request->post('nooffloor');
            $objResprojectproject->noofflatperfloor = $request->post('noofflatperfloor');
            $objResprojectproject->noofrowhouse = $request->post('noofrowhouse');
            $objResprojectproject->villa = $request->post('villa');
            $objResprojectproject->commercialshop = $request->post('commercialshop');
            $objResprojectproject->comment = $request->post('comment');
            if ($objResprojectproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $id;
            }
        }

        echo json_encode($arrReturn);
    }

    public function actionSaveupdateresprojectcost() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('resprojectid');
            if ($id != 0) {
                $objResprojectcost = Resprojectcost::find()->where(['resprojectid' => $id])->one();
                if (!$objResprojectcost) {
                    $objResprojectcost = new Resprojectcost();
                }
                $objResprojectcost->resprojectid = $request->post('resprojectid');
                $objResprojectcost->persquarefeet = $request->post('persquarefeet');
                $objResprojectcost->othercharges = $request->post('othercharges');
                $objResprojectcost->totalcharges = $request->post('totalcharges');

                if ($objResprojectcost->save()) {
                    $arrReturn['status'] = TRUE;
                    $arrReturn['id'] = $objResprojectcost->id;
                } else {
                    $arrReturn['status'] = $objResprojectcost->getErrors();
                }
            } else {
                //redirect 
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
            $objResproject->location = $request->post('location');
            $objResproject->city = $request->post('city');
            $objResproject->state = $request->post('state');
            $objResproject->pincode = $request->post('pincode');
            $objResproject->status = $request->post('status');
            $objResproject->added_by = Yii::$app->session['userid'];
            $objResproject->latlong = $request->post('latlong');

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
            $objResproperty->location = $request->post('location');
            $objResproperty->city = $request->post('city');
            $objResproperty->state = $request->post('state');
            $objResproperty->pincode = $request->post('pincode');
            $objResproperty->status = $request->post('status');
            $objResproperty->added_by = Yii::$app->session['userid'];
            $objResproperty->latlong = $request->post('latlong');

            if ($objResproperty->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objResproperty->id;
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
            $objComproject->city = $request->post('city');
            $objComproject->state = $request->post('state');
            $objComproject->pincode = $request->post('pincode');
            $objComproject->status = $request->post('status');
            $objComproject->added_by = Yii::$app->session['userid'];
            $objComproject->latlong = $request->post('latlong');

            if ($objComproject->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objComproject->id;
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
            $objCustomer->location = $request->post('location');
            $objCustomer->city = $request->post('city');
            $objCustomer->pincode = $request->post('pincode');
            $objCustomer->status = $request->post('status');
            $objCustomer->addedby = Yii::$app->session['userid'];
            $objCustomer->description = $request->post('description');
            $objCustomer->picpath = $request->post('picpath');

            if ($objCustomer->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objCustomer->id;
            }
        }
        echo json_encode($arrReturn);
    }

}

// end of DashboardController.php
