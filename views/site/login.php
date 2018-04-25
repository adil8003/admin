<?php
$this->title = 'Login';
?>
<div class="container">
	<form id="form-login" method="POST" action="index.php?r=site/verification">
	<div class="signin row">
		<h3 class="card-title text-center">Unique Properties And Finance</h3>
		<div class="col-sm-12">
			<div class="card card-block">
				<p class="card-text text-center"><i class="fa fa-user fa-fw fa-5x"></i></p>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input name="username" id="username" type="text" pattern=".{2,}" minlength="2" class="form-control" placeholder="Username" required>
				</div>
				<p id="username-error" class="card-text"></p>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
					<input name="password" id="password" type="password" pattern=".{2,}" minlength="2" class="form-control" placeholder="Password" required >
				</div>
				<p id="password-error" class="card-text"></p>
				<button id="btn-save" type="submit" class="btn btn-primary btn-sm btn-block">Sign in</button>
			</div>
		</div>
	</div>
	</form>
</div> <!-- /container -->
