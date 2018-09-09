<?php
$this->title = Yii::t('app', 'Login');
?>
<div class="jumbotron">
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="login-card card">
                        <div class="header text-center">
                            <h4 class="title"><img width="300" height="200" src="images/logo.jpg" /></h4>
                        </div>
                        <div class="content">
                            <form id="form-login" method="POST" action="index.php?r=site/verification">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label >Username:<span class="asterik">*</span>
                                                <span  class="errmsg" id="err-fullname"></span> </label>
                                            <input  type="email" class="form-control border-input" placeholder="Email" name="email"  id="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label >Password:<span class="asterik">*</span>
                                                <span class="errmsg"  id="err-password"></span> </label>
                                            <input  type="password" class="form-control border-input" onblur="checkPassword();" placeholder="Password" id="password" name="password"  required>  
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button id="loginButton"  type="submit" class="btn btn-info btn-fill btn-wd">Login</button>
                                </div>
                                <div class="pull-right">
                                    <a href="index.php?r=site/forgotpassword" >Forgot Password</a>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/site/login.js"></script>