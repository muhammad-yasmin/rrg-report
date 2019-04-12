<?php
header("Location : apps/app/cm/");
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login APP</title>
		<link rel="stylesheet" href="dist/global/css/bootstrap.min.css">
		<link rel="stylesheet" href="dist/assets/css/site.css">
		<link rel="stylesheet" href="dist/global/fonts/material-design/material-design.min.css">
		<script defer src="dist/js/fontawesome-all.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3" id="formLogin">
					<div class="card">
						<img class="card-img-top" src="dist/assets/images/login.png" alt="...">
						<div class="card-body">
							<h5 class="card-title">Login Form</h5>
							<form method="post" action="config/cekLog.php">
								<div class="form-group">
									<label for="username">Masukkan Username</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="example123" />
									<small id="userhelp" class="form-text text-muted">Harap diisi dengan benar</small>
								</div>
								<div class="form-group">
									<label for="password">Masukkan Password</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-outline-primary btn-block" >Proses <i class="icon md-sign-in"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="dist/global/vendor/jquery/jquery.min.js"></script>
		<script src="dist/global/vendor/bootstrap/bootstrap.min.js"></script>
	</body>
</html>