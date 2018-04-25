<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Session;
use yii\web\View;
use app\models\User;
use app\models\Status;

class SiteController extends Controller
{
	public $enableCsrfValidation = false;
	public function init(){
			Yii::$app->session['isLoggedIn'] = false;
  }
  public function actionIndex(){
			if (Yii::$app->session['isLoggedIn'] == true){
				return $this->redirect('index.php?r=dashboard');
			}else{
				return $this->redirect('index.php?r=site/login');
			}
  }
  public function actionLogin(){
	  //	Yii::$app->view->registerJsFile('js/site/login.js');
			$this->layout="login";
      return $this->render('login');
  }
	public function actionVerification(){
		$request = Yii::$app->request;

			$this->layout="";
        if ($request->isPost){
				$model = new User();
				$objUser = $model->findOne(['username' => $request->post('username'), 'status_id' => Status::ACTIVE]);
				if($objUser && $request->post('password') == $objUser->password ){
                                        Yii::$app->session['isLoggedIn'] = true;
                                        Yii::$app->session['userid'] = $objUser->id;
                                        Yii::$app->session['username'] = $objUser->username;
                                        Yii::$app->session['email'] = $objUser->email;
                                        Yii::$app->session['status'] = $objUser->status->name;
                                        Yii::$app->session['role'] = $objUser->role->name;
                                        return $this->redirect('index.php?r=dashboard');
				}else{
						return $this->redirect('index.php?r=site/login');
				}
        } else{
	return $this->redirect('index.php?r=site/login');
      }
  }
  public function actionLogout(){
        Yii::$app->session['isLoggedIn'] = false;
		Yii::$app->session['username'] = '';
		Yii::$app->session['email'] = '';
		Yii::$app->session['status'] = '';
		Yii::$app->session['role'] = '';						
        return $this->redirect('index.php?r=site/login');
  }
	public function actionError(){
			$this->layout="login";
			echo  "Hi error";
			die;
  }

}// end of SiteController.php
