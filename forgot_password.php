<!DOCTYPE html>
<html>
<head>
	<title>TSEC Admission</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="assets/login.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/login.js"></script>

</head>
<body>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    	<div class="row">
<?php
	require_once 'header.php';
?>
			<div class="col-md-6 col-md-offset-3" id="form_body">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" id="register-form-link" class="active">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="recover_password" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Reset">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
