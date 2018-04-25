<?php

namespace app\controllers;

use Yii;
use yii\data\Sort;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Status;
use app\models\Websitecontent;
use app\models\Blog;


class WebsiteController extends Controller {

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
    public function actionBlog() {
        $objBlog= Blog::find()->all();
       return $this->render('blog', [
                   'objBlog' => $objBlog,
        ]);
    }
    public function actionBlogedit() {
        $request = Yii::$app->request;   
        $id = $request->get('id');
        $objBlog= Blog::findOne($id);
         $allblog = Blog :: find()->all();
          if(!$objBlog){
            return $this->redirect('index.php?r=dashboard/error');
        }
        return $this->render('blogedit', [
                            'objBlog' => $objBlog,
                            'allblog' => $allblog,
         ]);
    }
    public function actionGetblogbyid() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;   
        $id = $request->post('id');
        $objBlog= Blog::findOne($id);
        if($id != '' ){
            $arrReturn['status'] = TRUE;
            $arrReturn['data'] = $objBlog->toArray();
        }
        echo json_encode($arrReturn);
    }
    public function actionAboutus() {
         $objWebsitecontent= Websitecontent::find()->all();
        return $this->render('aboutus', [
                   'objWebsitecontent' => $objWebsitecontent,
        ]);
    }
    public function actionServices() {
         $objWebsitecontent= Websitecontent::find()->all();
        return $this->render('services', [
                   'objWebsitecontent' => $objWebsitecontent,
        ]);
    }
    public function actionSaveservices() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objWebsitecontent = Websitecontent::findOne(['id' => $id]);
                if (!$objWebsitecontent) {
                    $objWebsitecontent = new Websitecontent();
                    $objWebsitecontent->id = $id;
                }
            $objWebsitecontent->module = 'Services';
            $objWebsitecontent->page = 'services';
            $objWebsitecontent->content = $request->post('content');
            if ($objWebsitecontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objWebsitecontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSaveblog() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objWebsitecontent = Websitecontent::findOne(['id' => $id]);
                if (!$objWebsitecontent) {
                    $objWebsitecontent = new Websitecontent();
                    $objWebsitecontent->id = $id;
                }
            $objWebsitecontent->module = 'Blog';
            $objWebsitecontent->page = 'blog';
            $objWebsitecontent->content = $request->post('content');
            if ($objWebsitecontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objWebsitecontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionAddblog() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objBlog = Blog::findOne(['id' => $id]);
            } else {
                $objBlog = new Blog();
            }
          
            $objBlog->id = $request->post('id');
            $objBlog->title = $request->post('title');
            $objBlog->body = $request->post('body');
            $objBlog->tags = $request->post('tags');
            $objBlog->status = $request->post('status');
            echo '<pre>';
            print_r($objBlog);
            echo '</pre>';
            if ($objBlog->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objBlog->id;
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionSaveaboutus() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
         if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objWebsitecontent = Websitecontent::findOne(['id' => $id]);
                if (!$objWebsitecontent) {
                    $objWebsitecontent = new Websitecontent();
                    $objWebsitecontent->id = $id;
                }
            $objWebsitecontent->module = 'Aboutus';
            $objWebsitecontent->page = 'aboutus';
            $objWebsitecontent->content = $request->post('content');
            if ($objWebsitecontent->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objWebsitecontent->id;
               }
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionUpdateblog() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objBlog = Blog::findOne(['id' => $id]);
            } else {
                $objBlog = new Blog();
            }
            $objBlog->id = $request->post('id');
            $objBlog->title = $request->post('title');
            $objBlog->body = $request->post('body');
            $objBlog->tags = $request->post('tags');
            $objBlog->status = $request->post('status');
            if ($objBlog->save()) {
                $arrReturn['status'] = TRUE;
                $arrReturn['id'] = $objBlog->id;
            }
        }
        echo json_encode($arrReturn);
    }
    /* testing to publish */
    public function actionDeleteblog() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objBlog = Blog::findOne(['id' => $id]);
                $status = ($request->post('status') == 'publish') ? Status::publish : Status::unpublish;
                $objBlog->status = $status;
                $objBlog->save();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionUploadblogimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/blog/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $objblog = Blog :: findOne(['id' => $id]);
                $objblog->id = $request->get('id');
                $objblog->blogimage = $uploadfile;
                $objblog->save();
                $arrReturn['status'] = TRUE;
            } else {
                $arrReturn['msg'] = 'Try again.';
            }
        }
        echo json_encode($arrReturn);
    }
    public function actionUploadblogimages() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        if (!empty($_FILES)) {
            $uploaddir = 'resources/blog/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $request = Yii::$app->request;
                $id = $request->get('id');
                $type = $request->get('typepost');
                $objBlogimages = new  Blogimages();
                $objBlogimages->blogid = $request->get('id');
                $objBlogimages->type = $request->get('type');
                $objBlogimages->path = $uploadfile;
                $objBlogimages->status = 1;
                $objBlogimages->save();
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
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
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
    public function actionDeleteblogimage() {
        $arrReturn = array();
        $arrReturn['status'] = FALSE;
        $request = Yii::$app->request;
        $this->layout = "";
        if ($request->isPost) {
            $id = $request->post('id');
            if ($id != 0) {
                $objblog = Blog::findOne(['id' => $id]);
                $objblog->delete();
                $arrReturn['status'] = TRUE;
                $arrReturn['msg'] = 'deleted successfully.';
            } else {
                $arrReturn['msg'] = 'Please try again';
            }
        }
        echo json_encode($arrReturn);
    }
}
// end of WebsiteController.php
