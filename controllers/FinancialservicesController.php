<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Status;
use app\models\Financial;
use app\models\Financialbigcontent;


class FinancialservicesController extends Controller {

    public $enableCsrfValidation = false;
    public $user_id = '';

    public function init() {
        if (Yii::$app->session['isLoggedIn'] != true) {
            return $this->redirect('index.php?r=site/login');
        }
        $this->layout = "dashboard";
        $this->user_id = Yii::$app->session['userid'];
    }
     public function actionFinancial() {
        $objFinancial = Financial::find()->all();
        return $this->render('financial', [
              'objFinancial' => $objFinancial,
        ]);
        return true;
    }
     public function actionLoan() {
        $objFinancial = Financial::find()->all();
        return $this->render('loan', [
              'objFinancial' => $objFinancial,
        ]);
        return true;
    }
     
     public function actionFinanciallargecontent() {
        $objFinancialbigcontent = Financialbigcontent::find()->all();
        return $this->render('financiallargecontent', [
              'objFinancialbigcontent' => $objFinancialbigcontent,
            
        ]);
        return true;
    }
    
     public function actionLoanlargecontent() {
        $objFinancialbigcontent = Financialbigcontent::find()->all();
        return $this->render('loanlargecontent', [
              'objFinancialbigcontent' => $objFinancialbigcontent,
            
        ]);
        return true;
    }
    
    public function actionSavefixeddeposit() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Investment';
            $objFinancial->page = 'fixeddeposit';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSavefixeddepositlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Investment';
            $objFinancialbigcontent->page = 'fixeddeposit';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
     public function actionSavefixeddeposit1() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Investment';
            $objFinancialbigcontent->page = 'fixeddeposit';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavemutualfunds() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Investment';
            $objFinancial->page = 'mutualfund';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
     public function actionSavemutualfundslargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Investment';
            $objFinancialbigcontent->page = 'mutualfund';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavemediclaim() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Investment';
            $objFinancial->page = 'Mediclaim';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSavemediclaimlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Investment';
            $objFinancialbigcontent->page = 'Mediclaim';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavebond() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Investment';
            $objFinancial->page = 'bond';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSavebondlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Investment';
            $objFinancialbigcontent->page = 'bond';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSaveinsurance() {

        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Investment';
            $objFinancial->page = 'insurance';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
     public function actionSaveinsurancelargecontent() {

        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Investment';
            $objFinancialbigcontent->page = 'insurance';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavepersonalprovidentfund() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Investment';
            $objFinancial->page = 'ppf';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
     public function actionSaveppflargecotent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Investment';
            $objFinancialbigcontent->page = 'ppf';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavepersonalloan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Loan';
            $objFinancial->page = 'personal';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSavepersonalloanlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Loan';
            $objFinancialbigcontent->page = 'personal';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
     public function actionSavecarloan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Loan';
            $objFinancial->page = 'car';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSavecarloanlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Loan';
            $objFinancialbigcontent->page = 'car';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
     public function actionSaveprojectloan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Loan';
            $objFinancial->page = 'project';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavehomeloan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Loan';
            $objFinancial->page = 'home';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavevehicleloan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Loan';
            $objFinancial->page = 'vehicle';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSaveprojectloanlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Loan';
            $objFinancialbigcontent->page = 'project';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavehomeloanlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Loan';
            $objFinancialbigcontent->page = 'home';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
    public function actionSavevehicleloanlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Loan';
            $objFinancialbigcontent->page = 'vehicle';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    
     public function actionSavemortgageloan() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancial = Financial::findOne(['id' => $id]);
                if (!$objFinancial) {
                    $objFinancial = new Financial();
                    $objFinancial->id = $id;
                }
            $objFinancial->module = 'Loan';
            $objFinancial->page = 'mortgage';
            $objFinancial->content = $request->post('content');
            if ($objFinancial->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancial->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSavemortgageloanlargecontent() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objFinancialbigcontent = Financialbigcontent::findOne(['id' => $id]);
                if (!$objFinancialbigcontent) {
                    $objFinancialbigcontent = new Financialbigcontent();
                    $objFinancialbigcontent->id = $id;
                }
            $objFinancialbigcontent->module = 'Loan';
            $objFinancialbigcontent->page = 'mortgage';
            $objFinancialbigcontent->content = $request->post('content');
            if ($objFinancialbigcontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objFinancialbigcontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
}
   
// end of EmployeeController.php   
