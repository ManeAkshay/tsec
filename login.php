<?php

require_once 'db_connect.php';

		//var_dump($_SESSION);

if(isset($_POST)){
	if(isset($_POST['login_submit'])){
		$form_no = $_POST['form_no'];
		$password = $_POST['password'];
		$query = "SELECT * FROM users WHERE form_no = '".$form_no."' and password = '".$password."'";
		$result = $mysqli->query($query);
		//echo $query;
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$_SESSION['form_no'] = $form_no;
			$_SESSION['user_id'] = $row['id'];
	 		header("Location: index.php");
		}else{
			echo "Login failed";
		}
	}else if(isset($_POST['register_submit'])){
		$email = $_POST['email'];
		$query = "SELECT * FROM users WHERE email = '".$email."'";
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			echo '<div class="alert alert-warning">
  <strong>Email Id already exits!</strong>
</div>';
		}else{
			$form_no = $_POST['form_no'];
			$dte_no = $_POST['dte_no'];
			$password = rand(1111,9999);
			$access_token = md5($email.$form_no);

	 		$query = "INSERT INTO users (`form_no`,`dte_no`,`email`,`password`,`access_token`) VALUES ('".$form_no."','".$dte_no."','".$email."','".$password."','".$access_token."')";
	 		//echo $query;
	 		if($mysqli->query($query)){
	 			require_once 'mail.php';
	 		}
	 	}

	}
}

?>
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
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="form_no" id="form_no" tabindex="1" class="form-control" placeholder="Form No" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="forgot_password.php" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="form_no" id="form_no" tabindex="1" class="form-control" placeholder="Form No" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="dte_no" id="dte_no" tabindex="2" class="form-control" placeholder="DTE No" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register_submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
